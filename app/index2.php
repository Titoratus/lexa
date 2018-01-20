<?php
	include ('header.php');
	if (!(isset($_SESSION['login']))){
		echo "Добро пожаловать, Гость";
	} else {
		echo "Добро пожаловать ".$_SESSION['login']; 
	}
?>
