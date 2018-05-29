<?php

namespace App\Http\Controllers\EmpAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

use App\Emp;

use Auth;

class RegisterController extends Controller
{
    protected $redirectPath = 'emp/home';

    public function showRegistrationForm()
    {
    	return view('emp.auth.register');
    }


    public function register(Request $request)
    {

       //Validates data
        $this->validator($request->all())->validate();

       //Create emp
        $emp = $this->create($request->all());

        //Authenticates emp
        $this->guard()->login($emp);

       //Redirects emps
        return redirect($this->redirectPath);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:emps',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return Emp::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function guard()
	{
	    return Auth::guard('web_emp');
	}
}
