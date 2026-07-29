<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $facebookUser = Socialite::driver('facebook')
            ->stateless()
            ->user();

        $user = User::updateOrCreate(
            [
                'email' => $facebookUser->getEmail(),
            ],
            [
                'name' => $facebookUser->getName(),
                'facebook_id' => $facebookUser->getId(),
                'password' => bcrypt(str()->random(32)),
            ]
        );

        Auth::login($user);

        return redirect()->route('todos.index');
    }
}