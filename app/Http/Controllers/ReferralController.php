<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\ReferralReason;
use App\Models\semester;
use App\Models\Student;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
   public function index(Request $request)
{
    
    $currentSemester = Semester::where('is_current', true)->first();
    $lastSemester = Semester::where('id', '<>', $currentSemester->id)
                            ->orderByDesc('id')
                            ->first();

    // Validated students: from last or current semester
    $validatedStudents = Student::whereHas('profiles', function ($query) use ($lastSemester, $currentSemester) {
        $query->where('semester_id', $lastSemester->id)
              ->orWhere('semester_id', $currentSemester->id);
    })->get();

    // Newly enrolled students in the current semester
    $newStudents = Student::whereHas('enrollments', function ($query) use ($currentSemester) {
        $query->where('semester_id', $currentSemester->id)
              ->where('is_enrolled', true);
    })->get();

    $students = $validatedStudents->merge($newStudents)->unique('id')->values();
    $reasons = ReferralReason::all();

    // Build referral query with eager loading
    $query = Referral::with(['student.profiles', 'semester.schoolYear']);

    // Filter by reason (type)
    if ($request->filled('reason')) {
        $query->where('reason', $request->reason);
    }

    // Search by student ID or name
    if ($request->filled('search')) {
        $search = $request->search;
        $query->whereHas('student', function ($q) use ($search) {
            $q->where('student_id', 'like', "%$search%")
              ->orWhere('first_name', 'like', "%$search%")
              ->orWhere('last_name', 'like', "%$search%");
        });
    }

    // Get final paginated result
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
    // Validate only necessary inputs (no semester_id from form)
    $validated = $request->validate([
        'student_id'   => 'required|exists:students,id',
        'reason'       => 'required|string|max:255',
        'remarks'      => 'nullable|string',
        'referral_date'=> 'required|date',
        'image_path'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Find the current active semester
    $activeSemester = Semester::where('is_current', true)->first();
    if (!$activeSemester) {
        return back()->with('error', 'No active semester set. Please activate a semester first.');
    }

    // Handle file upload if any
    if ($request->hasFile('image_path')) {
        $validated['image_path'] = $request->file('image_path')->store('image_path', 'public');
    }

    // Add active semester ID to the data
    $validated['semester_id'] = $activeSemester->id;

    // Create referral
    Referral::create($validated);

    return redirect()->route('referrals.index')->with('success', 'Referral added successfully under current semester.');
}




    public function show($id)
{
    $referral = Referral::with('student')->findOrFail($id);
    return view('referrals.view', compact('referral'));
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

}

