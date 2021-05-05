<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
    public function store(UploadRequest $request)
    {
        $file = $request->file->store('videos');

        return response()->json([
            'fullPath' => asset('storage/'.$file),
            'savePath' => $file,
        ]);
    }
}
