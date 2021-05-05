<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Movie;
use Illuminate\Support\Facades\Auth;

class MyScoreController extends Controller
{
    public function index()
    {
        $videos = Auth::user()->score_videos()->with('activity')->withCount('score_users')->latest()->paginate();

        return Movie::collection($videos);
    }
}
