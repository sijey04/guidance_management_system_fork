<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\counseling;
use App\Models\CounselingImage;
use App\Models\semester;
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

    // 🔎 School Year Filter
    if ($request->filled('school_year_id')) {
        $query->whereHas('semester', function ($q) use ($request) {
            $q->where('school_year_id', $request->school_year_id);
        });
    }

    // 🔎 Semester Label Filter
    if ($request->filled('semester_label')) {
        $query->whereHas('semester', function ($q) use ($request) {
            $q->where('semester', $request->semester_label);
        });
    }

    // 🔎 Status Filter
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // 🔎 Search Filter
    if ($request->filled('search')) {
        $search = $request->search;
        $query->whereHas('student', function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('student_id', 'like', "%{$search}%");
        });
    }

    // 🔃 Sort Filter
    if ($request->filled('sort')) {
        $query->orderBy('counseling_date', $request->sort === 'oldest' ? 'asc' : 'desc');
    } else {
        $query->orderByDesc('counseling_date');
    }

    $counselings = $query->paginate(10)->appends($request->all());

    // 👥 Fetch students
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
    $counseling = Counseling::findOrFail($id);
    $status = $request->input('status');

    if (in_array($status, ['In Progress', 'Completed'])) {
        $counseling->status = $status;
        $counseling->save();
    }

    return redirect()->route('counseling.view', $id)
                     ->with('success', 'Status updated successfully.');
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


}
