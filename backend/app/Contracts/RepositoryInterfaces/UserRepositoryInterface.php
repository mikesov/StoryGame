<?php

namespace App\Contracts\RepositoryInterfaces;

interface UserRepositoryInterface extends AbstractRepositoryInterface
{
    public function getAll();
    public function find($id);
}
