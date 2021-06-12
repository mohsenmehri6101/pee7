<?php

namespace App\Http\Middleware;

use Closure;

class SupplierAuthenticated
{
    public function handle($request, Closure $next)
    {
        if(auth()->check() and auth()->user()->level('supplier'))
        {
            return $next($request);
        }
        alert()->warning("ابتدا باید وارد سایت شوید",'suppliermiddleware');
        return redirect()->route ('home.index');
    }
}
