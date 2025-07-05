<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\ReferralImage;
use App\Models\ReferralReason;
use App\Models\semester;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReferralController extends Controller
{
   public function index(Request $request)
{
    $currentSemester = Semester::where('is_current', true)->first();
    
    if (!$currentSemester) {
    $emptyPaginator = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
    return view('referrals.referral', [
        'referrals' => $emptyPaginator,
        'students' => collect(),
        'reasons' => ReferralReason::all(),
        'currentSemester' => null,
    ])->with('warning', 'No active semester is set. Please create one to enable referrals.');
}



    $lastSemester = Semester::where('id', '<>', $currentSemester->id)
                            ->orderByDesc('id')
                            ->first();

    $validatedStudents = collect();
    $newStudents = collect();

    if ($lastSemester) {
        // Validated students: from last or current semester
        $validatedStudents = Student::whereHas('profiles', function ($query) use ($lastSemester, $currentSemester) {
            $query->where('semester_id', $lastSemester->id)
                  ->orWhere('semester_id', $currentSemester->id);
        })->get();
    }

    // Newly enrolled students in the current semester
    $newStudents = Student::whereHas('enrollments', function ($query) use ($currentSemester) {
        $query->where('semester_id', $currentSemester->id)
              ->where('is_enrolled', true);
    })->get();

    $students = $validatedStudents->merge($newStudents)->unique('id')->values();
    $reasons = ReferralReason::all();

    // Referrals
    $query = Referral::with(['student.profiles', 'semester.schoolYear']);

    if ($request->filled('reason')) {
        $query->where('reason', $request->reason);
    }

    if ($request->filled('search')) {
        $search = $request->search;
        $query->whereHas('student', function ($q) use ($search) {
            $q->where('student_id', 'like', "%$search%")
              ->orWhere('first_name', 'like', "%$search%")
              ->orWhere('last_name', 'like', "%$search%");
        });
    }

    $referrals = $query->paginate(10);

    return view('referrals.referral', compact('referrals', 'students', 'reasons', 'currentSemester'));
}



public function create()
{
    $currentSemester = Semester::where('is_current', true)->first();

    $students = Student::whereHas('enrollments', function ($query) use ($currentSemester) {
        $query->where('semester_id', $currentSemester->id)
              ->where('is_enrolled', true);
    })->get();

    // 🔥 Fetch dynamic referral reasons from the database instead of hardcoded ones
    $reasons = ReferralReason::all();

    return view('referrals.create', compact('students', 'reasons'));
}


   public function store(Request $request)
{
    $validated = $request->validate([
        'student_id'   => 'required|exists:students,id',
        'reason'       => 'required|string|max:255',
        'remarks'      => 'nullable|string',
        'referral_date'=> 'required|date',
        'image_path.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // for multiple files
    ]);

    $activeSemester = Semester::where('is_current', true)->first();

    if (!$activeSemester) {
        return back()->with('error', 'No active semester set.');
    }

    $referral = Referral::create([
        'student_id'   => $validated['student_id'],
        'reason'       => $validated['reason'],
        'remarks'      => $validated['remarks'] ?? null,
        'referral_date'=> $validated['referral_date'],
        'semester_id'  => $activeSemester->id,
    ]);

    // Handle multiple images
    if($request->hasFile('image_path')) {
        foreach ($request->file('image_path') as $file) {
            $path = $file->store('referral_images', 'public');
            $referral->images()->create(['image_path' => $path]);
        }
    }

    return redirect()->route('referrals.index')->with('success', 'Referral added with images.');
}

  public function show(Request $request, $id)
{
    $referral = Referral::with(['student.profiles', 'images'])->findOrFail($id);
    $source = $request->query('source', 'referrals');
    $readonly = $source === 'report';
    return view('referrals.view', compact('referral', 'readonly', 'source'));
}

public function edit($id)
{
    $referral = Referral::findOrFail($id);
    $reasons = \App\Models\ReferralReason::all(); // for dropdown
    return view('referrals.edit', compact('referral', 'reasons'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'reason' => 'required|string|max:255',
        'remarks' => 'nullable|string',
        'referral_date' => 'required|date',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $referral = Referral::findOrFail($id);

    if ($request->hasFile('image_path')) {
        $validated['image_path'] = $request->file('image_path')->store('referral_image_path', 'public');
    }

    $referral->update($validated);

    return redirect()->route('referrals.index')->with('success', 'Referral updated successfully.');
}

   public function destroy($id)
    {
        $referral = Referral::findOrFail($id);

        foreach ($referral->images as $image) {
            if (Storage::exists($image->image_path)) {
                Storage::delete($image->image_path);
            }
            $image->delete();
        }

        $referral->delete();

        return redirect()->route('referrals.index')->with('success', 'Counseling record deleted.');
    }

public function updateStatus(Request $request, $id)
{
    $referral = Referral::findOrFail($id);
    $status = $request->input('status');

    if (in_array($status, ['In Progress', 'Completed'])) {
        $referral->status = $status;
        $referral->save();
    }

    return redirect()->route('referrals.view', $id)
                     ->with('success', 'Status updated successfully.');
}

public function updateRemarks(Request $request, $id)
{
    $referral = Referral::findOrFail($id);
    $referral->remarks = $request->input('remarks');
    $referral->save();

    return redirect()->route('referrals.view', $id)
                     ->with('success', 'Remarks updated successfully.');
}

public function uploadImages(Request $request, $id, $type)
{
    $request->validate([
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $referral = referral::findOrFail($id);

    foreach ($request->file('images', []) as $file) {
        $path = $file->store('counseling_images', 'public');

        $referral->images()->create([
            'image_path' => $path,
            'type' => $type,
        ]);
    }

    return back()->with('success', ucfirst($type) . ' images uploaded successfully.');
}

public function deleteImage($referralId, $imageId)
{
    $image = ReferralImage::findOrFail($imageId);

    if (Storage::disk('public')->exists($image->image_path)) {
        Storage::disk('public')->delete($image->image_path);
    }

    $image->delete();

    return back()->with('success', 'Image deleted successfully.');
}



}

