<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
   protected function redirectTo(Request $request): ?string
{
    if (! $request->expectsJson()) {
        // Agar so'rov admin yo'nalishiga bo'lsa - Admin loginiga
        if ($request->is('admin/*') || $request->is('dashboard*')) {
            return route('login'); 
        }

        // Qolgan holatlarda (oddiy foydalanuvchilar) - User loginiga
        return route('user.login');
    }
    
    return null;
}
}
