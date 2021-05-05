<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Str;

class Activity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $datas = parent::toArray($request);
        $datas['icon'] = asset('storage/'.$this->icon);
        $datas['videos'] = Movie::collection($this->whenLoaded('videos'));
        $datas['videos_count'] = $this->videos_count;
        $datas['finished'] = now() < $this->end_date ? 0 : 1;

        $datas['description'] = $request->activity ? $datas['description'] : Str::limit($datas['description'], 100);

        return $datas;
    }
}
