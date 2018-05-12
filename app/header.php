<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $page; //Вывод заголовка активной вкладки ?></title>
	<script src="js/font-loader.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php include("bd.php"); ?>
	<header>
		<ul class="top-line">
		<?php if($page == "Главная"){ ?>
			<li class="top-line__elem top-line__greeting">Добро пожаловать, <?php echo isset($_COOKIE["admin"]) ? "администратор!" : "куратор!"; ?></li>
		<?php } else if($page != "Вход"){ ?>
			<li class="top-line__elem"><a class='<?php echo $page == 'Главная' ? 'link_active' : '' ?> top-line__link' href='index.php'>Главная</a></li>
		<?php } if(isset($_COOKIE["admin"])){ ?>	
		
			<li class="top-line__elem"><a class='<?php echo $page == 'Студенты' ? 'link_active' : '' ?> top-line__link' href='student.php'>Студенты</a>
			<?php if($page == "Главная"){ ?>
				<p class="menu_desc stud_desc">Список студентов всех групп, просмотр, редактирование отдельного студента, загрузка полного списка всех студентов или личного дела в формате документа Word.</p>
			<?php } ?>
			</li>
			<li class="top-line__elem"><a class='<?php echo $page == 'Администраторская' ? 'link_active' : '' ?> top-line__link' href='register.php'>Администраторская</a>
			<?php if($page == "Главная"){ ?>
				<p class="menu_desc admin_desc">Создание пользователя и группы, изменение пароля пользователя, изменение и удаление группы.</p>
			<?php } ?>			
			</li>
			<li class="top-line__elem"><a class='top-line__link exit' href='exit.php'>Выход</a></li>

		<?php } else if(isset($_COOKIE["curator"]) && isset($_COOKIE["group"])){ ?>

			<li class="top-line__elem"><a class='<?php echo $page == 'Добавление' ? 'link_active' : '' ?> test top-line__link' href='content.php'>Добавление</a>
			<?php if($page == "Главная"){ ?>
				<p class="menu_desc add_desc">Создание студента.</p>
			<?php } ?>	
			</li>
			<li class="top-line__elem"><a class='<?php echo $page == 'Студенты' ? 'link_active' : '' ?> top-line__link' href='student.php'>Студенты</a>
			<?php if($page == "Главная"){ ?>
				<p class="menu_desc stud_desc">Список студентов группы, просмотр, редактирование отдельного студента, загрузка полного списка студентов группы или личного дела в формате документа Word.</p>
			<?php } ?>
			</li>
			<li class="top-line__elem"><a class='top-line__link exit' href='exit.php'>Выход</a></li>

		<?php } ?>
		</ul>
	</header>