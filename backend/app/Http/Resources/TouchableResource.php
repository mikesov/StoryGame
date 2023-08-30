<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TouchableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $word = $this->whenLoaded('word');
        return [
            'id' => $this->id,
            'coordinateX' => $this->coordinateX,
            'coordinateY' => $this->coordinateY,
            'vertices' => $this->vertices,
            'word' => new PageResource($word),
            'image' => ImageResource::collection($this->whenLoaded('image')),
            'movement' => MovementResource::collection($this->whenLoaded('movement')),
        ];
    }
}
