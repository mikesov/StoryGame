<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * Get User model name.
     *
     * @return string
     */
    public function getModel(): string
    {
        return User::class;
    }
}
