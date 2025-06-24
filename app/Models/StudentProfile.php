<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentProfile extends Model
{
    use SoftDeletes;
   protected $fillable = [
    'student_id',
    'semester_id',
    'course',
    'year_level',
    'section',
    'home_address',
    'father_occupation',
    'mother_occupation',
    'parent_guardian_name',
    'parent_guardian_contact',
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
