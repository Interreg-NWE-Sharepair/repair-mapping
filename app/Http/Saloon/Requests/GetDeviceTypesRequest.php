<?php

namespace App\Http\Saloon\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDeviceTypesRequest extends AbstractCachedGetRequest
{
    /**
     * @inheritDoc
     */
    public function resolveEndpoint(): string
    {
        return 'device_types';
    }
}
