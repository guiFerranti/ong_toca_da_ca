<?php

namespace App\Services;

use App\Models\ImgurToken;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ImgurService
{
    protected Client $client;
    protected string $clientId;
    protected string $clientSecret;
    protected string $baseUrl = 'https://api.imgur.com/3/';

    public function __construct()
    {
        $this->client = new Client();
        $this->clientId = config('services.imgur.client_id');
        $this->clientSecret = config('services.imgur.client_secret');
    }

    public function uploadImage(string $imagePath): array
    {
        $token = $this->getValidToken();

        try {
            $response = $this->client->post($this->baseUrl . 'image', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token->access_token,
                ],
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => fopen($imagePath, 'r'),
                    ]
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error('Imgur upload error: ' . $e->getMessage());
            throw $e;
        }
    }

    protected function getValidToken(): ImgurToken
    {
        $token = ImgurToken::latest()->first();

        if (!$token || $token->isExpired()) {
            return $this->refreshToken($token?->refresh_token);
        }

        return $token;
    }

    protected function refreshToken(string $refreshToken): ImgurToken
    {
        try {
            $response = $this->client->post('https://api.imgur.com/oauth2/token', [
                'form_params' => [
                    'refresh_token' => $refreshToken,
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'grant_type' => 'refresh_token',
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            return ImgurToken::create([
                'access_token' => $data['access_token'],
                'refresh_token' => $data['refresh_token'],
                'expires_at' => now()->addSeconds($data['expires_in']),
                // 'user_id' => auth()->id() // Se estiver usando autenticação
            ]);
        } catch (\Exception $e) {
            Log::error('Imgur token refresh failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
