<?php 
namespace App\Controllers;
use App\Core\Controller;

class AccountController extends Controller
{
	public function LoginAction()
	{
		$this->model->Login();

		$vars = [
			'massage' => $this->model->massage,
		];

		$this->view->Render('Логин', $vars);
	}

	public function RegisterAction()
	{
		$this->model->Register();

		$vars = [
			'massage' => $this->model->massage,
		];

		$this->view->Render('Регистрация', $vars);
	}	
}