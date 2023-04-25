<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => Str::limit($this->title, 40),
            'status' => $this->status,
            'desc' => Str::limit($this->desc, 150),
            'image' => $this->image
        ];
    }
}
