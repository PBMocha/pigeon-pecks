<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author' => $this->user->name,
            'title' => $this->title,
            'body' => $this->body,
            'likes' => $this->likes,
            'created_at' => (string) $this->created_at,
        ];
    }
}
