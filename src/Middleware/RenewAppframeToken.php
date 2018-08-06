<?php

namespace Milestone\Appframe\Middleware;

use Closure;
use Milestone\Appframe\Controllers\TokenController;

class RenewAppframeToken
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
        $token = TokenController::next();
        $response = $next($request);
        $response->headers->set('X-Appframe-Token',$token);
        return $response;
    }
}
