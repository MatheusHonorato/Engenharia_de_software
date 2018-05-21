<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class AuthenticateEmp
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
        //If request does not comes from logged in emp
        //then he shall be redirected to Emp Login page
        if (! Auth::guard('web_emp')->check()) {

           return redirect('/emp/login');
        }

        $var = Auth::guard('web_emp')->user()->makeVisible('attribute')->toArray();
        if($var['status'] == '0'){
            Auth::guard('web_emp')->logout();
            return redirect('/')->with('message', 'Aguarde aprovação');;
        }

        return $next($request);
    }
}
