<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\Api\MessageStoreRequest;
use App\Http\Resources\Api\MessageResource;
use App\Services\Message\MessageService;
use Illuminate\Http\JsonResponse;

class MessageController extends ApiBaseController
{
    public function __construct(private MessageService $messageService)
    {

    }

    public function store(MessageStoreRequest $request): JsonResponse
    {
        return $this->response(
            MessageResource::make(
                $this->messageService->save(
                    $request->user,
                    $request->validated('title'),
                    $request->validated('body')
                )
            ),
            JsonResponse::HTTP_CREATED
        );
    }
}
