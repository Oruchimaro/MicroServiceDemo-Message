<?php

namespace App\Services\Auth;

use App\Models\User;

class UserService
{
    public function handleUser(array $userData, string $uuid, string $token): User
    {
        $user = User::whereAuthId($uuid)->first();

        if (! $user) {
            $user = User::create([
                'auth_id' => $uuid,
                'name' => $userData['name'],
            ]);

        }

        return $user;
    }
}
