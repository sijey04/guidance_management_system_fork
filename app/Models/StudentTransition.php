<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTransition extends Model
{
     use HasFactory;

     protected $table = 'student_transition';
    protected $fillable = [
        'student_id',
        'last_name',
        'first_name',
        'semester_id',
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

 public function student()
{
    return $this->belongsTo(Student::class);
}

public function schoolYear()
{
    return $this->belongsTo(\App\Models\SchoolYear::class);
}

public function semester()
{
    return $this->belongsTo(Semester::class);
}
// public function images()
// {
//     return $this->hasMany(StudentTransitionImage::class);
// }
public function images()
{
    return $this->hasMany(StudentTransitionImage::class, 'student_transition_id');
}


}
