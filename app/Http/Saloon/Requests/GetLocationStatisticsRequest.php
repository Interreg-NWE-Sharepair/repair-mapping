<?php

namespace App\Http\Saloon\Requests;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;

class GetLocationStatisticsRequest extends SoloRequest
{
    protected Method $method = Method::GET;

    public function __construct(protected string $location_id) {}

    /**
     * @inheritDoc
     */
    public function resolveEndpoint(): string
    {
        return env('STATISTICS_API_BASE_URL', 'https://repairconnects.org/api/repair/statistics');
    }

    protected function defaultQuery(): array
    {
        return [
            'lang' => LaravelLocalization::getCurrentLocale(),
            'location' => $this->location_id,
            'view' => 3
        ];
    }
}
