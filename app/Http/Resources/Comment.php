<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
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
        $datas['user'] = $this->user->username;
        $datas['created_at'] = $this->created_at->toDateTimeString();

        return $datas;
    }
}
