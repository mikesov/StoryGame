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
        $story = $this->model->with([
            'pages',
            'pages.image',
            'pages.sentences',
            'pages.sentences.words',
            'pages.sentences.audio',
            'pages.sentences.words.audio',
            'pages.sentences.words.touchable',
            'pages.sentences.words.touchable.image',
            'pages.sentences.words.touchable.movement'
        ])->where('id', $id)->first();
        if (!$story) {
            return response()->json([
                'message' => 'No story found with the given id: '.$id,
            ], 404);
        }
        return response()->json($story);
    }
}
