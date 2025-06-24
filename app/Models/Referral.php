<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'semester_id',
        'reason',
        'remarks',
        'image_path',
        'referral_date'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function reason()
{
    return $this->belongsTo(ReferralReason::class, 'reason_id');
}

public function semester()
{
    return $this->belongsTo(Semester::class);
}




}
