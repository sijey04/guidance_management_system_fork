<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingImage extends Model
{
    use HasFactory;

    protected $fillable = ['counseling_id', 'image_path'];

    public function counseling()
    {
        return $this->belongsTo(Counseling::class);
    }
}
