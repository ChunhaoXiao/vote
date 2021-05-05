<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Movie;
use Illuminate\Support\Facades\Auth;

class MyVoteController extends Controller
{
    public function index()
    {
        $videos = Auth::user()->vote_videos()->with('activity')->withCount('vote_users')->latest()->paginate();

        return Movie::collection($videos);
    }
}
