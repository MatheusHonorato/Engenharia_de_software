<?php

namespace App\Http\Controllers\ManagerAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

//Manager Model
use App\Manager;

//Auth Facade used in guard
use Auth;

class RegisterController extends Controller
{
    protected $redirectPath = 'manager_home';

	//shows registration form to manager
    public function showRegistrationForm()
    {
    	return view('manager.auth.register');
    }

    //Handles registration request for manager
    public function register(Request $request)
    {
    	//Validates manager
    	$this->validator($request->all())->validate();

    	//Create manager
    	$manager = $this->create($request->all());

    	//Authenticates manager
    	$this->guard()->login($manager);

    	//Redirects manager
    	return redirect($this->redirectPath);
    }

    //Validator user's Input
    protected function validator(array $data)
    {
    	return Validator::make($data, [
    		'name' => 'required|max:255',
    		'email' => 'required|email|max:255|unique:managers',
    		'password' => 'required|min:6|confirmed',
    	]);
    }

    //Create a new manager instance after a validation.
    protected function create(array $data)
    {
    	return Manager::create([
    		'name' => $data['name'],
    		'email' => $data['email'],
    		'password' => bcrypt($data['password']),
    	]);
    }

    //Get the guard to authenticate Manage
    protected function guard()
    {
        return Auth::guard('web_manager');
    }
}
