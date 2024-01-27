<?php

namespace App\Services\Message;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MessageService
{
    public function save(User $user, string $title, string $body): array|Message
    {
        return DB::transaction(function () use ($user, $title, $body) {

            $message = Message::create([
                'title' => $title,
                'body' => $body,
                'user_id' => $user->id,
            ]);

            return $message;
        });
    }
}
