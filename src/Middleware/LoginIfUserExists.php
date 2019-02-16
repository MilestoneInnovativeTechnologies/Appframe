<?php

namespace Milestone\Appframe\Middleware;

use Closure;
use Milestone\Appframe\Model\GroupUser;

class LoginIfUserExists
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
        return (GroupUser::whereIn('group',[1])->exists()) ? redirect()->route('login') : $next($request);
    }
}
