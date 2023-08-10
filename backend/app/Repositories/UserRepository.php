<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Get all users.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return User::all();
    }
}
