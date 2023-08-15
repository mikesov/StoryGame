<?php

namespace App\Repositories;

use App\Models\Word;

class WordRepository extends BaseRepository
{
    /**
     * Get Word model name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return Word::class;
    }
}
