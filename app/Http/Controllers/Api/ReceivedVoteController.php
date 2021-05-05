<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceivedVoteController extends Controller
{
    public function index() {
        $datas = Auth::user()->voteusers()->with(['video', 'user'])->paginate();
        return $datas;

    }
}
