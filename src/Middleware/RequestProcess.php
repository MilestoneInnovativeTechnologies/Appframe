<?php

namespace Milestone\Appframe\Middleware;

use Closure;
use Milestone\Appframe\Register\Frame;

class RequestProcess
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
        foreach (Frame::Engines() as $Engine)
            app($Engine)->boot();
        return $next($request);
    }

}
