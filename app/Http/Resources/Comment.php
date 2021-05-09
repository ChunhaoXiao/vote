<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Jenssegers\Date\Date;
use Carbon\Carbon;
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
        Date::setlocale("cmn");
        $datas = parent::toArray($request);
        $datas['user'] = $this->user->username;
        $datas['created_at'] = $this->created_at->toDateTimeString();
        $datas['created'] = Carbon::parse($this->created_at)->diffForHumans();
        return $datas;
    }
}
