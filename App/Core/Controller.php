<?php 
namespace App\Core;
use App\Core\View;

abstract class Controller 
{
	public $route;
	public $view;
	public $model;

	public function __construct($route)
	{
		$this->route = $route;
		$this->view = new View($route);
		$this->model = $this->LoadModel($route['controller']);
	}

	public function LoadModel($name)
	{
		$path = 'App\Models\\'.ucfirst($name);
		if (class_exists($path))
		{
			return new $path;
		}
	}
}