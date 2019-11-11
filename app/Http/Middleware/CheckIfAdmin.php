<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (isset(Auth::user()->rank)) {
            if (Auth::user()->rank != "3") {
                return redirect('/');
            }
            return $next($request);
        } else {
            return redirect('/');
        }


    }
}
