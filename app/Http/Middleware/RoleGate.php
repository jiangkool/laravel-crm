<?php

namespace App\Http\Middleware;

use Closure;

class RoleGate
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
         if ($request->user() && $request->user()->role && $request->user()->role->slug === $role) {
                return $next($request);
         }
        return redirect('/login');
    }
}
