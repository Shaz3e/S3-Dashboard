<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfUserIsActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user's 'active' column is false or '0'
            if ($user->active == false) {
                // Logout the User
                Auth::logout();

                flash()->error(__('auth.active'));

                // Redirect back to the login page with an error message
                return redirect()->route('login');
            }
        }
        return $next($request);
    }
}
