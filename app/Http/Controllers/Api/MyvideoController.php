<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Movie;
class MyvideoController extends Controller
{
    public function index() {
        $datas = Auth::user()->videos()->with('activity')->latest()->paginate();
        return Movie::collection($datas);
    }
}
