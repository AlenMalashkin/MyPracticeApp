<?php 
namespace App\Controllers;
use App\Core\Controller;

class MainController extends Controller
{
	public function IndexAction()
	{
		$this->model->SendComment();
		$this->model->DeleteComment();
		
		$result = $this->model->GetNews();
		$vars = [
			'news' => $result
		];

		$this->view->Render('Главная страница', $vars);
	}
}