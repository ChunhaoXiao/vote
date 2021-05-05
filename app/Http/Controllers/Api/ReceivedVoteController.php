<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Movie;
class ReceivedVoteController extends Controller
{
    public function index() {
        $datas = Auth::user()->voteusers()->with(['video', 'user'])->paginate();
        $datas->map(function($item){
            $item->video = new Movie($item->movie);
            
        });
        return $datas;

    }
}
