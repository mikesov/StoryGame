<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $touchable = $this->whenLoaded('touchable');
        return [
            'id' => $this->id,
            'coordinateX' => $this->coordinateX,
            'coordinateY' => $this->coordinateY,
            'touchable' => new TouchableResource($touchable),
        ];
    }
}
