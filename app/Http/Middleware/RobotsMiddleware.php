<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\RobotsMiddleware\RobotsMiddleware as VendorRobotsMiddleware;

class RobotsMiddleware extends VendorRobotsMiddleware
{
    /**
     * @param Request $request
     * @return string|bool
     */
    protected function shouldIndex(Request $request): bool|string
    {
        return $request->segment(1) !== 'admin';
    }
}
