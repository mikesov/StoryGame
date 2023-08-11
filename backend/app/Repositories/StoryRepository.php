<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterfaces\StoryRepositoryInterface;
use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;

class StoryRepository implements StoryRepositoryInterface
{
    /**
     * Get all users.
     *
     * @return Collection
     */
    public function getAll()
    {
        return Story::orderBy('created_at', 'desc')->paginate(20);
    }

    /**
     * Find the story by $id.
     *
     * @param $id
     * @return Story
     */
    public function find($id): Story
    {
        return Story::find($id);
    }
}
