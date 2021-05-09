<?php

namespace App\Listeners;

use App\Events\VideoUploaded;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use Storage;

class GenerateVideoThumb
{
    const THUMB_DIR = 'videothumbs';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(VideoUploaded $event)
    {
        $file = $event->video->path;
        if ($file) {
            $ffmpeg = FFMpeg::create([
                'ffmpeg.binaries' => env('FFMPEG_BINARY', 'f:/ffmpeg/bin/ffmpeg.exe'), //'f:/ffmpeg/bin/ffmpeg.exe', // the path to the FFMpeg binary
                'ffprobe.binaries' => env('FFMPEG_PROBE', 'f:/ffmpeg/bin/ffprobe.exe'), // the path to the FFProbe binary
                'timeout' => 3600, // the timeout for the underlying process
                'ffmpeg.threads' => 12,   // the number of threads that FFMpeg should use
            ]);
            $video = $ffmpeg->open(storage_path('app/public/').$file);
            $frame = $video->frame(TimeCode::fromSeconds(5));

            $thumbName = uniqid().'.jpg';
            if (!Storage::exists(self::THUMB_DIR)) {
                Storage::makeDirectory(self::THUMB_DIR);
            }

            $frame->save(storage_path('app/public/'.self::THUMB_DIR.'/').$thumbName);
            $event->video->update(['thumb' => self::THUMB_DIR.'/'.$thumbName]);
        }
    }
}
