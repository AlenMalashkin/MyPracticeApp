<?php 
namespace App\Controllers;
use App\Core\Controller;

class PartnersController extends Controller
{
	public function ShowAction()
	{
		$this->view->Render('Партнеры');
	}
}