<?php

namespace App\Core\UseCases;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginUserUseCase
{
    public function execute(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::login($user);
            return ['success' => 'Login successful', 'user' => $user];
        } else {
            return ['error' => 'Invalid email or password'];
        }
    }
}
