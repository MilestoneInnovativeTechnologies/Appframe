<?php

namespace Milestone\Appframe\Middleware;

use Closure;
use Milestone\Appframe\Resolve\Resolve;

class ResolveAction
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
        $AvailableActions = $request->session()->get('actions');
        $RequestedAction = $request->get('action');
        if(array_key_exists($RequestedAction,$AvailableActions)) Resolve::Resolve($AvailableActions[$RequestedAction]);
        else return response('Not Acceptable',406);
        return $next($request);
    }
}
