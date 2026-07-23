<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Todo;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Services\TodoService;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {}

    public function register(RegisterRequest $request){
        $result = $this->authService->register($request->validated());

        return response()->json([
            'success'=> true,
            'message' => 'Register successfully',
            'data' => $result,
            ],201);
    }
    public function login(LoginRequest $request){
        $result = $this->authService->login($request->validated());

        return response()->json([
            'success'=> true,
            'message' => 'Login successfully',
            'data' => $result,
            ]);
    }
    public function logout(Request $request){
        $this->authService->logout($request->user());

        return response()->json([
            'success'=> true,
            'message' => 'Logout successfully',
  
            ]);
    }
    public function me(Request $request)
    {
        return response() ->json([
            'success'=>true,
            'data' => $request->user(),
        ]);
    }
    // public function me(Todo $todo)
    // {
    //     return response() ->json([
    //         'success'=>true,
    //         'data' => $request->user(),
    //     ]);
    // }
}
