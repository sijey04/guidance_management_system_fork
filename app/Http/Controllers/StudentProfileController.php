<?php

namespace App\Http\Controllers;

use App\Models\semester;
use App\Models\Student;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Student $student)
{
    $semester = Semester::where('is_current', true)->first();
    $profile = $student->profileForSemester($semester->id);

    $semester = Semester::where('is_active', true)->first();
$profile = $student->profiles()->where('semester_id', $semester->id)->first();

$profile->update($request->only([
    'home_address', 'father_occupation', 'mother_occupation', 
    'parent_guardian_name', 'parent_guardian_contact',
    'number_of_sisters', 'number_of_brothers', 'ordinal_position'
]));


    return redirect()->back()->with('success', 'Profile updated for the current semester only.');
}
public function showProfile(Student $student, StudentProfile $profile)
{
    return view('student.view_profile', compact('student', 'profile'));
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentProfile $studentProfile)
    {
        //
    }
}
