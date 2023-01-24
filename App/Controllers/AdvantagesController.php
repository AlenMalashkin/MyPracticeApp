<?php 
namespace App\Controllers;
use App\Core\Controller;

class AdvantagesController extends Controller
{
	public function ShowAction()
	{
		$this->view->Render('Приемущества');
	}
}