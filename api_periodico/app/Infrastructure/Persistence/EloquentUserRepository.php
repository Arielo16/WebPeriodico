<?php

namespace App\Infrastructure\Persistence;

use App\Core\Users\Entities\UserEntity;
use App\Core\Users\Repositories\UserRepository;
use App\Models\User as EloquentUser;

class EloquentUserRepository implements UserRepository
{
    public function getAll(): array
    {
        return EloquentUser::all()->map(function ($user) {
            return new UserEntity($user->id, $user->name, $user->email, $user->password);
        })->toArray();
    }

    public function getById($id): ?UserEntity
    {
        $user = EloquentUser::find($id);
        if ($user) {
            return new UserEntity($user->id, $user->name, $user->email, $user->password);
        }
        return null;
    }

    public function create(array $data): UserEntity
    {
        $user = EloquentUser::create($data);
        return new UserEntity($user->id, $user->name, $user->email, $user->password);
    }

    public function update($id, array $data): ?UserEntity
    {
        $user = EloquentUser::find($id);
        if ($user) {
            $user->update($data);
            return new UserEntity($user->id, $user->name, $user->email, $user->password);
        }
        return null;
    }

    public function delete($id): bool
    {
        $user = EloquentUser::find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }
}
