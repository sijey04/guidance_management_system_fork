<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Counseling;
use App\Models\CounselingImage;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;

class CounselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $currentSemester = Semester::where('is_current', true)->first();

    if (!$currentSemester) {
        return view('counselings.counseling', [
            'counselings' => collect(),
            'students' => collect(),
            'error' => 'No active semester found.',
            'semesters' => Semester::with('schoolYear')->get(),
        ]);
    }

    $semesters = Semester::with('schoolYear')->orderByDesc('id')->get();

    $query = Counseling::with(['student.profiles', 'images', 'semester.schoolYear']);
  $allCounselings = $query->get();
$latestCounselings = $this->getLatestUniqueCounselings($allCounselings);


    // Step 2: Apply filters manually to the cleaned collection
    $filtered = $latestCounselings->filter(function ($counseling) use ($request) {
        $match = true;

        if ($request->filled('school_year_id')) {
            $match = optional($counseling->semester)->school_year_id == $request->school_year_id;
        }

        if ($match && $request->filled('semester_label')) {
            $match = optional($counseling->semester)->semester === $request->semester_label;
        }

        if ($match && $request->filled('status')) {
            $match = $counseling->status === $request->status;
        }

        if ($match && $request->filled('search')) {
            $search = strtolower($request->search);
            $student = $counseling->student;

            $match = $student &&
                (str_contains(strtolower($student->student_id), $search) ||
                 str_contains(strtolower($student->first_name), $search) ||
                 str_contains(strtolower($student->last_name), $search));
        }

        return $match;
    });

    // Step 3: Sort
    if ($request->filled('sort')) {
        $filtered = $filtered->sortBy('counseling_date', SORT_REGULAR, $request->sort === 'oldest' ? false : true);
    } else {
        $filtered = $filtered->sortByDesc('counseling_date');
    }

    // Step 4: Manual pagination
    $page = $request->input('page', 1);
    $perPage = 10;
    $counselings = new \Illuminate\Pagination\LengthAwarePaginator(
        $filtered->forPage($page, $perPage)->values(),
        $filtered->count(),
        $perPage,
        $page,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    // Step 5: Get all validated and newly enrolled students
    $newStudents = Student::whereHas('enrollments', fn ($q) => $q->where('semester_id', $currentSemester->id)->where('is_enrolled', true));
    $validatedStudents = Student::whereHas('profiles', fn ($q) => $q->where('semester_id', $currentSemester->id));
    $students = $newStudents->union($validatedStudents)->get();

    return view('counselings.counseling', compact('counselings', 'students', 'semesters', 'currentSemester'));
}




