<?php

namespace App\Services\Auth;

use Illuminate\Http\Client\Response as HttpClientResponse;
use Illuminate\Support\Facades\Http;

class TokenValidatorService
{
    public function validateToken(string $token): HttpClientResponse
    {
        $url = config('services.authentication_service.url');

        return Http::withHeaders($this->headers($token))->get($url);
    }

    private function headers(string $token): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $token,
        ];
    }
}
