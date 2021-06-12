<?php

namespace App\Http\Middleware;

use Closure;

class CompanyAuthenticated
{
    public function handle($request, Closure $next)
    {
        if(auth()->check() and auth()->user()->level('company'))
        {
            return $next($request);
        }
        dd($request);
        alert()->warning($request,'CompanyMiddleware')->autoclose(10000);
        return redirect()->route ('home.index');
    }
}
