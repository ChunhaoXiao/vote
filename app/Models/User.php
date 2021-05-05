<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'open_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function score_videos()
    {
        return $this->belongsToMany(Movie::class, 'video_rates', 'user_id', 'video_id')->withTimestamps();
    }

    public function vote_videos()
    {
        return $this->belongsToMany(Movie::class, 'votes', 'user_id', 'video_id')->withTimestamps();
    }

    public function videos()
    {
        return $this->hasMany(Movie::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(VideoComment::class, 'user_id');
    }

    public function voteusers() {
        return $this->hasManyThrough(Vote::class, Movie::class, 'user_id', 'video_id');
    }

    public function getUsernameAttribute()
    {
        return $this->name ?? 'user_'.$this->id;
    }
}
