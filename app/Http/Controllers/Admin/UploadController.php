<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file->store('assets');
        $data['path'] = $file;
        $data['fullpath'] = asset('storage/'.$file);
        $data['success'] = true;
        $mimeType = $request->file->getMimeType();
        $data['type'] = strpos($mimeType, 'video') !== false ? 'video' : 'image';
        return response()->json($data);
    }
}
