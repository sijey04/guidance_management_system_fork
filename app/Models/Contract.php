<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
    'student_id',
    'semester_id',
    'contract_date',
    'total_days',
    'completed_days',
    'status',
    'contract_type',
    'contract_image',
    'start_date',
    'end_date',
    'remarks',
];

public function images()
{
    return $this->hasMany(ContractImage::class);
}


public function semester()
{
    return $this->belongsTo(Semester::class);
}

public function student()
{
    return $this->belongsTo(Student::class);
}

// Contract.php (Model)
public function contractType()
{
    return $this->belongsTo(ContractType::class, 'contract_type_id');
}



}
