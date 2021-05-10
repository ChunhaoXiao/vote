<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
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
        // return  parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title ?? $this->description,
            'description' => $this->description,
            'author' => $this->user->username ?? '',
            'activity_id' => $this->activity_id,
            'path' => asset('storage/'.$this->path),
            'pictures' => $this->picture_path,
            'vote_count' => $this->vote_users_count,
            'score' => round($this->scores_avg_score),
            'myvote' => $this->myvote,
            'myscore' => $this->myscore,
            'comments_count' => $this->comments_count,
            'created_at' => $this->created_at->toDateTimeString(),
            'thumb' => asset('storage/'.$this->thumb),
            'fake_title' => $this->fake_title,
        ];
    }
}
