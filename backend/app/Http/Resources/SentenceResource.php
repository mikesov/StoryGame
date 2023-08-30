<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SentenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $page = $this->whenLoaded('page');
        return [
            'id' => $this->id,
            'coordinateX' => $this->coordinateX,
            'coordinateY' => $this->coordinateY,
            'content' => $this->content,
            'page' => new PageResource($page),
        ];
    }
}
