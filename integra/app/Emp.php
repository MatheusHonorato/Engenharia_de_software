<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Emp extends Authenticatable
{
    //Mass assignable attributes
	protected $fillable = [
	    'name', 'email', 'password','status',
	];

	//hidden attributes
	protected $hidden = [
	   'password', 'remember_token',
	];
}
