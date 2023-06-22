<?php

namespace App\Http\Saloon\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetOrganisationTypesRequest extends AbstractCachedGetRequest
{
    /**
     * @inheritDoc
     */
    public function resolveEndpoint(): string
    {
        return 'organisation_types';
    }
}
