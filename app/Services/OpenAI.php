<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAI
{
    private $client;

    public function __construct($api_key)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $api_key,
            ],
        ]);
    }

    public function gpt3($model, $prompt, $n, $max_tokens, $stop)
    {
        $response = $this->client->post('completions', [
            'json' => [
                'model' => $model,
                'prompt' => $prompt,
                'n' => $n,
                'max_tokens' => $max_tokens,
                'stop' => $stop,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['choices'];
    }
}
