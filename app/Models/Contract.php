<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    // Temporarily disabled until deleted_at column migration runs
    // use SoftDeletes;
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


// Contract.php
public function original()
{
    return $this->belongsTo(Contract::class, 'original_contract_id');
}

public function carriedOver()
{
    return $this->hasOne(Contract::class, 'original_contract_id');
}

}
