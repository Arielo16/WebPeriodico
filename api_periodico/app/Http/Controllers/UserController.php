<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Core\UseCases\CreateUserUseCase;
use App\Core\UseCases\DeleteUserUseCase;
use App\Core\UseCases\GetAllUsersUseCase;
use App\Core\UseCases\GetUserUseCase;
use App\Core\UseCases\UpdateUserUseCase;
use App\Core\UseCases\LoginUserUseCase;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $createUserUseCase;
    private $deleteUserUseCase;
    private $getAllUsersUseCase;
    private $getUserUseCase;
    private $updateUserUseCase;
    private $loginUserUseCase;

    public function __construct(
        CreateUserUseCase $createUserUseCase,
        DeleteUserUseCase $deleteUserUseCase,
        GetAllUsersUseCase $getAllUsersUseCase,
        GetUserUseCase $getUserUseCase,
        UpdateUserUseCase $updateUserUseCase,
        LoginUserUseCase $loginUserUseCase
    ) {
        $this->createUserUseCase = $createUserUseCase;
        $this->deleteUserUseCase = $deleteUserUseCase;
        $this->getAllUsersUseCase = $getAllUsersUseCase;
        $this->getUserUseCase = $getUserUseCase;
        $this->updateUserUseCase = $updateUserUseCase;
        $this->loginUserUseCase = $loginUserUseCase;
    }

    public function index()
    {
        return response()->json($this->getAllUsersUseCase->execute());
    }

    public function store(UserRequest $request)
    {
        return response()->json($this->createUserUseCase->execute($request->validated()), 201);
    }

    public function show($id)
    {
        return response()->json($this->getUserUseCase->execute($id));
    }

    public function update(UserRequest $request, $id)
    {
        return response()->json($this->updateUserUseCase->execute($id, $request->validated()));
    }

    public function destroy($id)
    {
        return response()->json($this->deleteUserUseCase->execute($id));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return response()->json($this->loginUserUseCase->execute($credentials));
    }
}
