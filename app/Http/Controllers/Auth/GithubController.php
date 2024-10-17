<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::updateOrCreate(
            [
                'email' => $githubUser->email,
            ],
            [
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'password' => bcrypt($githubUser->token),
                'remember_token' => $githubUser->token,
            ]
        );

        $user->active = true;
        $user->email_verified_at = now();
        $user->save();

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }
}
