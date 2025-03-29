<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Change this line to redirect to 'admin/dashboard'
                return redirect()->route('admin.dashboard'); 
            }
        }   
        return $next($request);
    }
}
