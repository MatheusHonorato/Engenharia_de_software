<?php

namespace App\Http\Controllers\StudentAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

//Student Model
use App\Student;

//Auth Facade used in guard
use Auth;

class RegisterController extends Controller
{
    protected $redirectPath = 'student_home';

    //shows registration form to student
    public function showRegistrationForm()
    {
    	return view('student.auth.register');
    }

    //Handles registration request for student
    public function register(Request $request)
    {
    	//Validates data
    	$this->validator($request->all())->validate();

    	//Create student
    	$student = $this->create($request->all());

    	//Authenticates student
    	$this->guard()->login($student);

    	//Redirects students
    	return redirect($this->redirectPath);
    }

    //Validator user's Input
    protected function validator(array $data)
    {
    	return Validator::make($data, [
    		'name' => 'required|max:255',
    		'email' => 'required|email|max:255|unique:students',
    		'password' => 'required|min:6|confirmed',
    	]);
    }

    //Create a new student instance after a validation.
    protected function create(array $data)
    {
    	return Student::create([
    		'name' => $data['name'],
    		'email' => $data['email'],
    		'password' => bcrypt($data['password']),
    	]);
    }

    //Get the guard to authenticate Student
    protected function guard()
    {
        return Auth::guard('web_student');
    }
}
