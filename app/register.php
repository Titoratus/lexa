<?php
	$page = "Администраторская";
	include ('header.php');
	if (!isset($_SESSION['login'])){
		echo "Пожалуйста, войдите в учетную запись!";
	} elseif ($_SESSION['priv']== "admin") {
?>
<form id="new_user" method="POST" action="">
	<div class="block">
		<h2 class="block__subtitle block__subtitle_nm">Новый пользователь</h2>
		<div class="field-wrap">
			<label for="login" class="block__label">Логин</label>
			<input class="block__field" type="text" id="login" name="login">
		</div>
		<div class="field-wrap">
			<label for="pass" class="block__label">Пароль</label>
			<input class="block__field" type="password" id="pass" name="pass">
		</div>
		<div class="field-wrap">
			<label for="confpass" class="block__label">Повторите пароль</label>
			<input class="block__field" type="password" id="confpass" name="confpass">
		</div>
		<div class="field-wrap">
			<label for="priv" class="block__label">Привилегии</label>
			<select class="block__field" id="priv" name="priv" required>
				<option></option>
				<option value="admin">Администратор</option>
				<option value="kurator">Куратор</option>
			</select>
		</div>
		<div class="field-wrap">
			<label for="number" class="block__label">Номер группы</label>
			<input type="text" class="block__field" id="number" name="number">
		</div>
		<div class="field-wrap">
			<label for="year" class="block__label">Год поступления</label>
			<input type="text" class="block__field" id="year" name="year">
		</div>
		<input type="submit" class="block__btn" value="Добавить пользователя" name="but">
	</div>
</form>
<?php
	if (isset($_POST['but'])){
		if ($_POST['pass'] == $_POST['confpass']){
			$groups = $_POST['number'].'_'.$_POST['year'];
			reg($_POST['login'], $_POST['pass'], $_POST['priv'], $_POST['number'], $_POST['year']);
			create_bd($groups);
			echo "Пользователь успешно добавлен!";
		} else {
			echo "Ошибка!";
		}
	}
} else {
	echo "Вы не администратор!";
	}

	include("footer.php");
?>