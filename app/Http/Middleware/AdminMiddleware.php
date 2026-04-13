<?php

namespace App\Http\Middleware;
use Auth;
use App\User;
use Closure;

class AdminMiddleware
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
        if (!Auth::check() || !Auth::user()->hasRole('Admin')) {
            abort(403, 'Access denied. Admin privileges required.');
        }
        return $next($request);
    }
}
