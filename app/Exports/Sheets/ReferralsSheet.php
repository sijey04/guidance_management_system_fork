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
            ['No.','Student ID','Student', 'Reason', 'Date', 'Remarks'],
        ];

        foreach ($this->referrals as $index => $referral) {
            $data[] = [
                $index +1,
                $referral->student->student_id,
                $referral->student->last_name . ', ' . $referral->student->first_name. ' ' .$referral->student->middle_name. '.',
                $referral->reason,
                $referral->referral_date,
                $referral->remarks,
            ];
        }

        return $data;
    }

    public function title(): string
    {
        return 'Referrals';
    }
}
