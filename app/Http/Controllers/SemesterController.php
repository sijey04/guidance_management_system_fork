<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::orderByDesc('is_current')
                             ->orderBy('school_year', 'desc')
                             ->orderBy('semester', 'asc')
                             ->get();

        return view('semester.index', compact('semesters'));
    }

    public function create()
    {
        return view('semester.create');
    }

   public function store(Request $request)
{
    // Validate
    $validated = $request->validate([
        'school_year' => 'required|string',
        'semester'    => 'required|string',
        'is_current'  => 'nullable|boolean',
        'is_active'   => 'nullable|boolean',
    ]);

    // If new semester is set to current, unset others
    if ($request->is_current) {
        Semester::where('is_current', true)->update(['is_current' => false]);
    }
    if ($request->is_active) {
        Semester::where('is_active', true)->update(['is_active' => false]);
    }

    // Create new Semester
    $newSemester = Semester::create($validated);

    // Carry over profiles
    $this->carryOverProfilesToNewSemester($newSemester);

    return redirect()->route('semester.index')->with('success', 'Semester created and profiles carried over.');
}

    public function activateSemester($id)
    {
        // Deactivate all
        Semester::where('id', '!=', $id)->update(['is_active' => false]);

        // Activate new semester
        $semester = Semester::findOrFail($id);
        $semester->update(['is_active' => true]);

        // Carry-over logic if needed (usually done in store)
        // Optional here - to avoid double-carry

        return redirect()->back()->with('success', 'Semester activated.');
    }

    public function carryOverProfilesToNewSemester(Semester $newSemester)
{
    $students = Student::all();

    foreach ($students as $student) {
        $latestProfile = $student->profiles()->latest('semester_id')->first();

        // Check if profile already exists for this semester
        $exists = $student->profiles()->where('semester_id', $newSemester->id)->exists();

        if (!$exists && $latestProfile) {
            $student->profiles()->create([
                'semester_id' => $newSemester->id,
                'course_year' => $latestProfile->course_year,
                'section' => $latestProfile->section,
                // also copy personal info
                'home_address' => $latestProfile->home_address,
                'father_occupation' => $latestProfile->father_occupation,
                'mother_occupation' => $latestProfile->mother_occupation,
                'parent_guardian_name' => $latestProfile->parent_guardian_name,
                'parent_guardian_contact' => $latestProfile->parent_guardian_contact,
                'number_of_sisters' => $latestProfile->number_of_sisters,
                'number_of_brothers' => $latestProfile->number_of_brothers,
                'ordinal_position' => $latestProfile->ordinal_position,
                // etc.
            ]);
        }
    }
}

}
