<?php

namespace App\Repositories;

use App\Models\ReadHistory;

class ReadHistoryRepository extends BaseRepository
{
    /**
     * Get the ReadHistory class name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return ReadHistory::class;
    }
}
