<?php

namespace App\Traits;

use App\Http\Data\TranslatableType;
use App\Http\Saloon\ReplogConnector;
use App\Http\Saloon\Requests\GetOrganisationTypesRequest;

trait GetsOrganisationTypes {

    public function getOrganisationTypes(): array
    {
        $connector = new ReplogConnector();
        $response = $connector->sendAndRetry(new GetOrganisationTypesRequest(), 3, throw: false);

        return TranslatableType::collectionFromResponse($response);
    }

}
