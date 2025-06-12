<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSemesterEnrollment extends Model
{
    protected $fillable = [
    'student_id',
    'semester_id',
    'is_enrolled',
];

    public function student()
{
    return $this->belongsTo(Student::class);
}

public function semester()
{
    return $this->belongsTo(Semester::class);
}

}
