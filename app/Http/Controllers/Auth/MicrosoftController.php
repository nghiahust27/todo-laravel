<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class MicrosoftController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('microsoft')->redirect();
    }

    public function callback()
    {
        $microsoftUser = Socialite::driver('microsoft')
            ->stateless()
            ->user();

        $user = User::updateOrCreate(
            [
                'email' => $microsoftUser->getEmail(),
            ],
            [
                'name' => $microsoftUser->getName(),
                'microsoft_id' => $microsoftUser->getId(),
                'password' => bcrypt(str()->random(32)),
            ]
        );

        Auth::login($user);

        return redirect()->route('todos.index');
    }
}