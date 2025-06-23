<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    use HasFactory;

    protected $fillable = ['school_year_id', 'semester', 'is_current', 'is_active'];

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
   public function enrollments()
{
    return $this->hasMany(StudentSemesterEnrollment::class);
}

public function contracts()
{
    return $this->hasMany(Contract::class);
}

public static function getActiveSemester()
{
    return self::where('is_active', true)->first();
}


}
