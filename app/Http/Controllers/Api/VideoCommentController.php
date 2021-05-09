<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\Comment;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class VideoCommentController extends Controller
{
    public function index(Movie $video)
    {
        $datas = $video->comments()->with('user')->paginate(5);

        return Comment::collection($datas);
    }

    public function store(CommentRequest $request, Movie $video)
    {
        $data = $video->comments()->make($request->input());

        return new Comment(Auth::user()->comments()->save($data));
    }
}
