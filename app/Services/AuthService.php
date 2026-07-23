<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException ;


class AuthService{
    public function register(array $data){
        $user = User::create(
            ['name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])]
        );
        $token = $user->createToken('todo-api-token')->plainTextToken;
        return [
            'user'=> $user,
            'token' => $token
        ];
    }
    public function login(Array $data){
        $user = User::where('email', $data['email'])->first();
        if(!$user || !Hash::check($data['password'], $user->password))
            {
                throw ValidationException::withMessages(['email' => 'email or password are incorrect.']);
            };
        $token = $user->createToken('todo-api-token')->plainTextToken;
        return ['user' =>$user,
               'token' => $token];
    }
    public function logout($user)
    {
        $user->currentAccessToken()->delete();
    }


}