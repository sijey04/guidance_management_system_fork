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
            ['School Year', 'Semester', 'Student Name', 'Transition Type', 'Date'],
        ];

        foreach ($this->transitions as $transition) {
            $data[] = [
                $transition->semester->schoolYear->school_year ?? 'N/A',
                $transition->semester->semester ?? 'N/A',
                $transition->last_name . ', ' . $transition->first_name,
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

