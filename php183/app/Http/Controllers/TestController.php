<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TestController extends Controller
{
		public function index()
		{
			echo '这是控制器的index';
		}
}
