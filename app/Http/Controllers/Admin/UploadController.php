<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use FFMpeg\FFMpeg;
//use FFMpeg;
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
        if ($data['type'] == 'video') {
            $ffmpeg = FFMpeg::create([
                'ffmpeg.binaries' => 'f:/ffmpeg/bin/ffmpeg.exe', // the path to the FFMpeg binary
                'ffprobe.binaries' => 'f:/ffmpeg/bin/ffprobe.exe', // the path to the FFProbe binary
                'timeout' => 3600, // the timeout for the underlying process
                'ffmpeg.threads' => 12,   // the number of threads that FFMpeg should use
            ]);

            //$ffmpeg = FFMpeg\FFMpeg::create();
            //$video = $ffmpeg->open();
            $video = $ffmpeg->open(Storage::get($file));

            //$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(5));
            //$frame->save(storage_path('app/public').'/image.jpg');
            // $ffmpeg->open(asset('storage/'.$file))->getFrameFromSeconds(10)->export()->toDisk('thumnails')->save('FrameAt10sec.png');
        }

        return response()->json($data);
    }
}
