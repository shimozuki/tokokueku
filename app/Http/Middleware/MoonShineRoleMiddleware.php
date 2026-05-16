<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MoonShineRoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->role === 'pelanggan') {

            return redirect('/');
        }

        return $next($request);
    }
}
