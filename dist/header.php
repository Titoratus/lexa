<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $page; //Вывод заголовка активной вкладки ?></title>
	<script src="js/font-loader.js"></script>
	<link rel="stylesheet" href="css/main.min.css">
</head>
<body>
	<?php
		include("bd.php");
		include("function.php");
		if (!(isset($_SESSION['login']))){
			//Кек
		} elseif ($_SESSION['priv']== "admin") {
	?>
	<header>
		<ul class="top-line">
			<li class="top-line__elem"><a class='<?php echo $page == 'Главная' ? 'link_active' : '' ?> top-line__link' href='index.php'>Главная</a></li>
			<li class="top-line__elem"><a class='<?php echo $page == 'Добавление' ? 'link_active' : '' ?> top-line__link' href='content.php'>Добавление</a></li>
			<li class="top-line__elem"><a class='<?php echo $page == 'Студенты' ? 'link_active' : '' ?> top-line__link' href='student.php'>Студенты</a></li>
			<li class="top-line__elem"><a class='<?php echo $page == 'Администраторская' ? 'link_active' : '' ?> top-line__link' href='register.php'>Администраторская</a></li>
			<li class="top-line__elem"><a class='top-line__link exit' href='exit.php'>Выход</a></li>
		</ul>
	</header>

	<?php } else { ?>

	<header>
		<ul class="top-line">
			<li class="top-line__elem"><a class='<?php echo $page == 'Главная' ? 'link_active' : '' ?> top-line__link' href='index.php'>Главная</a></li>
			<li class="top-line__elem"><a class='<?php echo $page == 'Добавление' ? 'link_active' : '' ?> test top-line__link' href='content.php'>Добавление</a></li>
			<li class="top-line__elem"><a class='<?php echo $page == 'Студенты' ? 'link_active' : '' ?> top-line__link' href='student.php'>Студенты</a></li>
			<li class="top-line__elem"><a class='top-line__link exit' href='exit.php'>Выход</a></li>
		</ul>
	</header>

	<?php } ?>