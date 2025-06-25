<?php

namespace App\Http\Controllers;

use App\Models\contract;
use App\Models\ContractType;
use App\Models\counseling;
use App\Models\Course;
use App\Models\Referral;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\semester;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;

class ReportController extends Controller
{
   
  public function index(Request $request)
{
    $semesters = Semester::orderByDesc('id')->get();
    $schoolYears = SchoolYear::all();
    $courses = Course::all();
    $years = Year::all();
    $sections = Section::all();

    $schoolYear = $request->input('school_year');
    $semester = $request->input('semester'); // "1st", "2nd", "Summer"
    $search = $request->input('search');
    $selectedSemesterId = null;
$contractTypes = ContractType::all(); 
    // Resolve semester_id from school_year + semester
    if ($schoolYear && $semester) {
        $schoolYearRecord = SchoolYear::where('school_year', $schoolYear)->first();
        if ($schoolYearRecord) {
            $semesterRecord = Semester::where('school_year_id', $schoolYearRecord->id)
                                      ->where('semester', $semester)
                                      ->first();
            if ($semesterRecord) {
                $selectedSemesterId = $semesterRecord->id;
            }
        }
    }

    $students = Student::whereHas('enrollments', function ($query) use ($selectedSemesterId) {
        if ($selectedSemesterId) {
            $query->where('semester_id', $selectedSemesterId);
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

    $totalStudents = $students->count();

    if ($selectedSemesterId) {
        $totalContracts = Contract::where('semester_id', $selectedSemesterId)->count();
        $totalReferrals = Referral::where('semester_id', $selectedSemesterId)->count();
        $totalCounselings = Counseling::where('semester_id', $selectedSemesterId)->count();
    } else {
        $totalContracts = Contract::count();
        $totalReferrals = Referral::count();
        $totalCounselings = Counseling::count();
    }

    

    return view('reports.report', compact(
        'semesters',
        'schoolYears',
        'courses',
        'contractTypes',
        'years',
        'sections',
        'students',
        'selectedSemesterId', // FIX: now available to Blade
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
    $query = Student::query()->with(['profiles', 'contracts']);

    $schoolYear = $request->input('school_year');
    $semester = $request->input('semester'); // "1st", "2nd", "Summer"
    $selectedSemesterId = null;

    // Resolve semester_id from school_year + semester text
    if ($schoolYear && $semester) {
        $schoolYearRecord = SchoolYear::where('school_year', $schoolYear)->first();
        if ($schoolYearRecord) {
            $semesterRecord = Semester::where('school_year_id', $schoolYearRecord->id)
                                      ->where('semester', $semester)
                                      ->first();
            if ($semesterRecord) {
                $selectedSemesterId = $semesterRecord->id;
            }
        }
    }

    // Filter students based on resolved semester_id
    if ($selectedSemesterId) {
        $query->whereHas('profiles', function ($q) use ($selectedSemesterId) {
            $q->where('semester_id', $selectedSemesterId);
        });
    }

    // Optional: search by ID or name
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('student_id', 'like', "%{$search}%")
              ->orWhere('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%");
        });
    }

    $students = $query->get();

    // Total Counts — compute properly
    $totalStudents = $students->count();

    if ($selectedSemesterId) {
        $totalContracts = Contract::where('semester_id', $selectedSemesterId)->count();
        $totalReferrals = Referral::where('semester_id', $selectedSemesterId)->count();
        $totalCounselings = Counseling::where('semester_id', $selectedSemesterId)->count();
    } else {
        $totalContracts = Contract::count();
        $totalReferrals = Referral::count();
        $totalCounselings = Counseling::count();
    }

    // Dropdown options
    $schoolYears = SchoolYear::all();
    $semesters = Semester::all(); // in case you need it

    return view('reports.report', compact(
        'students',
        'schoolYears',
        'semesters',
        'totalStudents',
        'totalContracts',
        'totalReferrals',
        'totalCounselings',
        'selectedSemesterId' // pass this to Blade
    ));
}


public function viewRecords(Request $request, $studentId)
{
    
    $schoolYear = $request->input('school_year'); // example: "2027-2028"
    $semester   = $request->input('semester');    // example: "1st"
$contractTypes = ContractType::all(); 
    // First find the SchoolYear ID:
    $schoolYearRecord = SchoolYear::where('school_year', $schoolYear)->first();

    if (!$schoolYearRecord) {
        return back()->with('error', 'Invalid School Year.');
    }

    // Now find the Semester by school_year_id:
    $semesterRecord = Semester::where('school_year_id', $schoolYearRecord->id)
                              ->where('semester', $semester)
                              ->first();

    if (!$semesterRecord) {
        return back()->with('error', 'Invalid Semester.');
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

    return view('reports.view_student_records', compact('student', 'semesterRecord','contractTypes'));
}





}