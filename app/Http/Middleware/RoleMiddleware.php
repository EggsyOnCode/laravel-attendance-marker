<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (!auth()->check() || auth()->user()->role !== $role) {
            // Redirect if the user is not authenticated or doesn't have the correct role
            return redirect()->route('login');
        }

        return $next($request);
    }

}
