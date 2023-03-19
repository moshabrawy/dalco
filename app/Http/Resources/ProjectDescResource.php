<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProjectDescResource extends JsonResource
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
            'image' => $this->image,
            'title' => $this->title,
            'date' => $this->date,
            'owner' => $this->owner,
            'duration' => $this->duration,
            'price' => $this->price,
            'status' => $this->status,
            'type' => $this->type,
            'short_desc' => Str::limit($this->desc, 200),
            'image2' => !empty($this->gallery) ? asset('assets/images/projects/gallery/' . $this->gallery[0]) : $this->image,
            'desc' => $this->desc,
            $this->mergeWhen(!empty($this->gallery), function () {
                $project_gallery = [];
                foreach ($this->gallery as $img) {
                    $item = asset('assets/images/projects/gallery/' . $img);
                    array_push($project_gallery, $item);
                }
                return ['gallery' => $project_gallery];
            })
        ];
    }
}
