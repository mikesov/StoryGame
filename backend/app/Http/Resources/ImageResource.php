<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $page = $this->whenLoaded('page');
        $touchable = $this->whenLoaded('touchable');
        return [
            'id' => $this->id,
            'image' => $this->image,
            'page' => new PageResource($page),
            'touchable' => new TouchableResource($touchable),
        ];
    }
}
