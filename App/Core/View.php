<?php 
namespace App\Core;

class View
{
	public $path;
	public $route;
	public $layout = 'default';

	public function __construct($route)
	{
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	public function Render($title, $vars = [])
	{
		extract($vars);
		$path = 'App/Views/'.$this->path.'.php';

		if (file_exists('App/Views/'.$this->path.'.php'))
		{
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'App/Views/Layouts/'.$this->layout.'.php';
		}
		else
		{
			echo 'Не найден вид: '.$this->path;
		}
	}

	public function Redirect($url)
	{
		header('location: '.$url);
		exit;
	}

	public static function ErrorCode($code)
	{
		http_response_code($code);
		$path = 'App/Views/Errors/'.$code.'.php';

		if (file_exists($path))
			require $path;

		exit;
	}

}