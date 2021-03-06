<?php

//前台首页

namespace App\Http\Controllers\Api;

use App\Events\VideoUploaded;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoStoreRequest;
use App\Http\Resources\Activity as ActivityResource;
use App\Http\Resources\Movie as MovieResource;
use App\Models\Activity;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        // $activity = Activity::active()->first();
        // if($activity) {
        //     $datas = $activity->videos()->myselect(Auth::id())->latest()->paginate();
        // }
        //$datas = Movie::myselect(Auth::id())->latest()->paginate();
        //$datas = Activity::active()->with(['videos' => function ($query) { $query->myselect(Auth::id())->latest()->limit(8); }])->first();
        $activity = Activity::active()->first();
        $videos = $activity->videos()->myselect(Auth::id())->paginate(8);

        return [
            'activity' => new ActivityResource($activity), 
            'videos' => MovieResource::collection($videos),
        ];

        //return MovieResource::collection($datas);
    }

    public function show(Movie $video)
    {
        $video = Movie::myselect(Auth::id())->find($video->id);

        return new MovieResource($video);
    }

    public function store(VideoStoreRequest $request)
    {
        $movie = Auth::user()->videos()->create($request->all());
        event(new VideoUploaded($movie));
    }
}
