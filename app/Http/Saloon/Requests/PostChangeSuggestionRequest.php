<?php

namespace App\Http\Saloon\Requests;

class PostChangeSuggestionRequest extends JsonPostRequest
{
    public function __construct(protected string $location_id) {}

    /**
     * @inheritDoc
     */
    public function resolveEndpoint(): string
    {
        return 'locations/' . $this->location_id . '/suggestions';
    }
}
