<?php

namespace Milestone\Appframe\Middleware;

use Closure;
use Milestone\Appframe\User;

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
        return (User::all()->isEmpty()) ? $next($request) : redirect()->route('login');
    }
}
