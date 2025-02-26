<?php

namespace App\Core\UseCases;

use App\Core\Entities\User;

class GetUserUseCase
{
    public function execute($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return ['error' => 'User not found'];
        }

        return $user;
    }
}
