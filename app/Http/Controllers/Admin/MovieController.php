<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Movie;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use View;

class MovieController extends Controller
{
    public function __construct()
    {
        $activities = Activity::all();
        View::share('activities', $activities);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $FFMpeg = FFMpeg::create([
        //     'ffmpeg.binaries' => 'f:/ffmpeg/bin/ffmpeg.exe', // the path to the FFMpeg binary
        //     'ffprobe.binaries' => 'f:/ffmpeg/bin/ffprobe.exe', // the path to the FFProbe binary
        //     'timeout' => 3600, // the timeout for the underlying process
        //     'ffmpeg.threads' => 12,   // the number of threads that FFMpeg should use
        // ]);
        // //dump($FFMpeg);
        // dump(storage_path('app/public'));
        // $video = $FFMpeg->open(storage_path('app/public').'/videos/9nAbrUlhK8pAxPi22tzxXb0tvzNDzLlVGltfrhDz.mp4');
        // $frame = $video->frame(TimeCode::fromSeconds(5));
        // $frame->save(storage_path('app/public').'/image.jpg');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dump($request->all());
        Movie::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
