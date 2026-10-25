<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class GeminiBlogWriter
{
    public function write(string $idea, ?string $notes, string $apiKey): array
    {
        $model = config('liba.gemini_model', 'gemini-2.5-flash');
        $prompt = $this->prompt($idea, $notes);

        $response = Http::timeout(90)
            ->withHeaders(['x-goog-api-key' => $apiKey])
            ->acceptJson()
            ->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent", [
                'contents' => [
                    ['role' => 'user', 'parts' => [['text' => $prompt]]],
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'responseMimeType' => 'application/json',
                    'responseSchema' => [
                        'type' => 'OBJECT',
                        'properties' => [
                            'title' => ['type' => 'STRING'],
                            'excerpt' => ['type' => 'STRING'],
                            'body' => ['type' => 'STRING'],
                        ],
                        'required' => ['title', 'excerpt', 'body'],
                    ],
                ],
            ]);

        if (! $response->successful()) {
            $message = $response->json('error.message') ?: 'Google could not write this post.';
            throw new RuntimeException($this->short($message));
        }

        $text = $response->json('candidates.0.content.parts.0.text');
        $data = is_string($text) ? json_decode($text, true) : null;

        if (! is_array($data) || trim((string) ($data['title'] ?? '')) === '' || trim((string) ($data['body'] ?? '')) === '') {
            throw new RuntimeException('Google returned a post that could not be saved. Try the idea again.');
        }

        return [
            'title' => mb_substr(trim($data['title']), 0, 200),
            'excerpt' => mb_substr(trim((string) ($data['excerpt'] ?? '')), 0, 500),
            'body' => mb_substr(trim($data['body']), 0, 50000),
        ];
    }

    private function prompt(string $idea, ?string $notes): string
    {
        $notes = trim((string) $notes);

        return <<<TEXT
Write one blog post for Liba Digitals, a digital agency in Addis Ababa, Ethiopia. The company builds custom software, healthcare systems, and digital marketing work.

Idea: {$idea}
Extra direction: {$notes}

Rules:
- Use the idea as the subject. Do not invent client names, prices, or statistics.
- Write in clear, specific English. No slogans and no calls to buy.
- Title under 90 characters.
- Excerpt under 180 characters.
- Body is 4 to 6 paragraphs of plain text, separated by a blank line. No markdown, no HTML, and no title repeated in the body.
TEXT;
    }

    private function short(string $message): string
    {
        $message = trim(preg_replace('/\s+/', ' ', $message) ?? '');

        return mb_substr($message !== '' ? $message : 'Google could not write this post.', 0, 300);
    }
}
