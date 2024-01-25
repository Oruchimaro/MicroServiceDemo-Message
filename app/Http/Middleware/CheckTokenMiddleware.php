<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // check the token from request against auth service
        // if no token fail
        // if token invalid fail
        // if token expired fail
        // else continue

        return $next($request);
    }
}
