<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class CounselingsSheet implements FromArray, WithTitle
{
    protected $counselings;

    public function __construct($counselings)
    {
        $this->counselings = $counselings;
    }

    public function array(): array
    {
        $data = [
            ['No.','Student ID','Student', 'Date', 'Status', 'Remarks'],
        ];

        foreach ($this->counselings as $index => $counseling) {
            $data[] = [
                 $index + 1, 
                 $counseling->student->student_id,
                $counseling->student->last_name . ', ' . $counseling->student->first_name. ' ' . $counseling->student->middle_name. '.' ,
                $counseling->counseling_date,
                $counseling->status,
                $counseling->remarks,
            ];
        }

        return $data;
    }

    public function title(): string
    {
        return 'Counselings';
    }
}

