<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
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
            'title' => $this->title,
            'workload' => $this->workload,
            'team' => new TeamResource($this->whenLoaded('team')),
            'skills' => SkillResource::collection($this->whenLoaded('skills')),
            'created_at' => $this->created_at,
        ];
    }
}
