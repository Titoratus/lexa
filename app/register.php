<?php
	$page = "Администраторская";
	include ('header.php');
	if (!isset($_COOKIE["curator"])){
		echo "Пожалуйста, войдите в учетную запись!";
	} else if(isset($_COOKIE["admin"])){
?>
<form id="new_user" method="POST" action="">
	<div class="block">
		<h2 class="block__subtitle block__subtitle_nm">Новый пользователь</h2>
		<div class="field-wrap">
			<label for="login" class="block__label">Логин</label>
			<input class="block__field field_nocap" type="text" id="login" name="login" required>
		</div>
		<div class="field-wrap">
			<label for="pass" class="block__label">Пароль</label>
			<input class="block__field field_nocap" type="password" id="pass" name="pass" required>
		</div>
		<div class="field-wrap">
			<label for="confpass" class="block__label">Повторите пароль</label>
			<input class="block__field field_nocap" type="password" id="confpass" name="confpass" required>
		</div>
		<div class="field-wrap">
			<label for="priv" class="block__label">Привилегии</label>
			<select class="block__field" id="priv" name="priv" required>
				<option selected disabled></option>
				<option value="admin">Администратор</option>
				<option value="kurator">Куратор</option>
			</select>
		</div>
		<div class="field-wrap">
			<label for="number" class="block__label">Номер группы</label>
			<input type="text" class="block__field field_nocap" id="number" name="number" required>
		</div>
		<div class="field-wrap">
			<label for="year" class="block__label">Год поступления</label>
			<input type="text" class="block__field field_nocap" id="year" name="year" required>
		</div>
		<input type="submit" class="block__btn" value="Добавить пользователя" name="but">
	</div>
</form>
<?php
} else echo "Вы не администратор!";

include("footer.php");
?>