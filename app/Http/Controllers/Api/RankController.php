<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Movie;
use App\Models\Activity;

class RankController extends Controller
{
    public function index(Activity $activity)
    {
        $datas = $activity->videos()->withAvg('scores', 'score')->orderBy('scores_avg_score', 'desc')->limit(10)->get();

        return Movie::collection($datas);
    }
}
