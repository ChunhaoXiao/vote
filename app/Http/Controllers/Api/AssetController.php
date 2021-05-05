<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssetResource;

class AssetController extends Controller
{
    public function index() {
        return AssetResource::all()->each(function ($item, $key) {
            return $item->path = $item->full_path;
        })->pluck('path', 'mark');
    }
}
