<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}
