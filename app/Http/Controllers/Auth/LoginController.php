<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => __('auth.title.login')
        ]);
    }

    public function store(LoginRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        // User not found
        if (!$user) {
            flash()->error(__('auth.failed'));
            return back();
        }

        // Password is incorrect
        if (!password_verify($validated['password'], $user->password)) {
            flash()->error(__('auth.failed'));
            return back();
        }

        // User Active false
        if (!$user->active) {
            flash()->error(__('auth.active'));
            return back();
        }

        // Check if user verified their email
        if (is_null($user->email_verified_at)) {
            return redirect()->route('verify');  // Redirect to the verification page
        }

        // Unlock user accunt
        $user->locked = false;
        $user->save();

        // Check if the "Remember Me" checkbox is checked
        $remember = $request->has('remember');

        // Login with the remember token
        Auth::login($user, $remember);

        // If the login is successful, redirect to the dashboard
        $request->session()->regenerate();

        flash()->success(__('app.welcome_back_user', ['name' => $user->name]));
        return redirect()->route('admin.dashboard');
    }
}
