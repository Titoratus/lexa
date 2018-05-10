<?php
	$page = "Главная";
	include("header.php");
	if(!(isset($_COOKIE["curator"]) || isset($_COOKIE["admin"]))){
?>

<form id="loginForm" class="login" method="POST" action="">
		<h1 class="login__title">Вход</h1>
		<input type="text" minlength="4" name="e_login" class="login__input" placeholder="Логин" required autocomplete="off">
		<input type="password" minlength="4" name="e_password" class="login__input" placeholder="Пароль" required>
		<div class="login__error"></div>
		<input class="login__submit" type="submit" name="vhod" value="Войти">
</form>

<?php
	}
	else if(!isset($_COOKIE["group"]) && isset($_COOKIE["curator"])){
?>
<form id="new_group">
	<div class="block">
		<a class="block__exit" href="exit.php">Выйти</a>
		<h2 class="block__subtitle block__subtitle_nm">Создание группы</h3>
		<div class="field-wrap">
			<label for="new_group_num" class="block__label">Название группы</label>
			<input class="block__field" id="new_group_num" name="new_group_num" minlength="3" maxlength="3" type="text" required>
		</div>
		<div class="field-wrap">
			<label for="new_group_y" class="block__label">Год поступления</label>
			<input class="block__field" id="new_group_y" name="new_group_y" minlength="4" maxlength="4" type="text" required>
		</div>		
		<input type="submit" class="block__btn" value="Создать группу">
	</div>
</form>
<?php
	}
	include("footer.php");
?>