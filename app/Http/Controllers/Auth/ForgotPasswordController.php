<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function forgot()
    {
        return view('auth.forgot', [
            'title' => __('auth.title.forgot_password')
        ]);
    }

    public function store(ForgotPasswordRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            flash()->error(__('auth.user_not_found'));
            return back();
        }

        $tokenExists = DB::table('password_reset_tokens')->where('email', $validated['email'])->first();

        if ($tokenExists) {
            // Delete token
            DB::table('password_reset_tokens')->where('email', $validated['email'])->delete();
        }

        $token = DB::table('password_reset_tokens')->insert([
            'email' => $validated['email'],
            'token' => Str::random(64),
            'created_at' => now(),
        ]);

        flash()->success(__('auth.forgot_password'));

        return to_route('login');
    }
}
