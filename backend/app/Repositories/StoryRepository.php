<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterfaces\StoryRepositoryInterface;
use App\Models\Story;

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
}
