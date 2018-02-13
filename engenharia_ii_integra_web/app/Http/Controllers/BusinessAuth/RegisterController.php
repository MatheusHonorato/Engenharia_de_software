<?php

namespace App\Http\Controllers\BusinessAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

//Business Model
use App\Business;

//Auth Facade used in guard
use Auth;

class RegisterController extends Controller
{
    protected $redirectPath = 'business_home';

	//shows registration form to business
    public function showRegistrationForm()
    {
    	return view('business.auth.register');
    }

    //Handles registration request for business
    public function register(Request $request){

    	//Validates data
    	$this->validator($request->all())->validate();

    	//Create business
    	$business = $this->create($request->all());

    	//Authenticates business
    	$this->guard()->login($business);

    	//Redirects business
    	return redirect($this->redirectPath);

    }

    //Validator user's Input
    protected function validator(array $data){
    	return Validator::make($data, [
    		'name' => 'required|max:255',
    		'email' => 'required|email|max:255|unique:businesses',
    		'password' => 'required|min:6|confirmed',
    	]);
    }

    //Create a new business instance after a validation.
    protected function create(array $data){
    	return Business::create([
    		'name' => $data['name'],
    		'email' => $data['email'],
    		'password' => bcrypt($data['password']),
    	]);
    }

    //Get the guard authenticate Business
    protected function guard()
    {
        return Auth::guard('web_business');
    }
}
