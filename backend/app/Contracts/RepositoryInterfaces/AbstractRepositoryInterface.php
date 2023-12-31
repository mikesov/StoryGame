<?php

namespace App\Contracts\RepositoryInterfaces;

interface AbstractRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function store($attributes = []);
    public function update(int $id, array $attributes = []);
    public function delete($id);
}
