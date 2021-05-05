<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'user_id',
    ];

    public function video()
    {
        return $this->belongsTo(Movie::class, 'video_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
