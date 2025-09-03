<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRequest;
use App\Http\Service\ChatService;

class ChatController extends Controller
{
    public function __construct(private ChatService $chatService) {}

    public function response(ChatRequest $request) {
        return $this->chatService->getResponse($request['content']);
    }

}
