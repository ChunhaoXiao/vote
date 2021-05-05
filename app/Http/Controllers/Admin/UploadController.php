<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use FFMpeg\FFMpeg;
use FFMpeg;
use Illuminate\Http\Request;
use Storage;

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
        if ($data['type'] == 'video') {
            //$ffmpeg = FFMpeg\FFMpeg::create();
            //$video = $ffmpeg->open();
            //\FFMpeg::open(Storage::url($file))->getFrameFromSeconds(10)->export()->toDisk('thumnails')->save('FrameAt10sec.png');
        }

        return response()->json($data);
    }
}
