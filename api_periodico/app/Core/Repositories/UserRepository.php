<?php

namespace App\Core\Repositories;

use App\Core\Entities\User;

interface UserRepository
{
    public function getAll(): array;
    public function getById($id): ?User;
    public function create(array $data): User;
    public function update($id, array $data): ?User;
    public function delete($id): bool;
}
