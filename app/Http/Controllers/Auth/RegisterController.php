<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register', [
            'title' => __('auth.title.register')
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            flash()->error(__('auth.user_exists'));
            return redirect()->back();
        }

        $user = User::create($validated);
        $user->save();

        flash()->success(__('auth.user_registration_success'));

        return to_route('login');
    }
}
