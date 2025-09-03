<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Log;

function readText(): string
{
    $filename = base_path('chat_config.txt'); // ✅ Safer and cleaner

    if (!file_exists($filename)) {
        Log::info("File not found. Looking in: " . $filename);
        throw new \RuntimeException("File not found: $filename");
    }

    $content = file_get_contents($filename);

    if ($content === false) {
        throw new \RuntimeException("Unable to read file: $filename");
    }

    return $content;
}
