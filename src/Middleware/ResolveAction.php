<?php

namespace Milestone\Appframe\Middleware;

use Closure;
use Milestone\Appframe\Resolve\Resolver;
use Milestone\Appframe\Actions\Universal;

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
        if(array_key_exists($RequestedAction,$AvailableActions)) Resolver::Resolve($AvailableActions[$RequestedAction]);
        elseif(in_array($RequestedAction,Universal::Actions())) Resolver::Resolve([ 'type' => ucfirst($RequestedAction) ]);
        else return response('Not Acceptable',406);
        return $next($request);
    }
}
