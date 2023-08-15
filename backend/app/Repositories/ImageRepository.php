<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository extends BaseRepository
{
    /**
     * Get Image model name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return Image::class;
    }
}
