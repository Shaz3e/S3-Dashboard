<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shaz3e\EmailTemplates\Services\EmailService;
use Illuminate\Support\Str;

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

        // Create token to verify email
        $token = Str::random(65);
        $user->verification_token = $token;
        $user->save();

        $verification_link = route('verify.account', [
            'email' => $user->email,
            'token' => $token
        ]);

        // Create instance of EmailService
        $emailService = new EmailService();

        // Send Email
        $emailService->sendEmailByKey('verify_account', $user->email, [
            'app_name' => config('app.name'),
            'name' => $user->name,
            'verification_link' => $verification_link,
        ]);

        flash()->success(__('auth.verification_email_sent'));

        // Send verification email
        return redirect()->route('login');
    }

    public function verified($email, $token)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            flash()->error(__('auth.user_not_found'));
        } elseif ($user->email_verified_at) {
            flash()->info(__('auth.email_already_verified'));
            return redirect()->route('login');
        } elseif ($user->verification_token != $token) {
            flash()->error(__('auth.user_verification_token_not_match'));
        } else {
            $user->verification_token = null;
            $user->email_verified_at = now();
            $user->save();

            flash()->success(__('auth.email_verified'));
        }
        return redirect()->route('login');
    }
}
