<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

class PageRepository extends BaseRepository
{
    /**
     * Get Page model name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return Page::class;
    }
}
