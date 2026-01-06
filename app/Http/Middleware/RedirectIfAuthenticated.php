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
            
            // AGAR so'rov user-login yoki user-register'ga bo'lsa, 
            // admin kirgan bo'lsa ham unga bu sahifalarni ko'rishga ruxsat beramiz
            if ($request->is('user-login') || $request->is('user-register')) {
                return $next($request);
            }

            // Standart holatlar
            if ($guard === 'web_user') {
                return redirect('/');
            }

            if ($guard === 'web') {
                return redirect(RouteServiceProvider::HOME);
            }
        }
    }

    return $next($request);
}
}