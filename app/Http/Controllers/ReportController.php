<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\StudentProfile;
use App\Models\Contract;
use App\Models\Referral;
use App\Models\Counseling;
use App\Models\Student;
use App\Models\StudentTransition;
use App\Models\ContractType;
use App\Models\Course;
use App\Models\ReferralReason;
use App\Models\Section;
use App\Models\Year;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ReportController extends Controller
{
    public function index(Request $request)
{
    $schoolYears = SchoolYear::all();
    $courses = Course::all();
    $years = Year::all();
    $sections = Section::all();
    $contractTypesList = ContractType::all();
    $referralReasons = ReferralReason::all();

    // Get active school year and semester if not selected
    $activeSchoolYear = SchoolYear::where('is_active', true)->first();
$activeSemester = Semester::where('school_year_id', optional($activeSchoolYear)->id)
                           ->where('is_current', true)
                           ->first();


    // Fallback to active SY/Sem if not explicitly filtered
    $selectedSY = $request->input('school_year_id', optional($activeSchoolYear)->id);
$selectedSemName = $request->input('semester_name', optional($activeSemester)->semester);

    // Fetch the semester(s) under the selected SY and Sem Name
    $semesters = Semester::query()
        ->where('school_year_id', $selectedSY)
        ->where('semester', $selectedSemName)
        ->get();

    $semesterIds = $semesters->pluck('id');

    // Load only if a valid semester is found
    if ($semesterIds->isNotEmpty()) {
        $studentProfiles = StudentProfile::with('student')
            ->whereIn('semester_id', $semesterIds)
            ->when($request->filled('filter_course'), fn($q) => $q->where('course', $request->filter_course))
            ->when($request->filled('filter_year'), fn($q) => $q->where('year_level', $request->filter_year))
            ->when($request->filled('filter_section'), fn($q) => $q->where('section', $request->filter_section))
            ->get()
            ->unique('student_id')
            ->values();

        $contracts = Contract::with('student')
            ->whereIn('semester_id', $semesterIds)
            ->when($request->filled('filter_contract_type'), fn($q) => $q->where('contract_type', $request->filter_contract_type))
            ->when($request->filled('filter_contract_status'), fn($q) => $q->where('status', $request->filter_contract_status))
            ->get();

        $referrals = Referral::with('student')
            ->whereIn('semester_id', $semesterIds)
            ->when($request->filled('filter_reason'), fn($q) => $q->where('reason', $request->filter_reason))
            ->get();

        $counselings = Counseling::with('student')
            ->whereIn('semester_id', $semesterIds)
            ->when($request->filled('filter_counseling_status'), fn($q) => $q->where('status', $request->filter_counseling_status))
            ->get();

        $transitions = StudentTransition::with('student')
            ->whereIn('semester_id', $semesterIds)
            ->when($request->filled('filter_transition_type'), function ($q) use ($request) {
                $q->where('transition_type', $request->filter_transition_type);
            })
            ->get();

    
        } else {
    $studentProfiles = collect();
    $contracts = collect();
    $referrals = collect();
    $counselings = collect();
    $transitions = collect(); 
}

    $uniqueStudentIds = $studentProfiles->pluck('student_id')->unique();

    // Group counts per student_id for this SY + Sem
$contractCounts = Contract::selectRaw('student_id, COUNT(*) as count')
    ->whereIn('semester_id', $semesterIds)
    ->groupBy('student_id')
    ->pluck('count', 'student_id');

$referralCounts = Referral::selectRaw('student_id, COUNT(*) as count')
    ->whereIn('semester_id', $semesterIds)
    ->groupBy('student_id')
    ->pluck('count', 'student_id');

$counselingCounts = Counseling::selectRaw('student_id, COUNT(*) as count')
    ->whereIn('semester_id', $semesterIds)
    ->groupBy('student_id')
    ->pluck('count', 'student_id');

$totalStudents = $studentProfiles->count(); // count of unique student profiles
$totalContracts = $contracts->count();      // count of contracts for filtered semester(s)
$totalReferrals = $referrals->count();      // count of referrals
$totalCounselings = $counselings->count();  // count of counseling records
$totalTransitions = $transitions->count();// count of transition records

    

    return view('reports.report', [
        'schoolYears' => $schoolYears,
        'semesters' => $semesters,
        'selectedSY' => $selectedSY,
        'selectedSem' => $selectedSemName,
        'students' => $studentProfiles,
        'contracts' => $contracts,
        'referrals' => $referrals,
        'counselings' => $counselings,
        'transitions' => $transitions,
        'courses' => $courses,
        'years' => $years,
        'sections' => $sections,
        'contractTypesList' => $contractTypesList,
        'referralReasons' => $referralReasons,
        'uniqueStudentCount' => $uniqueStudentIds->count(),
        'contractCounts' => $contractCounts,
        'referralCounts' => $referralCounts,
        'counselingCounts' => $counselingCounts,
        'totalStudents' => $totalStudents,
        'totalContracts' => $totalContracts,
        'totalReferrals' => $totalReferrals,
        'totalCounselings' => $totalCounselings,
        'totalTransitions' => $totalTransitions,

    ]);
}

    public function view(Request $request, $student_id)
    {
        $schoolYearId = $request->input('school_year_id');
$semesterName = $request->input('semester_name');

$schoolYear = SchoolYear::find($schoolYearId);
$schoolYearName = $schoolYear?->school_year ?? 'N/A';

        $student = Student::findOrFail($student_id);

        $semesters = Semester::query()
            ->when($schoolYearId, fn($q) => $q->where('school_year_id', $schoolYearId))
            ->when($semesterName, fn($q) => $q->where('semester', $semesterName))
            ->get();

        $semesterIds = $semesters->pluck('id');

        $contracts = Contract::with('semester', 'images')
            ->where('student_id', $student_id)
            ->whereIn('semester_id', $semesterIds)
            ->get();

        $referrals = Referral::with('semester', 'images')
            ->where('student_id', $student_id)
            ->whereIn('semester_id', $semesterIds)
            ->get();

        $counselings = Counseling::with('semester', 'images')
            ->where('student_id', $student_id)
            ->whereIn('semester_id', $semesterIds)
            ->get();

        $profile = StudentProfile::where('student_id', $student_id)
            ->whereIn('semester_id', $semesterIds)
            ->latest()
            ->first(); 


        return view('reports.view_student_records', compact(
    'student', 'contracts', 'referrals', 'counselings',
    'schoolYearName', 'semesterName', 'profile'
));


    }

   

public function export(Request $request)
{
    $schoolYearId = $request->school_year_id;
    $semesterName = $request->semester_name;
    $tab = $request->tab ?? 'all';

    $schoolYear = SchoolYear::find($schoolYearId);

    $semesterIds = Semester::where('school_year_id', $schoolYearId)
        ->where('semester', $semesterName)
        ->pluck('id');

    // STUDENT PROFILES with filters
    $students = StudentProfile::with('student')
        ->whereIn('semester_id', $semesterIds)
        ->when($request->filled('filter_course'), fn($q) => $q->where('course', $request->filter_course))
        ->when($request->filled('filter_year'), fn($q) => $q->where('year_level', $request->filter_year))
        ->when($request->filled('filter_section'), fn($q) => $q->where('section', $request->filter_section))
        ->get();

    // CONTRACTS with filters
    $contracts = Contract::with('student')
        ->whereIn('semester_id', $semesterIds)
        ->when($request->filled('filter_contract_type'), fn($q) => $q->where('contract_type', $request->filter_contract_type))
        ->when($request->filled('filter_contract_status'), fn($q) => $q->where('status', $request->filter_contract_status))
        ->get();

    // REFERRALS with filters
    $referrals = Referral::with('student')
        ->whereIn('semester_id', $semesterIds)
        ->when($request->filled('filter_reason'), fn($q) => $q->where('reason', $request->filter_reason))
        ->get();

    // COUNSELINGS with filters
    $counselings = Counseling::with('student')
        ->whereIn('semester_id', $semesterIds)
        ->when($request->filled('filter_counseling_status'), fn($q) => $q->where('status', $request->filter_counseling_status))
        ->get();

    // TRANSITIONS with filters
    $transitions = StudentTransition::with('semester.schoolYear')
        ->whereIn('semester_id', $semesterIds)
        ->when($request->filled('filter_transition_type'), fn($q) => $q->where('transition_type', $request->filter_transition_type))
        ->get();

    $contractCounts = Contract::selectRaw('student_id, COUNT(*) as count')
    ->whereIn('semester_id', $semesterIds)
    ->groupBy('student_id')
    ->pluck('count', 'student_id');

    $referralCounts = Referral::selectRaw('student_id, COUNT(*) as count')
        ->whereIn('semester_id', $semesterIds)
        ->groupBy('student_id')
        ->pluck('count', 'student_id');

    $counselingCounts = Counseling::selectRaw('student_id, COUNT(*) as count')
        ->whereIn('semester_id', $semesterIds)
        ->groupBy('student_id')
        ->pluck('count', 'student_id');


    $pdf = Pdf::loadView('reports.export_pdf', compact(
        'schoolYear',
        'semesterName',
        'tab',
        'students',
        'contracts',
        'referrals',
        'counselings',
        'transitions',
        'contractCounts',
        'referralCounts',
        'counselingCounts'
    ))->setPaper('a4', 'landscape');

    return $pdf->download("Report_{$schoolYear->school_year}_{$semesterName}.pdf");
}


public function exportStudentHistory(Request $request)
{
    $student = Student::findOrFail($request->student_id);
    $schoolYear = SchoolYear::find($request->school_year_id);
    $semesterName = $request->semester_name;

    $semesterIds = Semester::where('school_year_id', $schoolYear?->id)
        ->where('semester', $semesterName)
        ->pluck('id');

    $contracts = Contract::with('semester', 'images')
        ->where('student_id', $student->id)
        ->whereIn('semester_id', $semesterIds)
        ->get();

    $referrals = Referral::with('semester', 'images')
        ->where('student_id', $student->id)
        ->whereIn('semester_id', $semesterIds)
        ->get();

    $counselings = Counseling::with('semester', 'images')
        ->where('student_id', $student->id)
        ->whereIn('semester_id', $semesterIds)
        ->get();

    $profile = StudentProfile::where('student_id', $student->id)
        ->whereIn('semester_id', $semesterIds)
        ->latest()
        ->first();

    $pdf = PDF::loadView('reports.student_history_pdf', compact(
        'student', 'schoolYear', 'semesterName', 'contracts', 'referrals', 'counselings', 'profile'
    ))->setPaper('a4', 'portrait');

    return $pdf->download("Student_History_{$student->student_id}.pdf");
}


}