public function store(Request $request)
{
    $validated = $request->validate([
        'student_id' => 'required|exists:students,id',
        'counseling_date' => 'required|date',
        'form_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'id_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
         'remarks' => 'nullable|string|max:5000',
    ]);

    $activeSemester = Semester::where('is_current', true)->first();
    if (!$activeSemester) {
        return back()->with('error', 'No active semester set.');
    }

   $counseling = Counseling::create([
    'student_id' => $validated['student_id'],
    'counseling_date' => $validated['counseling_date'],
    'semester_id' => $activeSemester->id,
    'remarks' => $request->remarks,
]);


    // Save Counseling Form Images
    if ($request->hasFile('form_images')) {
        foreach ($request->file('form_images') as $imageFile) {
            $path = $imageFile->store('counseling_images', 'public');
            CounselingImage::create([
                'counseling_id' => $counseling->id,
                'image_path' => $path,
                'type' => 'form',
            ]);
        }
    }

    // Save ID Card Images
    if ($request->hasFile('id_images')) {
        foreach ($request->file('id_images') as $imageFile) {
            $path = $imageFile->store('counseling_images', 'public');
            CounselingImage::create([
                'counseling_id' => $counseling->id,
                'image_path' => $path,
                'type' => 'id_card',
            ]);
        }
    }

    return redirect()->back()->with('success', 'Counseling record added with images.');
}

    /**
     * Display the specified resource.
     */
  public function show($id, Request $request)
{
    $counseling = Counseling::with(['student.profiles', 'images'])->findOrFail($id);
    
    $source = $request->query('source', 'counseling'); // default to 'counseling'
    $readonly = $source === 'report'; // make it readonly if from report

    return view('counselings.view', compact('counseling', 'readonly', 'source'));
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(counseling $counseling)
    {
        return view('counselings.edit', compact('counseling'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Counseling $counseling)
{
    $validated = $request->validate([
        'counseling_date' => 'required|date',
        'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    if ($request->hasFile('image_path')) {
        $validated['image_path'] = $request->file('image_path')->store('counseling_images', 'public');
    }

    $counseling->update($validated);
    return redirect()->route('counselings.index')->with('success', 'Updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $counseling = \App\Models\Counseling::findOrFail($id);

    foreach ($counseling->images as $image) {
        if (Storage::exists($image->image_path)) {
            Storage::delete($image->image_path);
        }
        $image->delete();
    }

    $counseling->delete();

    return redirect()->route('counselings.index')->with('success', 'Counseling record deleted.');
}


public function updateStatus(Request $request, $id)
{
    $counseling = Counseling::with('images', 'carriedOver')->findOrFail($id);
    $status = $request->input('status');

    if (!in_array($status, ['In Progress', 'Completed'])) {
        return back()->with('error', 'Invalid status.');
    }

    $activeSemester = Semester::where('is_current', true)->first();

    // ✅ If this is the original and being completed outside current semester
    if (
        $counseling->status === 'In Progress' &&
        $status === 'Completed' &&
        !$counseling->original_counseling_id &&
        $counseling->semester_id !== optional($activeSemester)->id
    ) {
        if ($counseling->carriedOver) {
            return back()->with('info', 'Counseling already carried over.');
        }

        // Clone and link it as a carried over
        $carried = $counseling->replicate();
        $carried->semester_id = $activeSemester->id;
        $carried->status = 'Completed';
        $carried->original_counseling_id = $counseling->id;
        $carried->save();

        foreach ($counseling->images as $img) {
            $carried->images()->create([
                'image_path' => $img->image_path,
                'type' => $img->type,
            ]);
        }

        return redirect()->route('counseling.view', $carried->id)
            ->with('success', 'Carried over and marked as Completed.');
    }

    // ✅ Regular update
    $counseling->status = $status;
    $counseling->save();

    return redirect()->route('counseling.view', $counseling->id)
        ->with('success', 'Status updated.');
}



public function updateRemarks(Request $request, $id)
{
    $counseling = Counseling::findOrFail($id);
    $counseling->remarks = $request->input('remarks');
    $counseling->save();

    return redirect()->route('counseling.view', $id)
                     ->with('success', 'Remarks updated successfully.');
}

public function uploadImages(Request $request, $id, $type)
{
    $request->validate([
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $counseling = Counseling::findOrFail($id);

    foreach ($request->file('images', []) as $file) {
        $path = $file->store('counseling_images', 'public');

        $counseling->images()->create([
            'image_path' => $path,
            'type' => $type,
        ]);
    }

    return back()->with('success', ucfirst($type) . ' images uploaded successfully.');
}

public function deleteImage($counselingId, $imageId)
    {
        $image = CounselingImage::findOrFail($imageId);

        if (Storage::exists($image->image_path)) {
            Storage::delete($image->image_path);
        }

        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

//     public function view($id)
// {
//     $counseling = Counseling::with('student.profiles', 'images')->findOrFail($id);
//     $readonly = false;

//     // Capture previous page URL
//     session(['previous_url' => url()->previous()]);

//     return view('counselings.view', compact('counseling', 'readonly'));
// }

private function getLatestUniqueCounselings($counselings)
{
    return $counselings
        ->groupBy(fn($c) => $c->original_counseling_id ?? $c->id)
        ->map(fn($group) => $group->sortByDesc('semester_id')->first())
        ->values();
}

}
