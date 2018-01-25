<?php
	include("../bd.php");
	$host_bd = 'localhost'; //Хост
	$user_bd = 'root'; //Имя пользователя (логин)
	$pass_bd = ''; //Пароль пользователя
	$name_bd = 'lich'; //Имя базы данных
	$name_tb = 'users'; //Имя таблицы
	$config_tb = 'config';
	mysqli_query($load, "CREATE TABLE $name_tb	(
		id int auto_increment primary key,
		user VARCHAR(40),
		pass VARCHAR(40),
		priv VARCHAR(40),
		grup VARCHAR(30),
		year VARCHAR(40)) ")
		Or die("Не удалось создать таблицу"); //Создание таблиц и разделов
	mysqli_query($load, "CREATE TABLE $config_tb	(
		id int auto_increment primary key,
		groups VARCHAR(40),
		years VARCHAR(40),
		obshee VARCHAR(40))")
		Or die("Не удалось создать таблицу"); //Создание таблиц и разделов
	$pw = md5('admin');
	$result = mysqli_query($load, "INSERT INTO $name_tb (user, pass, priv, grup) 
	VALUES ('admin', '$pw', 'admin', '666')");
	if($result == 'true') {
		echo "БД успешно установлена!<br> User: <b>Admin</b><br> Password: <b>admin</b>";
	} else {
		echo "Не удалость установить БД";
	}
?>