<?php

namespace App\Core\Middleware;

use App\Core\Middleware\Auth;
use App\Core\Middleware\Guest;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    /**
     * Runs middleware for the given key : auth or guest
     *
     * @param string $key 'auth' or 'guest'
     *
     * @return void
     * 
     * @throws \Exception No middleware for given key
     */
    public static function resolve($key)
    {

        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching middleware for {$key}");
        }

        (new $middleware)->handle();
    }
}
