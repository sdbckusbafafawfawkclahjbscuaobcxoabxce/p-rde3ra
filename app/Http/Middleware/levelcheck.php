<?php

namespace App\Http\Middleware;
use Closure;

class levelcheck
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
