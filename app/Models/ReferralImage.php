<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralImage extends Model
{
    use HasFactory;

    protected $fillable = ['referral_id', 'image_path'];

    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }
}
