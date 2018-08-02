<?php

namespace Milestone\Appframe\Middleware;

use Closure;
use Milestone\Appframe\Controllers\TokenController;

class ValidateAppframeToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return (TokenController::isValid($request->headers->get('x-appframe-token'))) ? $next($request) : response('Invalid Appframe Token!',401);
    }
}
