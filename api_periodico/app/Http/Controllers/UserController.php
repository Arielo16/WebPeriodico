<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Users\UseCases\RegisterUser;
use App\Core\Users\UseCases\LoginUser;
use Illuminate\Support\Facades\Validator;
use App\Core\Users\UseCases\UserProfile;

class UserController extends Controller
{
    protected $registerUser;
    protected $loginUser;
    protected $userProfile;

    public function __construct(RegisterUser $registerUser, LoginUser $loginUser, UserProfile $userProfile)
    {
        $this->registerUser = $registerUser;
        $this->loginUser = $loginUser;
        $this->userProfile = $userProfile;
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

        $user = $this->loginUser->execute(
            $request->email,
            $request->password
        );

        if ($user) {
            return response()->json(['user' => $user], 200); // Devuelve el usuario autenticado
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function showProfile(Request $request)
    {
        $user = $request->user();
        return response()->json($user);
    }

    public function getUserProfile($name)
    {
        $profile = $this->userProfile->execute($name);
        if (!$profile) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($profile);
    }

    public function getLoggedInUserName(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json(['name' => $user->name]);
    }

    public function getLoggedInUserProfile(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $profile = $this->userProfile->getProfileById($user->id);
        if (!$profile) {
            return response()->json(['error' => 'User not found'], 404);
        }
        return response()->json($profile);
    }
}
