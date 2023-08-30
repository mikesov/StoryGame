<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $sentence = $this->whenLoaded('sentence');
        return [
            'id' => $this->id,
            'content' => $this->content,
            'order' => $this->order,
            'start' => $this->start,
            'end' => $this->end,
            'sentence' => new PageResource($sentence),
            'touchable' => TouchableResource::collection($this->whenLoaded('touchable')),
            'audio' => AudioResource::collection($this->whenLoaded('audio')),
        ];
    }
}
