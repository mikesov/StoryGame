<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReadHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $story = $this->whenLoaded('story');
        $user = $this->whenLoaded('user');
        return [
            'id' => $this->id,
            'finish' => $this->finish,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($user),
            'story' => new StoryResource($story),
        ];
    }
}
