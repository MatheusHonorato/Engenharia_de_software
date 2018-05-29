<?php

namespace App\Http\Controllers\EmpAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

class LoginController extends Controller
{
	protected $redirectTo = 'emp/home';

    use AuthenticatesUsers;

    protected function guard()
    {
      return Auth::guard('web_emp');
    }

    public function showLoginForm()
   {
       return view('emp.auth.login');
   }
}
