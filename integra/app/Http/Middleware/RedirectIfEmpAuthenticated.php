<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class RedirectIfEmpAuthenticated
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
        //If request comes from logged in user, he will
        //be redirect to home page.
        if (Auth::guard()->check()) {
            return redirect('/emp/home');
        }

        //If request comes from logged in emp, he will
        //be redirected to Emp's home page.
        if (Auth::guard('web_emp')->check()) {

            return redirect('/emp/home');
        }

        return $next($request);
    }
}
