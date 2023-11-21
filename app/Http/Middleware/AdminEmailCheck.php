<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminEmailCheck
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && strpos($user->email, '@admin') !== false) {
            return $next($request);
        }

        return redirect('/home'); // O a la página que prefieras
    }
}
