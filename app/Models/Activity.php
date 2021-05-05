<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'description',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
    ];

    public function videos()
    {
        return $this->hasMany(Movie::class, 'activity_id');
    }

    public function scopeActive($query)
    {
        //return $query->has('videos')->orderBy('end_date', 'desc')->limit(1);
        return $query->orderBy('end_date', 'desc')->limit(1);
    }
}
