<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RateRequest;
class RateController extends Controller
{
    public function store(RateRequest $request, Movie $video)
    {
        $user = Auth::user();
        if ($user->score_videos()->where('video_id', $video->id)->exists()) {
            return response()->json(['errors' => '已经打过分了'], 422);
        }
        $user->score_videos()->attach($video, ['score' => $request->score]);

        return response()->json(['message' => '打分成功']);
    }
}
