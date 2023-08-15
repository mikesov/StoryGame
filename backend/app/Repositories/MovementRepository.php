<?php

namespace App\Repositories;

use App\Models\Movement;

class MovementRepository extends BaseRepository
{
    /**
     * Get Movement model name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return Movement::class;
    }
}
