<?php
namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class ReferralsSheet implements FromArray, WithTitle
{
    protected $referrals;

    public function __construct($referrals)
    {
        $this->referrals = $referrals;
    }

    public function array(): array
    {
        $data = [
            ['Student', 'Reason', 'Remarks', 'Date'],
        ];

        foreach ($this->referrals as $referral) {
            $data[] = [
                $referral->student->first_name . ' ' . $referral->student->last_name,
                $referral->reason,
                $referral->remarks,
                $referral->referral_date,
            ];
        }

        return $data;
    }

    public function title(): string
    {
        return 'Referrals';
    }
}
