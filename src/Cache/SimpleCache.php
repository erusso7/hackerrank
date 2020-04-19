<?php declare(strict_types = 1);

namespace App\Cache;

/**
 * We could use the PSR-6 interfaces to implement
 * different cache services. But as this is not
 * a production-ready library, only the methods
 * 'get' & 'put' will be implemented.
 */
interface SimpleCache
{
    public function put($key, $value, ?int $microTtu = null): void;

    public function get($key);
}