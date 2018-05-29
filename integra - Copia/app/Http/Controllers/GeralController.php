<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeralController extends Controller
{


    public function indexRegister()
    {
        return view('register-geral');
    }

    public function indexLogin()
    {
        return view('login-geral');
    }

     public function welcome()
    {
        return view('welcome');
    }
}
