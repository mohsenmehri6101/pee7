<?php

namespace App\Http\Middleware;

use Closure;

class ClerkAuthenticated
{
    public function handle($request, Closure $next)
    {
        if(auth()->check() and auth()->user()->level('clerk'))
        {
            return $next($request);
        }
        alert()->warning("ابتدا باید وارد سایت شوید",'clerkmiddleware');
        return redirect()->route ('home.index');
    }
}