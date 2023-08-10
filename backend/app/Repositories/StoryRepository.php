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
        return Story::all();
    }
}
