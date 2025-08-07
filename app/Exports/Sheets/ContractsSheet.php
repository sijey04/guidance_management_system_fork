<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class ContractsSheet implements FromArray, WithTitle
{
    protected $contracts;

    public function __construct($contracts)
    {
        $this->contracts = $contracts;
    }

    public function array(): array
    {
        $data = [
            ['No.', 'Student ID','Student', 'Type', 'Status', 'Start Date', 'Total Days', 'End Date','Remark'],
        ];

        foreach ($this->contracts as $index => $contract) {
            $data[] = [
                $index + 1, // Auto-numbering
                $contract->student->student_id,
                $contract->student->last_name . ', ' . $contract->student->first_name. ' ' . $contract->student->middle_name. '.',
                $contract->contract_type,
                $contract->status,
                $contract->start_date,
                $contract->total_days,
                $contract->end_date,
                $contract->remarks,
            ];
        }

        return $data;
    }

    public function title(): string
    {
        return 'Contracts';
    }
}
