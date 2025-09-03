<?php

namespace App\Http\Service;

use Gemini\Data\Content;
use Gemini\Enums\ModelVariation;
use Gemini\Enums\Role;
use Gemini\GeminiHelper;
use Gemini;
use Stringable;
use function App\Utilities\readText;

class ChatService
{

    private $result;

    private $yourApiKey;
    private $client;

    public function getResponse(string $content): string
    {

        $systemPrompt = 'Speak Spanish';

        try {
            $systemPrompt = readText();
        } catch (\Throwable $e) {
            \Log::warning('Failed to read system prompt from file: ' . $e->getMessage());
        }

        $yourApiKey = getenv('GOOGLE_API_KEY');
        $client = Gemini::client($yourApiKey);
        $result = $client->generativeModel(model: 'gemini-2.0-flash')
            ->startChat(history: [
                Content::parse(
                    part: $systemPrompt,
                    role: Role::MODEL
                )
            ]);

        $chat = $result->sendMessage($content);

        return $chat->text();
        ;
    }

}