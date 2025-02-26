<?php

namespace App\Core\UseCases;

use App\Core\Entities\User;

class GetAllUsersUseCase
{
    public function execute()
    {
        return User::all();
    }
}
