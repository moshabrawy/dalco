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
        $endIndex = strpos($this->desc, '<!--end short-->');
        $short_desc = substr($this->desc, 0, $endIndex);
        $startIndex = strpos($this->desc, '<!--end short-->') + strlen('<!--end short-->');
        $long_desc = substr($this->desc, $startIndex);
        return [
            'id' => $this->id,
            'image' => $this->image,
            'title' => Str::limit($this->title, 100),
            'date' => $this->date,
            'owner' => $this->owner,
            'duration' => $this->duration,
            'price' => $this->price,
            'status' => $this->status,
            'type' => $this->type,
            'short_desc' => $short_desc,
            'image2' => !empty($this->gallery) ? asset('assets/images/projects/gallery/' . $this->gallery[0]) : $this->image,
            'desc' => $long_desc,
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
