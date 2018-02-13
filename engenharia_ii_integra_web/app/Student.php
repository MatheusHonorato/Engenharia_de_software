<?php

namespace App;

//Class which implements Illuminate\Contracts\Auth\Authenticatable
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    //Mass assignable attibutes
    protected $fillable = [
    	'name', 'email', 'password',
    ];

    //hidden attributes
    protected $hidden = [
    	'password', 'remember_token',
    ];
}
