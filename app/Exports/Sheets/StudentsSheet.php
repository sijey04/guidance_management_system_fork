<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class StudentsSheet implements FromArray, WithTitle
{
    protected $students, $contractCounts, $referralCounts, $counselingCounts;

    public function __construct($students, $contractCounts, $referralCounts, $counselingCounts)
    {
        $this->students = $students;
        $this->contractCounts = $contractCounts;
        $this->referralCounts = $referralCounts;
        $this->counselingCounts = $counselingCounts;
    }

    public function array(): array
    {
        $data = [
            ['Student ID', 'Name', 'Course', 'Year & Section', 'Contracts', 'Referrals', 'Counseling'],
        ];

        foreach ($this->students as $student) {
            $data[] = [
                $student->student->student_id,
                $student->student->first_name . ' ' . $student->student->last_name,
                $student->course,
                $student->year_level . ' ' . $student->section,
                $this->contractCounts[$student->student_id] ?? 0,
                $this->referralCounts[$student->student_id] ?? 0,
                $this->counselingCounts[$student->student_id] ?? 0,
            ];
        }

        return $data;
    }

    public function title(): string
    {
        return 'Students';
    }
}
