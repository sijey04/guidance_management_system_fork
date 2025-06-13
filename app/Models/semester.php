<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    use HasFactory;

    protected $fillable = ['school_year', 'semester', 'is_current'];

   public function enrollments()
{
    return $this->hasMany(StudentSemesterEnrollment::class);
}

public function contracts()
{
    return $this->hasMany(Contract::class);
}

}
