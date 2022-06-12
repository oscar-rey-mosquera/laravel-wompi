<?php

namespace LaravelWompi\Http\Middleware;

use Closure;
use Bancolombia\Wompi;

class CheckWompiWebHookMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->isMethod('post') || !Wompi::check_webhook($request->all())) {

            return false;
        }

        return $next($request);
    }
}
