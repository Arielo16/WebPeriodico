<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Users\UseCases\RegisterUser;
use App\Core\Users\UseCases\LoginUser;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $registerUser;
    protected $loginUser;

    public function __construct(RegisterUser $registerUser, LoginUser $loginUser)
    {
        $this->registerUser = $registerUser;
        $this->loginUser = $loginUser;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = $this->registerUser->execute(
            $request->name,
            $request->email,
            $request->password
        );

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $token = $this->loginUser->execute(
            $request->email,
            $request->password
        );

        if ($token) {
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
