<?php

namespace App\Http\Controllers;

use App\Models\semester;
use App\Models\Student;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         $semesters = Semester::orderByDesc('is_current') // Current semester first (is_current = 1)
                         ->orderBy('school_year', 'desc') // Latest year next
                         ->orderBy('semester', 'asc')    // 1st semester before 2nd or Summer
                         ->get();

    return view('semester.index', compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastSemester = Semester::latest('id')->first();
        $newSemester = Semester::create([
            'school_year' => '2025-2026',
            'semester' => '1st',
            'is_active' => true,
        ]);

        $students = Student::all();

        foreach ($students as $student) {
            $lastProfile = $student->profileForSemester($lastSemester->id);
            
            if ($lastProfile) {
                StudentProfile::create([
                    'student_id' => $student->id,
                    'semester_id' => $newSemester->id,
                    'year_level' => $lastProfile->year_level, // allow counselor to update this later
                    'section' => $lastProfile->section,
                ]);
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->is_current) {
        Semester::where('is_current', true)->update(['is_current' => false]);
        Semester::where('is_active', true)->update(['is_active' => false]); 
    }

    Semester::create($request->all());

    return redirect()->route('semester.index')->with('success', 'Semester created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(semester $semester)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(semester $semester)
    {
        //
    }

public function activateSemester($id)
{
    // Deactivate all semesters first
    Semester::where('id', '!=', $id)->update(['is_active' => false]);

    // Activate the selected semester
    $semester = Semester::findOrFail($id);
    $semester->update(['is_active' => true]);

    // Carry over profiles from previous semester (latest active or created one)
    $previousSemester = Semester::where('id', '!=', $id)->latest('id')->first();

    if ($previousSemester) {
        $students = Student::all();
        foreach ($students as $student) {
            $previousProfile = $student->profiles()->where('semester_id', $previousSemester->id)->first();

            if ($previousProfile) {
                $existingProfile = $student->profiles()->where('semester_id', $semester->id)->first();
                if (!$existingProfile) { // Prevent duplicates
                    $student->profiles()->create([
                        'semester_id'      => $semester->id,
                        'year_level'       => $previousProfile->year_level,
                        'section'          => $previousProfile->section,
                        'additional_info'  => $previousProfile->additional_info,
                        // Other profile fields if necessary
                    ]);
                }
            }
        }
    }

    return redirect()->back()->with('success', 'Semester activated, profiles carried over.');
}


}
