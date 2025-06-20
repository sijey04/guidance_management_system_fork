<?php

namespace App\Http\Controllers;

use App\Models\semester;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
   
    public function index(Request $request)
{
    $semesters = Semester::orderByDesc('id')->get();
    $selectedSemester = $request->input('semester_id');
    $search = $request->input('search');

    $students = Student::whereHas('enrollments', function ($query) use ($selectedSemester) {
        if ($selectedSemester) {
            $query->where('semester_id', $selectedSemester);
        }
    })
    ->when($search, function ($query, $search) {
        $query->where(function ($q) use ($search) {
            $q->where('student_id', 'like', "%$search%")
              ->orWhere('first_name', 'like', "%$search%")
              ->orWhere('last_name', 'like', "%$search%");
        });
    })
    ->with(['enrollments.semester', 'profiles', 'contracts'])
    ->get();

    return view('reports.report', compact('semesters', 'students', 'selectedSemester'));
}


   public function studentHistory($studentId, Request $request)
{
    $student = Student::with(['profiles.semester', 'contracts.semester'])->findOrFail($studentId);

    // Optional: Filter by selected semester if passed
    $selectedSemesterId = $request->input('semester_id');
    
    $semesters = Semester::orderBy('school_year', 'desc')->get();

    return view('reports.student_history', compact('student', 'semesters', 'selectedSemesterId'));
}
public function viewProfile($studentId, $semesterId)
{
    $student = Student::findOrFail($studentId);
    $semester = Semester::findOrFail($semesterId);

    $profile = $student->profiles()->where('semester_id', $semesterId)->first();

    if (!$profile) {
        return redirect()->back()->with('error', 'No profile found for this semester.');
    }

    return view('reports.view_profile', compact('student', 'semester', 'profile'));
}
public function report(Request $request)
{
    $semesters = Semester::all();
    $selectedSemester = $request->input('semester_id');
    $search = $request->input('search'); // Capture search input

    $students = Student::where(function($query) use ($search) {
        if ($search) {
            $query->where('student_id', 'like', "%$search%")
                  ->orWhere('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%");
        }
    })
    ->with(['profiles' => function($query) use ($selectedSemester) {
        if ($selectedSemester) {
            $query->where('semester_id', $selectedSemester);
        }
    }, 'contracts' => function($query) use ($selectedSemester) {
        if ($selectedSemester) {
            $query->where('semester_id', $selectedSemester);
        }
    }])
    ->get();

    return view('reports.report', compact('students', 'semesters', 'selectedSemester', 'search'));
}

public function viewRecords($studentId, Request $request)
{
    $semesterId = $request->input('semester_id');

    $student = Student::findOrFail($studentId);
    $semester = Semester::findOrFail($semesterId);

    $contracts = $student->contracts()->where('semester_id', $semesterId)->get();
    //$counselings = $student->counselings()->where('semester_id', $semesterId)->get();
    //$referrals = $student->referrals()->where('semester_id', $semesterId)->get(); // If you have referrals

    return view('reports.view_records', compact('student', 'semester', 'contracts'));
}



}
