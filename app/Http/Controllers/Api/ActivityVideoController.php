<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Movie;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityVideoController extends Controller
{
    public function index(Activity $activity)
    {
        $videos = $activity->videos()->myselect(Auth::id())->paginate();

        return Movie::collection($videos);
    }
}
