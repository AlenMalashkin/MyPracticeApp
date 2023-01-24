<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<nav>
		<a href="/">Главная</a>
		<a href="/about">О нас</a>
		<a href="/advantages">Приемущества</a>
		<a href="/partners">Партнеры</a>
		<a href="/products">Продукты</a>
		<a href="/contact">Контакты</a>
		<?php
			if (!isset($_SESSION['userid']))
			{
				echo '
					<a href="/account/register">Регистрация</a>
					<a href="/account/login">Вход</a>
				';
			}
			else
			{
				echo '
					<a href="/logout">Выйти</a>
				';
			}
		?>
		
	</nav>

	<main>
		<?= $content ?>
	</main>

	<footer>
		<a href="/">Главная</a>
		<a href="/about">О нас</a>
		<a href="/advantages">Приемущества</a>
		<a href="/partners">Партнеры</a>
		<a href="/products">Продукты</a>
		<a href="/contact">Контакты</a>
		<p>&#169; Все права защищены 2023</p>
	</footer>
</body>
</html>