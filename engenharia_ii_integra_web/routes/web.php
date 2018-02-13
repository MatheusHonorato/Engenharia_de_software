<?php

Route::get('/', function () {
    return view('welcome');
});


//routes manager
Route::get('manager_register', 'ManagerAuth\RegisterController@showRegistrationForm');
Route::post('manager_register', 'ManagerAuth\RegisterController@register');

Route::get('/manager_home', function(){
	return view('manager.home');
});

//routes business
Route::get('business_register', 'BusinessAuth\RegisterController@showRegistrationForm');
Route::post('business_register', 'BusinessAuth\RegisterController@register');

Route::get('/business_home', function(){
	return view('business.home');
});

//routes student
Route::get('student_register','StudentAuth\RegisterController@showRegistrationForm');
Route::post('student_register', 'StudentAuth\RegisterController@register');

Route::get('/student_home', function(){
	return view('student.home');
});
