<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    use HasFactory;

    protected $fillable = ['type','requires_total_days',
    'requires_start_date',];

    public function semester()
{
    return $this->belongsTo(Semester::class, 'semester_id');
}

}

