<?php

namespace App\Http\Middleware;

use Closure;

class ConfirmAuthenticated
{
    public function handle($request, Closure $next)
    {
        if(session('confirmUser'))
        {
            session()->reflash();
            return $next($request);
        }
        return redirect()->route('home.index');
    }
}
