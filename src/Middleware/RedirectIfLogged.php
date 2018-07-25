<?php

namespace Milestone\Appframe\Middleware;

use Closure;

class RedirectIfLogged
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
        return ($request->user()) ? redirect()->route('root') : $next($request);
    }
}
