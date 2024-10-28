<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Shaz3e\EmailTemplates\Services\EmailService;
use Illuminate\Support\Str;

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

        // Create instance of EmailService
        $emailService = new EmailService();

        if (DiligentCreators('active') == 0) {
            // Activate and Verify Email
            $user->active = true;
            $user->email_verified_at = now();
            $user->save();

            // Send Email
            $emailService->sendEmailByKey('register', $user->email, [
                'app_name' => config('app.name'),
                'name' => $user->name,
                'email' => $user->email,
                'password' => $validated['password'],
                'login_url' => $user->login_url,
            ]);
            flash()->success(__('auth.user_registration_success'));
        }
        if (DiligentCreators('active') == 1) {
            // Create token to verify email
            $token = Str::random(65);
            $user->activation_token = $token;
            $user->save();

            $activation_link = route('activate', [
                'email' => $user->email,
                'token' => $token
            ]);

            $emailService->sendEmailByKey('regiser_activate', $user->email, [
                'app_name' => config('app.name'),
                'activation_link' => $activation_link,
                'name' => $user->name,
            ]);
            flash()->success(__('auth.user_registration_success_activate'));
        }

        return to_route('login');
    }

    public function activateAccount($email, $token)
    {
        // Check if email exists
        $user = User::where('email', $email)->first();

        if (!$user) {
            flash()->error(__('auth.user_not_found'));
            return redirect()->back();
        }

        if ($user->activation_token != $token) {
            flash()->error(__('auth.user_activation_token_not_match'));
            return redirect()->back();
        }

        $user->active = true;
        $user->email_verified_at = now();
        $user->activation_token = null;
        $user->save();

        flash()->success(__('auth.user_registration_success_after_activate'));
        return to_route('login');
    }
}
