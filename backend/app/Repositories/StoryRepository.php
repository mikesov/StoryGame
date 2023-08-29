<?php

namespace App\Repositories;

use App\Models\Page;
use App\Models\Story;
use Illuminate\Http\JsonResponse;

class StoryRepository extends BaseRepository
{
    /**
     * Get Story model name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return Story::class;
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function find($id): JsonResponse
    {
        $story = $this->model->with(['pages'])->where('id', $id)->first();
        return response()->json($story);
    }
}
