<?php

namespace App\Http\Saloon\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetLocationRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected string $id)
    {}

    /**
     * @inheritDoc
     */
    public function resolveEndpoint(): string
    {
        return 'locations/' . $this->id;
    }
}
