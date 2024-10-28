<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Shaz3e\EmailTemplates\Services\EmailService;

class PasswordResetController extends Controller
{
    public function reset()
    {
        return view('auth.reset', [
            'title' => __('auth.title.reset')
        ]);
    }

    public function store(ResetPasswordRequest $request)
    {
        $validated = $request->validated();

        // Check token
        $token = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->exists();

        if (!$token) {
            flash()->error(__('passwords.token'));
            return redirect()->route('login');
        }

        // Check email
        $email = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->exists();

        if (!$email) {
            flash()->error(__('passwords.user'));
            return redirect()->route('login');
        }

        $user = User::where('email', $request->email)->first();

        $user->password = bcrypt($validated['password']);
        $user->save();

        // Delete token
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        // Create instance of EmailService
        $emailService = new EmailService();

        $reset_password_link =  route('forgot');

        $emailService->sendEmailByKey('reset_password_success', $user->email, [
            'name' => $user->name,
            'app_name' => config('app.name'),
            'reset_password_link' => $reset_password_link,
        ]);

        flash()->success(__('passwords.reset'));
        return to_route('login');
    }
}
