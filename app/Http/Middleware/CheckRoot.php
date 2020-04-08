<?php

namespace App\Http\Middleware;

use Closure;
use MercurySeries\Flashy\Flashy;

class CheckRoot
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

        if(auth()->user()->role != 'root'){
            return redirect()->back()->with('error','Accès refusé!');
        }
        return $next($request);
    }
}
