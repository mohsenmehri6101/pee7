<?php

namespace App\Http\Middleware;

use Closure;

class PersonAuthenticated
{
    public function handle($request, Closure $next)
    {
        if(auth()->check() and auth()->user()->level('person'))
        {
            return $next($request);
        }
        alert()->warning("ابتدا باید وارد سایت شوید",'personmiddleware');
        return redirect()->route ('home.index');
    }
}
