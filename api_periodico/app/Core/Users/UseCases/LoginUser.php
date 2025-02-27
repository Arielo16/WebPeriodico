<?php

namespace App\Core\Users\UseCases;

use App\Core\Users\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class LoginUser
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($email, $password)
    {
        $credentials = ['email' => $email, 'password' => $password];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $user; // Eliminar createToken y devolver el usuario directamente
        }

        return null;
    }
}
