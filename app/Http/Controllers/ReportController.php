<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    } else {
        $studentProfiles = collect();
        $contracts = collect();
        $referrals = collect();
        $counselings = collect();
    }

    $transitions = StudentTransition::all();
    $uniqueStudentIds = $studentProfiles->pluck('student_id')->unique();

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
    ]);
}

    public function view(Request $request, $student_id)
    {
        $schoolYearId = $request->input('school_year_id');
        $semesterName = $request->input('semester_name');

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

        return view('reports.view_student_records', compact(
            'student', 'contracts', 'referrals', 'counselings',
            'schoolYearId', 'semesterName'
        ));
    }
}
