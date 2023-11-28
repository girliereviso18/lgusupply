<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user() && Auth::user()->role == 1) {
                    // Admin user
                    return redirect('/admin');
                } elseif (Auth::user() && Auth::user()->role == 2) {
                    // Regular user
                    return redirect('/employee');
                } else {
                    // No role found, handle accordingly
                    return redirect()->to('login')
                        ->withErrors(trans('auth.failed'));
                }
            }
        }

        return $next($request);
    }
}
