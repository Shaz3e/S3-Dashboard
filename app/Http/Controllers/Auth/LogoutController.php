<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $user->locked = false;
        $user->save();

        // Logout User
        Auth::logout($user);

        flash()->success(__('auth.logout'));

        return to_route('login');
    }
}
