<?php

namespace App\Http\Controllers\Admin;

use App\Events\VideoUploaded;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Movie;
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
        $datas = Movie::latest()->with('activity')->paginate();

        return view('admin.movie.index', ['datas' => $datas]);
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
        $video = Movie::create($request->all());
        event(new VideoUploaded($video));
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

        $movie = Movie::findOrFail($id);
        return view('admin.movie.create', ['data' => $movie]);
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
        $movie = Movie::findOrFail($id);
        $movie->update($request->input());
        return redirect()->route('admin.movie.index');
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
        Movie::destroy($id);

        return response()->json(['success' => 1]);
    }
}
