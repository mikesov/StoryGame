<?php

namespace App\Repositories;

use App\Models\Sentence;

class SentenceRepository extends BaseRepository
{
    /**
     * Get Sentence model name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return Sentence::class;
    }
}
