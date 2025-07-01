<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTransition extends Model
{
     use HasFactory;

     protected $table = 'student_transition';
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'transition_type',
        'from_program',
        'to_program',
        'reason_leaving',
        'reason_returning',
        'leave_reason',
        'remark',
        'transition_date',
    ];
}
