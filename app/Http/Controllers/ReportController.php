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

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $schoolYears = SchoolYear::all();
        $selectedSY = $request->input('school_year_id');
        $selectedSemName = $request->input('semester_name');

        // Get semester(s) based on selected school year and semester name
        $semesters = Semester::query()
            ->when($selectedSY, fn($q) => $q->where('school_year_id', $selectedSY))
            ->when($selectedSemName, fn($q) => $q->where('semester', $selectedSemName))
            ->get();

        $semesterIds = $semesters->pluck('id');

        // Filtered records – return empty collection if semester doesn't exist
        $studentProfiles = $semesterIds->isNotEmpty()
            ? StudentProfile::with('student')->whereIn('semester_id', $semesterIds)->get()->unique('student_id')->values()
            : collect();

        $contracts = $semesterIds->isNotEmpty()
            ? Contract::with('student')->whereIn('semester_id', $semesterIds)->get()
            : collect();

        $referrals = $semesterIds->isNotEmpty()
            ? Referral::with('student')->whereIn('semester_id', $semesterIds)->get()
            : collect();

        $counselings = $semesterIds->isNotEmpty()
            ? Counseling::with('student')->whereIn('semester_id', $semesterIds)->get()
            : collect();

        // Transitions - optionally you can filter this later too
        // $transitions = $semesterIds->isNotEmpty()
        //     ? StudentTransition::whereIn('semester_id', $semesterIds)->get()
        //     : collect();
       $transitions = StudentTransition::all();
        // Unique student count
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

        $contracts = $semesterIds->isNotEmpty()
            ? Contract::with('semester', 'images')->where('student_id', $student_id)->whereIn('semester_id', $semesterIds)->get()
            : collect();

        $referrals = $semesterIds->isNotEmpty()
            ? Referral::with('semester', 'images')->where('student_id', $student_id)->whereIn('semester_id', $semesterIds)->get()
            : collect();

        $counselings = $semesterIds->isNotEmpty()
            ? Counseling::with('semester', 'images')->where('student_id', $student_id)->whereIn('semester_id', $semesterIds)->get()
            : collect();

        return view('reports.view_student_records', compact(
            'student', 'contracts', 'referrals', 'counselings',
            'schoolYearId', 'semesterName'
        ));
    }
}
