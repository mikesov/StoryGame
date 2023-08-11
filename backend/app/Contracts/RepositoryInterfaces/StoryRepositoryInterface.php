<?php

namespace App\Contracts\RepositoryInterfaces;

interface StoryRepositoryInterface extends AbstractRepositoryInterface
{
    public function getAll();
    public function find($id);
}