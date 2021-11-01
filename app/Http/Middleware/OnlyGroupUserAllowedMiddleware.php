<?php

namespace App\Http\Middleware;

use Closure;

class OnlyGroupUserAllowedMiddleware
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

        if($request->role_id != 2 || !$request->has('role_id')) {
            dd("you are not allowed to access this page.");
            //return redirect('/');
        }

        return $next($request);
    }
}
