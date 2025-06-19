<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
   protected $fillable = [
    'student_id',
    'semester_id',
    'course_year',
    'section',
    'is_enrolled',
    'home_address',
    'father_occupation',
    'mother_occupation',
    'number_of_sisters',
    'number_of_brothers',
    'ordinal_position',
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
