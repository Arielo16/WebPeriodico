<?php

namespace App\Core\UseCases;

use App\Core\Entities\User;

class UpdateUserUseCase
{
    public function execute($id, array $data)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return ['error' => 'User not found'];
        }

        $user->update($data);
        return ['success' => 'User updated successfully', 'user' => $user];
    }
}
