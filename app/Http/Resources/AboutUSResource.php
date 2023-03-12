<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutUSResource extends JsonResource
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
            'title' => $this->title,
            'desc' => $this->desc,
            'logo' => $this->image,
            'video' => $this->video,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'projects_info' => [
                ['value' => $this->projects_info[0]],
                ['value' => $this->projects_info[1]],
                ['value' => $this->projects_info[2]],
            ],

        ];
    }
}
