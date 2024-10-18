<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LockedController extends Controller
{
    public function view()
    {
        $admin = request()->user();
        $admin->locked = true;
        $admin->save();

        return view('auth.locked', [
            'title' => __('auth.title.locked')
        ]);
    }

    public function post(Request $request)
    {
        $user = request()->user();

        // Validate request
        $validated = $request->validate([
            'password' => 'required|string',
        ]);

        // If user not found or password is incorrect
        if (!$user || !password_verify($validated['password'], $user->password)) {
            flash()->error(__('auth.failed'));
            return back();
        }

        // if user is not active
        if (!$user->active) {
            flash()->error(__('auth.active'));
            return back();
        }

        // if user locked = true change to false
        $user->locked = false;
        $user->save();

        // Session regenrate
        session()->regenerate();

        // Authenticate and Login
        Auth::login($user);
        flash()->success(__('app.welcome_back_user', ['name' => $user->name]));
        return redirect()->route('admin.dashboard');
    }
}
