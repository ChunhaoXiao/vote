<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'path',
        'user_id',
        'activity_id',
    ];

    // public function votes()
    // {
    //     return $this->hasMany(Vote::class, 'video_id');
    // }

    public function vote_users()
    {
        return $this->belongsToMany(User::class, 'votes', 'video_id', 'user_id');
    }

    public function score_users()
    {
        return $this->belongsToMany(User::class, 'video_rates', 'video_id', 'user_id')->withPivot('score');
    }

    public function scores()
    {
        return $this->hasMany(VideoRate::class, 'video_id');
    }

    public function scopeMyselect($query, $user_id)
    {
        return $query->withCount(['vote_users', 'comments', 'vote_users as myvote' => function ($query) use ($user_id) {$query->where('user_id', $user_id); }, 'score_users as myscore' => function ($query) use ($user_id) {$query->where('user_id', $user_id); }])->withAvg('scores', 'score')->with('user');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class)->withDefault();
    }

    public function comments()
    {
        return $this->hasMany(VideoComment::class, 'video_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
