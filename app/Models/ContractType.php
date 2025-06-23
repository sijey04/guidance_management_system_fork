<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function semester()
{
    return $this->belongsTo(Semester::class, 'semester_id');
}

}

