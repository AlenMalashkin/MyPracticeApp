<?php 
namespace App\Controllers;
use App\Core\Controller;

class ProductsController extends Controller
{
	public function ShowAction()
	{
		$this->view->Render('Продукты');
	}
}