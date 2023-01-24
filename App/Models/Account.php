<?php 
namespace App\Models;
use App\Core\Model;

class Account extends Model
{
	public $massage = '';

	public function Register()
	{
		if (isset($_POST['register']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$passwordRepeat = $_POST['passwordRepeat'];
			$password_hash = password_hash($password,  PASSWORD_BCRYPT);

			if ($password == $passwordRepeat)
			{
				$this->db->Query('INSERT INTO users (name, password) VALUES (:name, :password)', 
				[
					'name' => $login, 
					'password' => $password_hash
				]);

				$this->massage = 'Вы успешно зарегистрированы!';
			}
			else
			{
				$this->massage = 'Введен неверный повторный пароль!';
			}
		}
	}

	public function Login()
	{
		if (isset($_POST['login'])) 
		{
	        $name = $_POST['name'];
	        $password = $_POST['password'];

	        $result = $this->db->Fetch('SELECT * FROM users WHERE name=:name', 
	    		[
	    			'name' => $name,
	    		]);

	        if (!$result) 
	        {
	           	$this->massage = 'Неверный пароль или имя пользователя!';
	        } 
	        else 
	        {
	            if (password_verify($_POST['password'], $result['password'])) 
	            {
	                $_SESSION['userid'] = $result['id'];
	                $_SESSION['username'] = $result['name'];
	                $_SESSION['admin'] = $result['admin'];
	                $this->massage = 'Вы успешно авторизовались!';
	            } 
	            else 
	            {
	                $this->massage = 'Неверный пароль или имя пользователя!';
	            }
	        }
    	}
	}
}