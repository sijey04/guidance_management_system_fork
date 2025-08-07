<?php
namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class TransitionsSheet implements FromArray, WithTitle
{
    protected $transitions;

    public function __construct($transitions)
    {
        $this->transitions = $transitions;
    }

    public function array(): array
    {
        $data = [
            ['No.','Student ID', 'School Year', 'Semester', 'Student Name', 'Transition Type', 'Date'],
        ];

        foreach ($this->transitions as $index => $transition) {
            $data[] = [
                $index +1,
                $transition->student->student_id,
                $transition->semester->schoolYear->school_year ?? 'N/A',
                $transition->semester->semester ?? 'N/A',
                $transition->student->last_name . ', ' . $transition->student->first_name. ' ' .$transition->student->middle_name. '.',
                $transition->transition_type,
                $transition->transition_date,
            ];
        }

        return $data;
    }

    public function title(): string
    {
        return 'Transitions';
    }
}

