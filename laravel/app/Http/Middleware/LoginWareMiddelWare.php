<?php

namespace App\Http\Middleware;

use Closure;

class LoginWareMiddelWare
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
        if($request->age<18){
            return back();
        }
        return $next($request);
    }
}
