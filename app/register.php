<?php
	$page = "Администраторская";
	include ('header.php');
	if (!isset($_COOKIE["curator"]) && !isset($_COOKIE["admin"])){
		echo "Пожалуйста, войдите в учетную запись!";
	} else if(isset($_COOKIE["admin"])){
?>
<form class="block_form" id="new_user" method="POST" action="">
	<div class="block">
		<h2 class="block__subtitle block__subtitle_nm">Новый пользователь</h2>
		<div class="field-wrap">
			<label for="login" class="block__label">Логин</label>
			<input class="block__field field_nocap" type="text" id="login" name="login" minlength="4" required>
		</div>
		<div class="field-wrap">
			<label for="pass" class="block__label">Пароль</label>
			<input class="block__field field_nocap" type="password" id="pass" name="pass" minlength="4" required>
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
		<div class="for_curator">
			<div class="field-wrap">
				<label for="number" class="block__label">Номер группы</label>
				<input type="text" class="block__field field_nocap" id="number" name="number" minlength="3" maxlength="3" pattern="[0-9]+" title="Только цифры!" required>
			</div>
			<div class="field-wrap">
				<label for="year" class="block__label">Год поступления</label>
				<input type="text" class="block__field field_nocap" id="year" name="year" minlength="4" maxlength="4" pattern="[0-9]+" title="Только цифры!" required>
			</div>
		</div>
		<input type="submit" class="block__btn" value="Добавить пользователя" name="but">
	</div>
</form>

<form class="block_form" id="change_pass">
	<div class="block">
		<h2 class="block__subtitle block__subtitle_nm">Изменение пароля</h2>
		<div class="field-wrap">
			<label for="userlist" class="block__label">Пользователь</label>
			<select class="block__field" name="userlist" id="userlist" required>
			<?php
				$query = mysqli_query($load, "SELECT * FROM users");
				while($row = mysqli_fetch_array($query)){
			?>
				<option value="<?php echo $row["uid"]; ?>"><?php echo $row["username"]; ?></option>
			<?php
				}
			?>
			</select>
		</div>
		<div class="field-wrap">
			<label for="newpass" class="block__label">Новый пароль</label>
			<input type="text" name="newpass" id="newpass" class="block__field" required>			
		</div>
		<input type="submit" class="block__btn" value="Изменить пароль" name="but">
	</div>
</form>
<form class="block_form" id="del_group">
	<div class="block">
		<h2 class="block__subtitle block__subtitle_nm">Удаление группы</h2>
		<div class="field-wrap">
			<label for="del_groupid" class="block__label">Группа</label>
			<select class="block__field" name="del_groupid" id="del_groupid" required>
			<?php
				$query = mysqli_query($load, "SELECT * FROM groups");
				while($row = mysqli_fetch_array($query)){
					$id = $row["g_curator"];
					$cur = mysqli_query($load, "SELECT username FROM users WHERE uid='$id'");
					$cur = mysqli_fetch_array($cur);
			?>
				<option value="<?php echo $row["g_name"]; ?>"><?php echo $row["g_name"]." — ".$cur["username"]; ?></option>
			<?php
				}
			?>
			</select>
		</div>
		<div class="field-wrap">
			<label class="block__alert">Данные студентов выбранной группы будут безвозвратно удалены!</label>	
		</div>		
		<input type="submit" class="block__btn" value="Удалить группу" name="but">
	</div>
</form>

<form class="block_form" id="edt_group" method="POST" action="">
	<div class="block">
		<h2 class="block__subtitle block__subtitle_nm">Изменение группы</h2>
		<div class="field-wrap">
			<label for="edt_groupid" class="block__label">Группа</label>
			<select class="block__field" name="edt_groupid" id="edt_groupid" required>
			<?php
				$query = mysqli_query($load, "SELECT * FROM groups");
				$i = false;
				while($row = mysqli_fetch_array($query)){
					$id = $row["g_curator"];
					$cur = mysqli_query($load, "SELECT username FROM users WHERE uid='$id'");
					$cur = mysqli_fetch_array($cur);
					if(!$i){
						$i = true;
						$firstopt = $row["g_name"];
					}
			?>
				<option value="<?php echo $row["g_name"]; ?>"><?php echo $row["g_name"]." — ".$cur["username"]; ?></option>
			<?php
				}
			?>
			</select>
		</div>
		<div class="field-wrap">
			<label for="edt_newgroup" class="block__label">Новое название</label>
			<input type="text" class="block__field" name="edt_newgroup" id="edt_newgroup" value="<?php echo isset($firstopt) ? $firstopt : ""; ?>" minlength="3" maxlength="3" pattern="[0-9]+" title="Только цифры!" required>
		</div>		
		<input type="submit" class="block__btn" value="Изменить" name="but">
	</div>
</form>
<?php
} else echo "Вы не администратор!";

include("footer.php");
?>