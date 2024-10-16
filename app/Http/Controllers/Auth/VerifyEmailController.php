<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function verify()
    {
        return view('auth.verify', [
            'title' => __('auth.title.verify')
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            flash()->error(__('auth.user_not_found'));
            return back();
        }

        // Send verification email
        return redirect()->route('login');
    }
}
