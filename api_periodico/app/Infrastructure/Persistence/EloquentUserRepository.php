<?php

namespace App\Infrastructure\Persistence;

use App\Core\Entities\User as CoreUser;
use App\Core\Repositories\UserRepository;
use App\Models\User as EloquentUser;

class EloquentUserRepository implements UserRepository
{
    public function getAll(): array
    {
        return EloquentUser::all()->toArray();
    }

    public function getById($id): ?CoreUser
    {
        $user = EloquentUser::find($id);
        if ($user) {
            return new CoreUser($user->id, $user->name, $user->email, $user->password);
        }
        return null;
    }

    public function create(array $data): CoreUser
    {
        $user = EloquentUser::create($data);
        return new CoreUser($user->id, $user->name, $user->email, $user->password);
    }

    public function update($id, array $data): ?CoreUser
    {
        $user = EloquentUser::find($id);
        if ($user) {
            $user->update($data);
            return new CoreUser($user->id, $user->name, $user->email, $user->password);
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
