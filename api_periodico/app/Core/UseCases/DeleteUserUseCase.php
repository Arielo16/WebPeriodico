<?php

namespace App\Core\UseCases;

use App\Core\Entities\User;

class DeleteUserUseCase
{
    public function execute($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return ['error' => 'User not found'];
        }

        $user->delete();
        return ['success' => 'User deleted successfully'];
    }
}
