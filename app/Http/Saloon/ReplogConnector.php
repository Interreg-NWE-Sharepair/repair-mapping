<?php

namespace App\Http\Saloon;

use Saloon\Http\Connector;

class ReplogConnector extends Connector
{

    /**
     * @inheritDoc
     */
    public function resolveBaseUrl(): string
    {
        return env('API_BASE_URL', '');
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }
}
