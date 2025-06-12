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

    public function enrollments()
{
    return $this->hasMany(StudentSemesterEnrollment::class);
}

public function semesters()
{
    return $this->belongsToMany(Semester::class, 'student_semester_enrollments')
                ->withPivot('is_enrolled', 'remarks')
                ->withTimestamps();
}
public function currentEnrollment()
{
    $currentSemester = Semester::where('is_current', true)->first();

    if (!$currentSemester) {
        return null; // No active semester set
    }

    return $this->enrollments()->where('semester_id', $currentSemester->id)->first();
}

}

