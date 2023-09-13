<?php

namespace App\Http\Resources;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $story = $this->whenLoaded('story');
        return [
            'id' => $this->id,
            'page_number' => $this->page_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'story' => new StoryResource($story),
            'sentence' => SentenceResource::collection($this->whenLoaded('sentence')),
            'image' => ImageResource::collection($this->whenLoaded('image')),
        ];
    }
}
