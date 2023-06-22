<?php

namespace App\Traits;

use App\Http\Data\DeviceType;
use App\Http\Saloon\ReplogConnector;
use App\Http\Saloon\Requests\GetDeviceTypesRequest;

trait GetsDeviceTypes
{
    public function getDeviceTypes(): array
    {
        $connector = new ReplogConnector();
        $response = $connector->sendAndRetry(new GetDeviceTypesRequest(), 3, throw: false);

        return DeviceType::collectionFromResponse($response);
    }
}
