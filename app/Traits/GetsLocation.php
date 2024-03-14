<?php

namespace App\Traits;

use App\Http\Data\Location;
use App\Http\Saloon\ReplogConnector;
use App\Http\Saloon\Requests\GetLocationRequest;
use Saloon\Http\Response;

trait GetsLocation
{
    private function sendRequest(string $id): Response
    {
        $connector = new ReplogConnector();
        return $connector->sendAndRetry(new GetLocationRequest($id), 3, throw: false);
    }

    public function getLocationForForm(string $id): array
    {
        $response = $this->sendRequest($id);

        if(!$response->ok()) return [];

        $data = $response->json('data', default: []);

        if(!empty($data)) {
            $types = [];
            foreach ($data['device_types'] as $entry) {
                $types[] = $entry['id'];
            }

            $images = [];
            foreach($data['images'] as $image) {
                $images[] = $image['url'];
            }

            return [
                'name' => $data['name'],
                'description' => $data['description'],
                'address' => $data['address'],
                'has_warranty' => $data['has_warranty'],
                'warranty_description' => $data['has_warranty'] ?? [],
                'organisation_type' => $data['organisation_type']['id'] ?? null,
                'device_types' => $types,
                'contacts' => $data['contacts'],
                'locales' => $data['locales'],
                'logo' => $data['logo'] ? $data['logo']['url'] : null,
                'images' => $images,
                'ecocheques' => $data['ecocheques'],
                'vat_number' => $data['vat_number'],
                'accepted_general_terms' => true
            ];
        }

        return $data;
    }

    public function getLocationDetails(string $id): ?Location
    {
        $response = $this->sendRequest($id);

        if ($response->serverError()){
            $response->throw();
        }

        if ($response->clientError()){
            return null;
        }

        return Location::createFromResponse($response);
    }
}
