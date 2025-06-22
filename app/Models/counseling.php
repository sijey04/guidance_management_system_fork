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
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }



}
