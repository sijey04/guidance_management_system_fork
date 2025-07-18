<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pest\Plugins\Profile;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'students';
    protected $primaryKey = 'id'; // Correct primary key
    protected $fillable = [
        'student_id', // Add this field
        'first_name',
        'middle_name', // NEW
        'last_name',
        'suffix', // NEW
        'birthday',
        'gender',
        'enrollment_status',
        'course_year',
        'section',
        'home_address',
        'father_occupation',
        'mother_occupation',
        'parent_guardian_name',
        'parent_guardian_contact',
        'number_of_sisters',
        'number_of_brothers',
        'ordinal_position',
        'enrolled_semester',
        'enrollment_date',
        'fathers_name',
        'mothers_name',
        'student_contact',
    ];

    protected $casts = [
    'birthday' => 'date',
];

    protected $dates = ['enrollment_date', 'birthday'];

    public function enrollments(){
        return $this->hasMany(StudentSemesterEnrollment::class);
    }

    public function semesters(){
        return $this->belongsToMany(Semester::class, 'student_semester_enrollments')
                    ->withPivot('is_enrolled', 'remarks')
                    ->withTimestamps();
    }
    public function currentEnrollment(){
        $currentSemester = Semester::where('is_current', true)->first();
        if (!$currentSemester) {
            return null; // No active semester set
        }
        return $this->enrollments()->where('semester_id', $currentSemester->id)->first();
    }

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

public function counselings()
{
    return $this->hasMany(Counseling::class);
}

public function profiles()
{
    return $this->hasMany(StudentProfile::class);
}

public function profileForSemester($semesterId)
{
    return $this->profiles()->where('semester_id', $semesterId)->first();
}



public function referrals() {
    return $this->hasMany(Referral::class);
}

// In Student.php, Referral.php, etc.
public function user()
{
    return $this->belongsTo(User::class);
}



public function transitions()
{
    return $this->hasMany(StudentTransition::class);
}


}

