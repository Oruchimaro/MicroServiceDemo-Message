<?php

namespace App\Http\Middleware;

use App\Services\Auth\TokenValidatorService;
use App\Services\Auth\UserService;
use App\Traits\RespondApi;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenMiddleware
{
    use RespondApi;

    public function __construct(
        private TokenValidatorService $tokenValidatorService,
        private UserService $userService
    ) {
    }

    public function handle(Request $request, Closure $next): Response
    {
        $response = $this->tokenValidatorService->validateToken($request->headers->get('Authorization'));

        if (! $response->ok()) {
            return $this->response('unauth', 403);

        }

        $user = $this->userService->handleUser(
            $response->json()['data'],
            $response->json()['data']['uuid'],
            $request->headers->get('Authorization')
        );

        $request->merge(['user' => $user]);

        return $next($request);
    }
}
