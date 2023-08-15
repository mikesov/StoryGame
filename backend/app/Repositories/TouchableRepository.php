<?php

namespace App\Repositories;

use App\Models\Touchable;

class TouchableRepository extends BaseRepository
{
    /**
     * Get Touchable model name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return Touchable::class;
    }
}
