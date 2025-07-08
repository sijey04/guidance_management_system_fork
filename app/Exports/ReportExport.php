<?php

namespace App\Exports;

use App\Models\Contract;
use App\Models\Counseling;
use App\Models\Referral;
use App\Models\Semester;
use App\Models\StudentProfile;
use App\Models\StudentTransition;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $request = $this->request;
        $tab = $request->tab ?? 'all';

        $schoolYearId = $request->school_year_id;
        $semesterName = $request->semester_name;

        $semesterIds = Semester::where('school_year_id', $schoolYearId)
            ->where('semester', $semesterName)
            ->pluck('id');

        $students = StudentProfile::with('student')
            ->whereIn('semester_id', $semesterIds)
            ->when($request->filled('filter_course'), fn($q) => $q->where('course', $request->filter_course))
            ->when($request->filled('filter_year'), fn($q) => $q->where('year_level', $request->filter_year))
            ->when($request->filled('filter_section'), fn($q) => $q->where('section', $request->filter_section))
            ->get()
            ->unique('student_id');

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

        return view('reports.export_excel', [
            'students' => $students,
            'contracts' => $contracts,
            'referrals' => $referrals,
            'counselings' => $counselings,
            'transitions' => $transitions,
            'tab' => $tab,
            'contractCounts' => $contractCounts,
            'referralCounts' => $referralCounts,
            'counselingCounts' => $counselingCounts,
        ]);
    }
}
