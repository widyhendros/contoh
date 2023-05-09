<?php

namespace App\Http\Middleware;
use Session;
use Closure;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate 
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
        if(Session::has('id')){
            return $next($request);
            
        }
        else{
            return redirect('/login');
            // return redirect()->guest('');
        }

    }
}
