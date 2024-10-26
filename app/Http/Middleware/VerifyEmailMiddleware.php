<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyEmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is authenticated and email is not verified
        if (Auth::check()) {
            if (Auth::user()->email_verified_at == null && !$request->is('verify')) {
                Auth::logout();
                return redirect()->route('verify');
            }
        }
        return $next($request);
    }
}
