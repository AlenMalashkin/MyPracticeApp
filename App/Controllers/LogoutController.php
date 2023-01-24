<?php 
namespace App\Controllers;
use App\Core\Controller;

class LogoutController extends Controller
{
	public function LogoutAction()
	{
		session_destroy();
		header('location: http://webstudiolanding/');
	}
}