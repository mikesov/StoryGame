<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }
}
