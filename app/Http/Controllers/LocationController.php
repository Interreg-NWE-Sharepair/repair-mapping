<?php

namespace App\Http\Controllers;

use App\Http\Saloon\Requests\GetLocationStatisticsRequest;
use App\Traits\GetsLocation;
use Illuminate\View\View;

class LocationController extends Controller
{
    use GetsLocation;

    public function create_result(): View
    {
        return view('pages.location.create-result');
    }

    public function edit_result(): View
    {
        return view('pages.location.edit-result');
    }

    public function show(string $id): View
    {
        $location = $this->getLocationDetails($id);
        if (!$location){
            abort(404);
        }
        $params = ['location' => $location];

        $statsKey = 'has_statistics';
        $statsParam = [$statsKey => false];

        if($location) {
            $statisticsRequest = new GetLocationStatisticsRequest($id);
            $response = $statisticsRequest->send();

            $statsParam[$statsKey] = $response->ok();
        }

        $params = array_merge($params, $statsParam);

        return view('pages.location.show', $params);
    }
}
