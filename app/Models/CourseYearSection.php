<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseYearSection extends Model
{
    use HasFactory;

    protected $fillable = ['course', 'year', 'section'];
}
