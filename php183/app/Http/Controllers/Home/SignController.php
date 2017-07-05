<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignController extends Controller
{
    //引入注册页面
    public function sign(){

    	//echo '1111';

    	return view('home.sign.sign');
    }
}
