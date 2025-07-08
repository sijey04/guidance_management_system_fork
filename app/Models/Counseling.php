<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counseling extends Model
{
   use HasFactory;

    protected $fillable = [
        'student_id',
        'counseling_date',
        'image_path',
        'semester_id',
        'status',
        'remarks',
    ];

    public function images()
{
    return $this->hasMany(CounselingImage::class);
}

    public function student()
    {
        return $this->belongsTo(Student::class);
    }



public function semester()
{
    return $this->belongsTo(Semester::class, 'semester_id');
}


}
