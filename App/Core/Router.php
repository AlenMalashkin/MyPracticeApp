<?php 
namespace App\Core;

use App\Core\View;

class Router
{
	protected $routes = [];
	protected $params = [];

	public function __construct()
	{
		$arr = require 'App/Config/Routes.php';

		foreach ($arr as $k => $v) 
		{
			$this->Add($k, $v);
		}
	}

	public function Add($route, $param)
	{
		$route = '#^'.$route.'$#';
		$this->routes[$route] = $param;
	}

	public function Match()
	{
		$url = trim($_SERVER['REQUEST_URI'], '/');

		foreach ($this->routes as $route => $param) 
		{
			if (preg_match($route, $url, $matches))
			{
				$this->params = $param;
				return true;
			}
		}
		return false;
	}

	public function Run()
	{
		if ($this->Match())
		{
			$path = 'App\Controllers\\'.ucfirst($this->params['controller']).'Controller';

			if (class_exists($path))
			{
				$action = $this->params['action'].'Action';
				if (method_exists($path, $action))
				{
					$controller = new $path($this->params);
					$controller->$action();
				}
				else
				{
					View::ErrorCode(404);
				}
			}
			else
			{
				View::ErrorCode(404);
			}
		}
		else
		{
			View::ErrorCode(404);
		}
		
	}
}