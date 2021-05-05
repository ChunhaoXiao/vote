<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
class VoteController extends Controller
{
    public function store(Request $request, Movie $video) {
        $user = $request->user();
        if($user->vote_videos()->where('video_id', $video->id)->exists()) {
            return response()->json(['errors' => '已经投过票了'],422);
        }
        $user->vote_videos()->attach($video);
    }
}
