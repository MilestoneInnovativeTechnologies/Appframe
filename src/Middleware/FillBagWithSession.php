<?php

namespace Milestone\Appframe\Middleware;

use Closure;
use Milestone\Appframe\Bag;

class FillBagWithSession
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
        $bag = resolve(Bag::class);
        $bag->setSessions();
        return $next($request);
    }
}
