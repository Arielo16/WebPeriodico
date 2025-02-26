<?php

namespace App\Core\Users\UseCases;

use App\Core\Users\Entities\UserEntity;
use App\Core\Users\Repositories\UserRepository;

class RegisterUser
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($name, $email, $password)
    {
        $userEntity = new UserEntity(null, $name, $email, $password);
        $userData = [
            'name' => $userEntity->name,
            'email' => $userEntity->email,
            'password' => $userEntity->password,
        ];
        return $this->userRepository->create($userData);
    }
}
