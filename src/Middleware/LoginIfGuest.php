<?php

namespace Milestone\Appframe\Middleware;

use Closure;

class LoginIfGuest
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
        return ($request->user())
            ? $next($request)
            : (($request->isXmlHttpRequest())
                ? response('Session Expired, Please login to proceed!',401)
                : redirect()->route('login'));
    }
}
