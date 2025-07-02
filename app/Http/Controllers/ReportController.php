<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYear;
use App\Models\StudentProfile;
use App\Models\Contract;
use App\Models\Referral;
use App\Models\Counseling;
use App\Models\semester;
use App\Models\Student;
use App\Models\StudentTransition;
use Illuminate\Support\Collection;

class ReportController extends Controller
{
    

public function index(Request $request)
{
    $schoolYears = SchoolYear::all();
    $selectedSY = $request->input('school_year_id');
    $selectedSemName = $request->input('semester_name');

    $semesters = semester::when($selectedSY, function ($q) use ($selectedSY) {
        $q->where('school_year_id', $selectedSY);
    })->when($selectedSemName, function ($q) use ($selectedSemName) {
        $q->where('semester', $selectedSemName);
    })->get();

    $semesterIds = $semesters->pluck('id');

    // 👇 Get Student Profiles and load relationships
    $studentProfiles = StudentProfile::with('student')
        ->when($semesterIds->isNotEmpty(), fn($q) => $q->whereIn('semester_id', $semesterIds))
        ->get();

    // ✅ Unique students by student_id
    $uniqueStudentIds = $studentProfiles->pluck('student_id')->unique();

    // Contracts
    $contracts = Contract::with('student')->when($semesterIds->isNotEmpty(), fn($q) => $q->whereIn('semester_id', $semesterIds))->get();

    // Referrals
    $referrals = Referral::with('student')->when($semesterIds->isNotEmpty(), fn($q) => $q->whereIn('semester_id', $semesterIds))->get();

    // Counselings
    $counselings = Counseling::with('student')->when($semesterIds->isNotEmpty(), fn($q) => $q->whereIn('semester_id', $semesterIds))->get();

    // Transitions
    $transitions = StudentTransition::all(); // Filter later if needed

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
        'uniqueStudentCount' => $uniqueStudentIds->count(),
    ]);
}


    public function view(Request $request, $student_id)
{
    $schoolYearId = $request->input('school_year_id');
    $semesterName = $request->input('semester_name');

    $student = Student::findOrFail($student_id);

    $contracts = Contract::with('semester', 'images')
        ->where('student_id', $student_id)
        ->when($semesterName, fn($q) =>
            $q->whereHas('semester', fn($sq) => $sq->where('semester', $semesterName))
        )
        ->when($schoolYearId, fn($q) =>
            $q->whereHas('semester', fn($sq) => $sq->where('school_year_id', $schoolYearId))
        )
        ->get();

    $referrals = Referral::with('semester', 'images')
        ->where('student_id', $student_id)
        ->when($semesterName, fn($q) =>
            $q->whereHas('semester', fn($sq) => $sq->where('semester', $semesterName))
        )
        ->when($schoolYearId, fn($q) =>
            $q->whereHas('semester', fn($sq) => $sq->where('school_year_id', $schoolYearId))
        )
        ->get();

    $counselings = Counseling::with('semester', 'images')
        ->where('student_id', $student_id)
        ->when($semesterName, fn($q) =>
            $q->whereHas('semester', fn($sq) => $sq->where('semester', $semesterName))
        )
        ->when($schoolYearId, fn($q) =>
            $q->whereHas('semester', fn($sq) => $sq->where('school_year_id', $schoolYearId))
        )
        ->get();

    return view('reports.view_student_records', compact(
        'student', 'contracts', 'referrals', 'counselings', 'schoolYearId', 'semesterName'
    ));
}

}
