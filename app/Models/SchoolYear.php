<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $fillable = ['start_date', 'end_date', 'school_year', 'is_active'];

    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }
}

