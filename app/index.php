<?php
	$page = "Главная";
	include ("header.php");
	if (!(isset($_SESSION['login']))){
?>

<form id="loginForm" class="login" method="POST" action="">
		<h1 class="login__title">Вход</h1>
		<input type="text" name="e_login" class="login__input" placeholder="Логин" required autocomplete="off">
		<input type="password" name="e_password" class="login__input" placeholder="Пароль" required>
		<div class="login__error"></div>
		<input class="vhod login__submit" type="submit" name="vhod" value="Войти">
</form>

<?php
	}

	include("footer.php");
?>