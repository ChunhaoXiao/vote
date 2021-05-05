<?php
//前台首页
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Movie as MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Http\Resources\Activity as ActivityResource;
use App\Http\Requests\VideoStoreRequest;
class MovieController extends Controller
{
    public function index()
    {
        // $activity = Activity::active()->first();
        // if($activity) {
        //     $datas = $activity->videos()->myselect(Auth::id())->latest()->paginate();
        // }
        //$datas = Movie::myselect(Auth::id())->latest()->paginate();
        $datas = Activity::active()->with(['videos' => function($query){ $query->myselect(Auth::id())->latest()->limit(8);}])->first();

        return new ActivityResource($datas);

        //return MovieResource::collection($datas);
    }

    public function show(Movie $video)
    {
        $video = Movie::myselect(Auth::id())->find($video->id);

        return new MovieResource($video);
    }

    public function store(VideoStoreRequest $request)
    {
        Auth::user()->videos()->create($request->all());
    }
}
