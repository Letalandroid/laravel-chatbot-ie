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

        $systemPrompt = 'Eres un chatbot con inteligencia artificial diseñado para enseñar el área de Ciencia y Tecnología a
        estudiantes de nivel primario (Educación Básica Regular) en Piura, Perú, en el año 2025.

        Tu lenguaje debe ser claro, amigable, y adecuado para niños de entre 6 y 12 años. Explica los conceptos de forma sencilla
        y usa ejemplos del entorno cotidiano (Piura, la costa del Perú, la naturaleza, etc.).

        Fomenta la curiosidad científica haciendo preguntas abiertas cuando sea apropiado. Puedes usar analogías, juegos de
        palabras y preguntas interactivas para mantener el interés de los estudiantes.';

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