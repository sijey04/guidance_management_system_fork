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
            ['No.', 'Student ID', 'Name', 'Course', 'Year','Section'],
        ];

        foreach ($this->students as $index => $student) {
            $data[] = [
                $index + 1, 
                $student->student->student_id,
                $student->student->last_name . ', ' . $student->student->first_name. ' ' .$student->student->middle_name. ',',
                $student->course,
                $student->year_level,
                $student->section,
            ];
        }

        return $data;
    }

    public function title(): string
    {
        return 'Students';
    }
}
