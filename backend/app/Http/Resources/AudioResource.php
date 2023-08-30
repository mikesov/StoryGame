<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AudioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $sentence = $this->whenLoaded('sentence');
        $word = $this->whenLoaded('word');
        return [
            'id' => $this->id,
            'audio' => $this->image,
            'sentence' => new SentenceResource($sentence),
            'word' => new WordResource($word),
        ];
    }
}
