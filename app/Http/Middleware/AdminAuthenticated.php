<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthenticated
{
    public function handle($request, Closure $next)
    {
        if(auth()->check() and auth()->user()->level('admin'))
        {
            return $next($request);
            //alert()->warning("شما حق دسترسی به این آدرس را ندارید",'خطای دسترسی');
            return redirect()->route('home.index');
        }
        alert()->warning("مشکل اهزار هویت",'خطا');
        return redirect()->route('home.index');
    }
}
