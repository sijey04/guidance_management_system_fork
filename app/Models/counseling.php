<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class counseling extends Model
{
   use HasFactory;

    protected $fillable = [
        'student_id',
        'counseling_date',
        'image_path',
        'semester_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }



public function semester()
{
    return $this->belongsTo(Semester::class, 'semester_id');
}


}
