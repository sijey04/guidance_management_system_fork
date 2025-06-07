<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id'; // Correct primary key
    protected $fillable = [
        'student_id', // Add this field
        'first_name',
        'last_name',
        'age',
        'gender',
        'enrollment_status',
        'course_year',
        'home_address',
        'father_occupation',
        'mother_occupation',
        'number_of_sisters',
        'number_of_brothers',
        'ordinal_position',
        'enrolled_semester',
        'enrollment_date',
    ];

    //Optional: Add this to make the model work with the EnrollmentDate field if it is a Carbon instance
    protected $dates = ['enrollment_date'];

}