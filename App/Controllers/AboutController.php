<?php 
namespace App\Controllers;
use App\Core\Controller;

class AboutController extends Controller
{
	public function ShowAction()
	{
		$this->view->Render('О нас');
	}
}