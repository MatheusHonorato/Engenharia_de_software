<?php

namespace App;

//Class which implements Illuminate\Contracts\Auth\Authenticatable
use Illuminate\Foundation\Auth\User as Authenticatable;

class Business extends Authenticatable
{
    //Mass assignable attributes
    protected $fillable = [
    	'name', 'email', 'password',
    ];

    //hidden attributes
    protected $hidden = [
    	'password', 'remember_token',
    ];
}
