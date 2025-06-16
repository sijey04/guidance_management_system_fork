<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class counseling extends Model
{
   protected $fillable = [
    'student_id',
    'session_date',
    'referred_by',
    'statement_of_problem',
    'tests_administered',
    'evaluation',
    'recommendation_action_taken',
    'follow_up',
    'guidance_counselor',
];

protected $casts = [
    'session_date' => 'datetime',
];



public function student()
{
    return $this->belongsTo(Student::class);
}






}
