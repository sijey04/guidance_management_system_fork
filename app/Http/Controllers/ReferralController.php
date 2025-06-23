<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\ReferralReason;
use App\Models\semester;
use App\Models\Student;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
   public function index()
{
    $referrals = Referral::with('student')->paginate(10);
    $reasons = ReferralReason::all(); // For the modal dropdown

    $currentSemester = Semester::where('is_current', true)->first();
    $lastSemester = Semester::where('id', '<>', $currentSemester->id)
                            ->orderByDesc('id')
                            ->first();

    $validatedStudents = Student::whereHas('profiles', function ($query) use ($lastSemester, $currentSemester) {
        $query->where('semester_id', $lastSemester->id)
              ->orWhere('semester_id', $currentSemester->id);
    })->get();

    
    $newStudents = Student::whereHas('enrollments', function ($query) use ($currentSemester) {
        $query->where('semester_id', $currentSemester->id)
              ->where('is_enrolled', true);
    })->get();

  
    $students = $validatedStudents->merge($newStudents)->unique('id')->values();
$referrals = Referral::with(['student.profiles', 'semester'])->paginate(10);

    return view('referrals.referral', compact('referrals', 'students', 'reasons'));
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
            'student_id' => 'required|exists:students,id',
            'reason' => 'required|string|max:255',
            'remarks' => 'nullable|string',
            'referral_date' => 'required|date',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('image_path', 'public');
        }

       $activeSemester = Semester::where('is_current', true)->first();
        Referral::create([
            'student_id' => $request->student_id,
            'semester_id' => $activeSemester->id, // important!
            'reason' => $request->reason,
            'referral_date' => $request->referral_date,
            // other fields...
        ]);



        return redirect()->route('referrals.index')->with('success', 'Referral added successfully.');
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

