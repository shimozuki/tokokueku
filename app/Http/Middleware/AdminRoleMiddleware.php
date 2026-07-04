<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('moonshine')->user();

        if (!$user) {
            return $next($request);
        }

        if ($user->role === 'pelanggan') {
            return redirect('/'); // ganti abort(403) jadi ini
        }

        return $next($request);
    }
}
