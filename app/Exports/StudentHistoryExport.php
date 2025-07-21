<?php

namespace App\Exports;

use App\Models\Contract;
use App\Models\Referral;
use App\Models\Counseling;
use App\Models\Student;
use App\Models\Semester;
use App\Models\SchoolYear;
use App\Models\StudentProfile;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentHistoryExport implements FromView
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $request = $this->request;

        $student = Student::findOrFail($request->student_id);
        $schoolYear = SchoolYear::find($request->school_year_id);
        $semesterName = $request->semester_name;
        $selectedTab = $request->tab ?? 'all'; // contracts, referrals, counselings, or all

        $semesterIds = Semester::where('school_year_id', $schoolYear?->id)
            ->where('semester', $semesterName)
            ->pluck('id');

        // Initialize empty collections
        $contracts = collect();
        $referrals = collect();
        $counselings = collect();

        // Load CONTRACTS if selected tab is 'contracts' or 'all'
        if ($selectedTab === 'contracts' || $selectedTab === 'all') {
            $contracts = Contract::with('semester')
                ->where('student_id', $student->id)
                ->whereIn('semester_id', $semesterIds)
                ->when($request->filter_contract_type, fn($q) => $q->where('contract_type', $request->filter_contract_type))
                ->when($request->filter_contract_status, fn($q) => $q->where('status', $request->filter_contract_status))
                ->get();
        }

        // Load REFERRALS if selected tab is 'referrals' or 'all'
        if ($selectedTab === 'referrals' || $selectedTab === 'all') {
            $referrals = Referral::with('semester')
                ->where('student_id', $student->id)
                ->whereIn('semester_id', $semesterIds)
                ->when($request->filter_reason, fn($q) => $q->where('reason', $request->filter_reason))
                ->get();
        }

        // Load COUNSELINGS if selected tab is 'counselings' or 'all'
        if ($selectedTab === 'counselings' || $selectedTab === 'all') {
            $allStudentCounselings = Counseling::with(['semester', 'original'])
                ->where('student_id', $student->id)
                ->get();

            $counselings = $allStudentCounselings->filter(function ($counseling) use ($semesterIds, $allStudentCounselings, $request) {
                if ($request->filled('filter_counseling_status') && $counseling->status !== $request->filter_counseling_status) {
                    return false;
                }

                $originalId = $counseling->original_counseling_id ?? $counseling->id;

                // If this is a carried-over copy, show it only if it's in the selected semester
                if (!is_null($counseling->original_counseling_id)) {
                    return $semesterIds->contains($counseling->semester_id);
                }

                // If this is the original, exclude it if a carried-over copy exists in selected semesters
                $hasCopyInCurrent = $allStudentCounselings->contains(function ($c) use ($originalId, $semesterIds) {
                    return $c->original_counseling_id == $originalId && $semesterIds->contains($c->semester_id);
                });

                return !$hasCopyInCurrent && $semesterIds->contains($counseling->semester_id);
            });
        }

        // Get latest profile within the selected semester(s)
        $profile = StudentProfile::where('student_id', $student->id)
            ->whereIn('semester_id', $semesterIds)
            ->latest()
            ->first();

        return view('exports.student_history_excel', [
            'student' => $student,
            'contracts' => $contracts,
            'referrals' => $referrals,
            'counselings' => $counselings,
            'profile' => $profile,
            'schoolYear' => $schoolYear,
            'semesterName' => $semesterName,
            'selectedTab' => $selectedTab,
        ]);
    }
}
