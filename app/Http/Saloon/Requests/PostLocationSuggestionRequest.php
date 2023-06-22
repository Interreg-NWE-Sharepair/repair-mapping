<?php

namespace App\Http\Saloon\Requests;

class PostLocationSuggestionRequest extends JsonPostRequest
{
    /**
     * @inheritDoc
     */
    public function resolveEndpoint(): string
    {
        return 'locations/suggestions';
    }
}
