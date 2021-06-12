<?php

namespace App\Http\Middleware;

use Closure;

class ActiveUser
{
    public function handle($request, Closure $next)
    {
        if(auth()->check())
        {
            if(!auth()->user()->isActive())
            {
                auth()->logout();
                //show message
                alert()->warning("اکانت شما هنوز فعال نشده است.ایمیل/پیامک خود را چک کنید",'اخطار')->persistent('فهمیدم');
                //show message
                return redirect()->route ('home.index');
            }
        }
        return $next($request);
    }
}