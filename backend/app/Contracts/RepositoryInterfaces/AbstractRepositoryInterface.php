<?php

namespace App\Contracts\RepositoryInterfaces;

interface AbstractRepositoryInterface
{
    public function getAll();
    public function find($id);
}
