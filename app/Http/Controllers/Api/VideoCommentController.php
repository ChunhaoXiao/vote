<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comment;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
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
        Auth::user()->comments()->save($data);
    }
}
