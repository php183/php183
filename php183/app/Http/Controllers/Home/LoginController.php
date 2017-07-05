<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function login(){
    	// echo '1111';

    	return view('home.login.login');
    	
    }
}
