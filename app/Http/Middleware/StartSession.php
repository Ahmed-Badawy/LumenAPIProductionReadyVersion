<?php

namespace App\Http\Middleware;

use Closure;

class StartSession
{
    public function handle($request, Closure $next)
    {
        // return "StartSession Handling Logic \r\n";
        return $next($request);
    }

    public function terminate($request, $response)
    {
        // die($response);
    }
}
