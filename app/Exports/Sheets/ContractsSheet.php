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
            ['Student', 'Type', 'Status', 'Start Date', 'End Date'],
        ];

        foreach ($this->contracts as $contract) {
            $data[] = [
                $contract->student->first_name . ' ' . $contract->student->last_name,
                $contract->contract_type,
                $contract->status,
                $contract->start_date,
                $contract->end_date,
            ];
        }

        return $data;
    }

    public function title(): string
    {
        return 'Contracts';
    }
}

