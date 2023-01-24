<?php 
namespace App\Controllers;
use App\Core\Controller;

class ContactsController extends Controller
{
	public function ShowAction()
	{
		$this->view->Render('Контакты');
	}
}