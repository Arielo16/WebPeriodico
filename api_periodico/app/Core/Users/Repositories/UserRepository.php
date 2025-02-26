<?php

namespace App\Core\Users\Repositories;

use App\Core\Users\Entities\UserEntity;

interface UserRepository
{
    public function getAll(): array;

    public function getById($id): ?UserEntity;

    public function create(array $data): UserEntity;

    public function update($id, array $data): ?UserEntity;

    public function delete($id): bool;
}
