<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Shaz3e\EmailTemplates\Services\EmailService;

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

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $validated['email'],
            'token' => $token,
            'created_at' => now(),
        ]);

        $reset_password_link = route('reset', [
            'email' => $validated['email'],
            'token' => $token
        ]);
        // Create instance of EmailService
        $emailService = new EmailService();

        $emailService->sendEmailByKey('reset_password', $user->email, [
            'name' => $user->name,
            'reset_password_link' => $reset_password_link,
            'app_name' => config('app.name'),
        ]);

        flash()->success(__('auth.forgot_password'));

        return to_route('login');
    }
}
