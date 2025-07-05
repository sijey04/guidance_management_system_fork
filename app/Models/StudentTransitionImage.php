<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTransitionImage extends Model
{
    protected $fillable = [
        'student_transition_id',
        'image_path',
    ];
    
    public function transition()
{
    return $this->belongsTo(StudentTransition::class, 'student_transition_id');
}

}
