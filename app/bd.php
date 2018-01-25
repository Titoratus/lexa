<?php
	$load = mysqli_connect("localhost", "root", "", "lich") or die("Ошибка подключения к БД!");
	mysqli_query($load, "SET NAMES 'utf8'");
?>