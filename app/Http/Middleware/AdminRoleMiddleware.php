<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        $user = auth('moonshine')->user();

        /*
        |--------------------------------------------------------------------------
        | Belum login
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return $next($request);
        }

        /*
        |--------------------------------------------------------------------------
        | Role pelanggan tidak boleh admin panel
        |--------------------------------------------------------------------------
        */

        if (

            $user->role === 'pelanggan'

        ) {

            abort(403);
        }

        return $next($request);
    }
}
