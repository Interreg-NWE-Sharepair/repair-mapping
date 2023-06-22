<?php

namespace App\Http\Saloon\Requests;

use Illuminate\Support\Facades\Cache;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class AbstractCachedGetRequest extends Request implements Cacheable
{
    use HasCaching;

    protected Method $method = Method::GET;

    /**
     * @inheritDoc
     */
    public function resolveCacheDriver(): LaravelCacheDriver
    {
        return new LaravelCacheDriver(Cache::store(env('CACHE_DRIVER', 'file')));
    }

    /**
     * @inheritDoc
     */
    public function cacheExpiryInSeconds(): int
    {
        return 3600;
    }

    protected function getCacheableMethods(): array
    {
        return [Method::GET];
    }
}
