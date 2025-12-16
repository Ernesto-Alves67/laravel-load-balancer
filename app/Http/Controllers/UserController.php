<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->getAllUsers();
    }

    public function show($id)
    {
        return $this->userService->getUserById($id);
    }


    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        $user = $this->userService->createUser($data);
        return response()->json($user, 201);
    }


    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email', 'password']);
        $user = $this->userService->updateUser($id, $data);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return response()->json(null, 204);
    }
}
