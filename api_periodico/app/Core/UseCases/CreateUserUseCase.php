<?php

namespace App\Core\UseCases;

use App\Core\Entities\User;
use App\Core\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class CreateUserUseCase
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return $this->userRepository->create($data);
    }
}
