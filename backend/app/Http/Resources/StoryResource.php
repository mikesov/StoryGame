<?php

namespace App\Http\Resources;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cover' => $this->cover,
            'reward' => $this->reward,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'pages' => PageResource::collection($this->whenLoaded('pages')),
        ];
    }
}
