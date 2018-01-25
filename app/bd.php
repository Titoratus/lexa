<?php
	$load = mysqli_connect("","", "", "") or die("Ошибка подключения к БД!");
	mysqli_query($load, "SET NAMES 'utf8'");
	mysqli_query($load, "SET CHARACTER SET 'utf8'");	
?>