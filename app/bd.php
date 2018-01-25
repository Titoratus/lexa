<?php
	header("Content-Type: text/html; charset=UTF-8");
	$load = mysqli_connect("localhost", "root", "", "lich") or die("Ошибка подключения к БД!");
	$query = mysqli_query($load, "SET NAMES UTF8");
?>