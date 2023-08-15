<?php

namespace App\Repositories;

use App\Models\Audio;

class AudioRepository extends BaseRepository
{
    /**
     * Get Audio model name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return Audio::class;
    }
}
