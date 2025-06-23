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

    // Compute total counts
    $totalStudents = $students->count();
    $totalContracts = \App\Models\Contract::where('semester_id', $selectedSemester)->count();
    $totalReferrals = \App\Models\Referral::where('semester_id', $selectedSemester)->count();
    $totalCounselings = \App\Models\Counseling::where('semester_id', $selectedSemester)->count();

    return view('reports.report', compact(
        'semesters', 
        'students', 
        'selectedSemester',
        'totalStudents', 
        'totalContracts', 
        'totalReferrals', 
        'totalCounselings'
    ));
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
    $schoolYear = $request->input('school_year');
    $semesterName = $request->input('semester_id'); // holds "1st"/"2nd"

    // Find semester record based on school year and semester name
    $semesterRecord = Semester::where('school_year', $schoolYear)
                              ->where('semester', $semesterName)
                              ->first();

    $search = $request->input('search');

    // Return ALL students with EITHER profile or enrollment in this semester
    $students = Student::where(function($query) use ($semesterRecord) {
        $query->whereHas('enrollments', function($q) use ($semesterRecord) {
            if ($semesterRecord) {
                $q->where('semester_id', $semesterRecord->id);
            }
        })->orWhereHas('profiles', function($q) use ($semesterRecord) {
            if ($semesterRecord) {
                $q->where('semester_id', $semesterRecord->id);
            }
        });
    })
    ->when($search, function ($query, $search) {
        $query->where(function ($q) use ($search) {
            $q->where('student_id', 'like', "%$search%")
              ->orWhere('first_name', 'like', "%$search%")
              ->orWhere('last_name', 'like', "%$search%");
        });
    })
    ->with(['profiles' => function($query) use ($semesterRecord) {
        if ($semesterRecord) {
            $query->where('semester_id', $semesterRecord->id);
        }
    }, 'contracts' => function($query) use ($semesterRecord) {
        if ($semesterRecord) {
            $query->where('semester_id', $semesterRecord->id);
        }
    }])
    ->get();

    // Summary cards
    $totalStudents = $students->count();
    $totalContracts = \App\Models\Contract::where('semester_id', $semesterRecord?->id)->count();
    $totalReferrals = \App\Models\Referral::where('semester_id', $semesterRecord?->id)->count();
    $totalCounselings = \App\Models\Counseling::where('semester_id', $semesterRecord?->id)->count();

    return view('reports.report', [
        'students' => $students,
        'semesters' => $semesters,
        'search' => $search,
        'selectedSemester' => $semesterRecord ? $semesterRecord->id : null,
        'schoolYear' => $schoolYear,
        'semesterName' => $semesterName,
        'totalStudents' => $totalStudents,
        'totalContracts' => $totalContracts,
        'totalReferrals' => $totalReferrals,
        'totalCounselings' => $totalCounselings,
    ]);
}

public function viewRecords(Request $request, $studentId)
{
     $schoolYear = $request->input('school_year');
    $semester   = $request->input('semester');

$semesterRecord = Semester::where('school_year', $schoolYear)
                          ->where('semester', $semester) // "1st" or "2nd" matches DB
                          ->first();


    if (!$semesterRecord) {
        return back()->with('error', 'Invalid School Year or Semester.');
    }

    $student = Student::with([
        'profiles' => function($q) use ($semesterRecord) {
            $q->where('semester_id', $semesterRecord->id);
        },
        'contracts' => function($q) use ($semesterRecord) {
            $q->where('semester_id', $semesterRecord->id);
        },
        'referrals' => function($q) use ($semesterRecord) {
            $q->where('semester_id', $semesterRecord->id);
        },
        'counselings' => function($q) use ($semesterRecord) {
            $q->where('semester_id', $semesterRecord->id);
        }
    ])->findOrFail($studentId);

    return view('reports.view_student_records', compact('student', 'semesterRecord'));
}





}