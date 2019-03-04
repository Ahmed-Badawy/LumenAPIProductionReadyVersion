<?php

namespace App\Http\Middleware;

use Closure;

class AgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param1="testrole")
    {
        if ($request->input('age') <= 200) {
            return "hello from age";
            // return redirect('profile'); //this is how to redirect to another route
        }
        if ($param1!="testrole") {
            return "died at middleware test role".$param1;
        }

        return $next($request);
    }
}
