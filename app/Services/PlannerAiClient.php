<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PlannerAiClient {
    private string $base;
    private string $token;
    public function __construct() {
        $this->base = config('services.ai.base', env('AI_BASE_URL','http://127.0.0.1:8001'));
        $this->token = config('services.ai.token', env('AI_TOKEN',''));
    }
    private function client() {
        $headers = ['Accept'=>'application/json'];
        if ($this->token) $headers['X-AI-TOKEN'] = $this->token;
        return Http::withHeaders($headers)->timeout(30);
    }
    public function score(array $payload) {
        try {
            $response = $this->client()->post($this->base.'/plan/score', $payload);
            if ($response->ok()) {
                return $response->json();
            } else {
                throw new \Exception('AI service returned error: ' . $response->status());
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('AI score request failed', [
                'error' => $e->getMessage(),
                'payload' => $payload
            ]);
            throw $e;
        }
    }

    public function schedule(array $payload) {
        try {
            $response = $this->client()->post($this->base.'/plan/schedule', $payload);
            if ($response->ok()) {
                return $response->json();
            } else {
                throw new \Exception('AI service returned error: ' . $response->status());
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('AI schedule request failed', [
                'error' => $e->getMessage(),
                'payload' => $payload
            ]);
            throw $e;
        }
    }

    public function health() {
        try {
            $response = $this->client()->get($this->base.'/health');
            return $response->ok();
        } catch (\Exception $e) {
            return false;
        }
    }
}
