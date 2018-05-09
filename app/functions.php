<?php
	session_start();
	include("bd.php");

	//Вход
	if(isset($_POST["e_login"])){
		$e_login = $_POST["e_login"];
		$e_password = md5($_POST["e_password"]);
		$query = mysqli_query($load, "SELECT * FROM users WHERE username = '$e_login'");
		if(mysqli_num_rows($query) == 0) die("error");

		$user_data = mysqli_fetch_array($query);				
		if($user_data["pass"] == $e_password){
			setcookie("curator", "$e_login", time() + 7200);
			$query = mysqli_query($load, "SELECT uid FROM users WHERE username = '$e_login'");
			$query = mysqli_fetch_array($query);
			$uid = $query["uid"];
			$query = mysqli_query($load, "SELECT g_name FROM groups WHERE g_curator = '$uid'");
			$query = mysqli_fetch_array($query);
			$group = $query["g_name"];
			//Куки с ID группы
			setcookie("group", "$group", time() + 7200);
			//Если админ, то set куки
			if($user_data["admin"] == 1) setcookie("admin", "1", time() + 7200);
		} else die("error");
	}

	//Новый студент
	if(isset($_POST["new_stud"])){
		$name = $_POST["name"];
		$lastname = $_POST["lastname"];
		$father = $_POST["father"];
		$group_num = $_COOKIE["group"]; 
		$speciality = $_POST["speciality"];
		$birthdate = $_POST["birthdate"];
		$phone = $_POST["phone"];
		$registration = $_POST["registration"]; 
		$dormitory = isset($_POST["dormitory"]) ? "1" : "0";
		$residence = $_POST["residence"];
		$grouphealth = $_POST["grouphealth"];
		$disability = isset($_POST["disability"]) ? "1" : "0";
		$kdn = isset($_POST["kdn"]) ? "1" : "0";
		$class = $_POST["class"];
		$midmark = $_POST["midmark"];
		$work = $_POST["work"];
		$hobby = $_POST["hobby"];
		$family = $_POST["family"];
		$security = $_POST["security"];	
		$lowincome = isset($_POST["lowincome"]) ? "1" : "0";
		$children = isset($_POST["children"]) ? "1" : "0";	
		$socialrisk = isset($_POST["socialrisk"]) ? "1" : "0";		
		$father_name = $_POST["father_name"];
		$f_pensioner = isset($_POST["f_pensioner"]) ? "1" : "0";
		$f_work = isset($_POST["f_work"]) ? "1" : "0";
		$f_workplace = $_POST["f_workplace"];
		$f_phone = $_POST["f_phone"];
		$f_address = $_POST["f_address"];	
		$mother_name = $_POST["mother_name"];
		$m_pensioner = isset($_POST["m_pensioner"]) ? "1" : "0";
		$m_work = isset($_POST["m_work"]) ? "1" : "0";
		$m_workplace = $_POST["m_workplace"];
		$m_phone = $_POST["m_phone"];
		$m_address = $_POST["m_address"];			
		$guardian_name = $_POST["guardian_name"];
		$g_pensioner = isset($_POST["g_pensioner"]) ? "1" : "0";
		$g_work = isset($_POST["g_work"]) ? "1" : "0";
		$g_workplace = $_POST["g_workplace"];
		$g_phone = $_POST["g_phone"];
		$g_address = $_POST["g_address"];

		$result = mysqli_query($load, "INSERT INTO `students` (`id`, `name`, `lastname`, `father`, `group_num`, `speciality`, `birthdate`, `phone`, `registration`, `dormitory`, `residence`, `grouphealth`, `disability`, `kdn`, `class`, `midmark`, `work`, `hobby`, `family`, `security`, `lowincome`, `children`, `socialrisk`, `father_name`, `f_pensioner`, `f_work`, `f_workplace`, `f_phone`, `f_address`, `mother_name`, `m_pensioner`, `m_work`, `m_workplace`, `m_phone`, `m_address`, `guardian_name`, `g_pensioner`, `g_work`, `g_workplace`, `g_phone`, `g_address`)
		                               VALUES (NULL, '$name', '$lastname', '$father', '$group_num', '$speciality', '$birthdate', '$phone', '$registration', '$dormitory', '$residence', '$grouphealth', '$disability', '$kdn', '$class', '$midmark', '$work', '$hobby', '$family', '$security', '$lowincome', '$children', '$socialrisk', '$father_name', '$f_pensioner', '$f_work', '$f_workplace', '$f_phone', '$f_address', '$mother_name', '$m_pensioner', '$m_work', '$m_workplace', '$m_phone', '$m_address', '$guardian_name', '$g_pensioner', '$g_work', '$g_workplace', '$g_phone', '$g_address')");

		if($result) echo "Ваши данные успешно добавлены!";
		else echo "<span class='info_error'>Ваши данные не добавлены!</span>";
	}


//Удалить студента
if(isset($_POST["del_stud"])){
	$id = $_POST["del_stud"];
	$result = mysqli_query($load, "DELETE FROM students WHERE id='$id'");
}


//Редактировать студента
if(isset($_POST["edit_stud"])){
	$id = $_POST["edit_stud"];
	if(isset($_COOKIE["admin"])) $result = mysqli_query($load, "SELECT * FROM students WHERE id = '$id' ORDER BY lastname ASC");
	else {
		$group = $_COOKIE["group"];
		$result = mysqli_query($load, "SELECT * FROM students WHERE id = '$id' AND group_num = '$group' ORDER BY lastname ASC");
	}
	$row = mysqli_fetch_array($result);
?>
<form class="popup-inline" id="form_save" method="post">
	<div class="block">
		<h2 class="block__title">Студент</h2>
		<div class="field-wrap">
			<label for="name" class="block__label">Имя</label>
			<input class="block__field" id="name" name="name" type="text" value="<?php echo $row["name"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="lastname" class="block__label">Фамилия</label>
			<input class="block__field" id="lastname" name="lastname" type="text" value="<?php echo $row["lastname"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="father" class="block__label">Отчество</label>
			<input class="block__field" id="father" name="father" type="text" value="<?php echo $row["father"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="group_num" class="block__label">Номер группы</label>
			<select class="block__field" id="group_num" name="group_num" required>
				<?php
					$query = mysqli_query($load, "SELECT DISTINCT group_num FROM students"); 
					while($group = mysqli_fetch_array($query)){
				?>
						<option value="<?php echo $group["group_num"]; ?>" <?php echo $group["group_num"] == $row["group_num"] ? "selected" : ""; ?>><?php echo $group["group_num"]; ?></option>
				<?php

					}
				?>
		  </select>
		</div>
		<div class="field-wrap">
			<label for="speciality" class="block__label">Специальность</label>
			<select class="block__field" id="speciality" name="speciality" required>
				<option value="Преподавание в начальных классах" <?php if ($row["speciality"]=="Преподавание в начальных классах"){echo "selected";}?>>Преподавание в начальных классах</option>
				<option value="Дошкольное образование" <?php if ($row["speciality"]=="Дошкольное образование"){echo "selected";}?>>Дошкольное образование</option>
				<option value="Изобразительное искусство и черчение" <?php if ($row["speciality"]=="Изобразительное искусство и черчение"){echo "selected";}?>>Изобразительное искусство и черчение</option>
				<option value="Физическая культура" <?php if ($row["speciality"]=="Физическая культура"){echo "selected";}?>>Физическая культура</option>
				<option value="Прикладная информатика" <?php if ($row["speciality"]=="Прикладная информатика"){echo "selected";}?>>Прикладная информатика</option>
				<option value="Социальная работа" <?php if ($row["speciality"]=="Социальная работа"){echo "selected";}?>>Социальная работа</option>
			</select>
		</div>

		<div class="field-wrap">
			<label for="birthdate" class="block__label">Дата рождения</label> 
			<input id="birthdate" class="block__field" name="birthdate" type="date" value="<?php echo $row["birthdate"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="phone" class="block__label">Номер телефона</label> 
			<input id="phone" class="block__field" name="phone" type="text" value="<?php echo $row["phone"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="registration" class="block__label">Адрес прописки</label> 
			<input id="registration" class="block__field" name="registration" type="text" value="<?php echo $row["registration"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="residence" class="block__label">Адрес проживания</label> 
			<input id="residence" class="block__field" name="residence" type="text" value="<?php echo $row["residence"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="grouphealth" class="block__label">Группа здоровья</label> 
			<select id="grouphealth" class="block__field" name="grouphealth" required>
				<option value="I" <?php if ($row["grouphealth"]=="I"){echo "selected";}?>>I</option>
				<option value="II" <?php if ($row["grouphealth"]=="II"){echo "selected";}?>>II</option>
				<option value="III" <?php if ($row["grouphealth"]=="III"){echo "selected";}?>>III</option>
				<option value="IV" <?php if ($row["grouphealth"]=="IV"){echo "selected";}?>>IV</option>
				<option value="V" <?php if ($row["grouphealth"]=="V"){echo "selected";}?>>V</option>
			</select>
		</div>
		<div class="field-wrap">
			<label for="class" class="block__label">Образование (9/11)</label>
			<select class="block__field" id="class" name="class" required>
				<option value="9" <?php if ($row["class"]=="9"){echo "selected";}?>>9</option>
				<option value="11" <?php if ($row["class"]=="11"){echo "selected";}?>>11</option>
			</select>
		</div>
		<div class="field-wrap">
			<label for="midmark" class="block__label">Средний балл аттестата</label> 
			<input class="block__field" id="midmark" name="midmark" type="text" value="<?php echo $row["midmark"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="work" class="block__label">Подработка</label> 
			<input class="block__field" id="work" name="work" type="text" value="<?php echo $row["work"]; ?>">
		</div>
	<div class="field-wrap">
		<label for="hobby" class="block__label">Кружки,секции</label> 
		<input class="block__field" id="hobby" name="hobby" type="text" value="<?php echo $row["hobby"]; ?>">
	</div>
		<div class="field-wrap">
			<input class="block__field" id="dormitory" name="dormitory" type="checkbox" <?php echo $row["dormitory"] == 1 ? "checked" : ""; ?>>
			<label for="dormitory" class="block__label"><span></span>Проживание в общежитии</label> 			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="disability" name="disability" type="checkbox" <?php echo $row["disability"] == 1 ? "checked" : ""; ?>>
			<label for="disability" class="block__label"><span></span>Студент с ОВЗ</label> 			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="kdn" name="kdn" type="checkbox" <?php echo $row["kdn"] == 1 ? "checked" : ""; ?>>
			<label for="kdn" class="block__label"><span></span>Состоящий на учете в КДН</label> 			
		</div>	
</div>
	<div class="block">	
		<h2 class="block__title">Семья</h2>
		<div class="field-wrap">
			<label for="family" class="block__label">Семья</label>
			<select class="block__field" id="family" name="family" required>
				<option value="Полная" <?php if ($row["family"]=="Полная"){echo "selected";}?>>Полная</option>
				<option value="Неполная" <?php if ($row["family"]=="Неполная"){echo "selected";}?>>Неполная</option>
				<option value="Сирота" <?php if ($row["family"]=="Сирота"){echo "selected";}?>>Сирота</option>
			</select>
		</div>
		<div class="field-wrap">
			<label for="security" class="block__label">Обеспечение</label> 
			<select class="block__field" id="security" name="security" >
				<option value="Гос.обеспечение" <?php if ($row["security"]=="Гос.обеспечение"){echo "selected";}?>>Гос.обеспечение</option>
				<option value="Опекун" <?php if ($row["security"]=="Опекун"){echo "selected";}?>>Опекун</option>
			</select>
		</div>
		<h3 class="block__subtitle">Отец</h3>
		<div class="field-wrap">
			<label for="father_name" class="block__label">ФИО отца</label>
			<input class="block__field" id="father_name" name="father_name" type="text" value="<?php echo $row["father_name"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="f_workplace" class="block__label">Место работы</label>
			<input class="block__field" id="f_workplace" name="f_workplace" type="text" value="<?php echo $row["f_workplace"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="f_phone" class="block__label">Номер телефона</label>
			<input class="block__field" id="f_phone" name="f_phone" type="text" value="<?php echo $row["f_phone"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="f_address" class="block__label">Адрес проживания</label>
			<input class="block__field" id="f_address" name="f_address" type="text" value="<?php echo $row["f_address"]; ?>">
		</div>
		<div class="field-wrap">
			<input class="block__field" id="f_pensioner" name="f_pensioner" type="checkbox" value="checked" <?php echo $row["f_pensioner"] == 1 ? "checked" : ""; ?>>
			<label for="f_pensioner" class="block__label"><span></span>Пенсионер</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="f_work" name="f_work" type="checkbox" value="checked" <?php echo $row["f_work"] == 1 ? "checked" : ""; ?>>
			<label for="f_work" class="block__label"><span></span>Работа</label>			
		</div>
		<h3 class="block__subtitle">Мать</h3>
		<div class="field-wrap">
			<label for="mother_name" class="block__label">ФИО матери</label>
			<input class="block__field" id="mother_name" name="mother_name" type="text" value="<?php echo $row["mother_name"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="m_workplace" class="block__label">Место работы</label>
			<input class="block__field" id="m_workplace" name="m_workplace" type="text" value="<?php echo $row["m_workplace"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="m_phone" class="block__label">Номер телефона</label>
			<input class="block__field" id="m_phone" name="m_phone" type="text" value="<?php echo $row["m_phone"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="m_address" class="block__label">Адрес проживания</label>
			<input class="block__field" id="m_address" name="m_address" type="text" value="<?php echo $row["m_address"]; ?>">
		</div>
		<div class="field-wrap">
			<input class="block__field" id="m_pensioner" name="m_pensioner" type="checkbox" value="checked" <?php echo $row["m_pensioner"] == 1 ? "checked" : ""; ?>>
			<label for="m_pensioner" class="block__label"><span></span>Пенсионер</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="m_work" name="m_work" type="checkbox" value="checked" <?php echo $row["m_work"] == 1 ? "checked" : ""; ?>>
			<label for="m_work" class="block__label"><span></span>Работа</label>			
		</div>		
		<h3 class="block__subtitle">Опекун</h3>
		<div class="field-wrap">
			<label for="guardian_name" class="block__label">ФИО опекуна</label>
			<input class="block__field" id="guardian_name" name="guardian_name" type="text" value="<?php echo $row["guardian_name"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="g_workplace" class="block__label">Место работы</label>
			<input class="block__field" id="g_workplace" name="g_workplace" type="text" value="<?php echo $row["g_workplace"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="g_phone" class="block__label">Номер телефона</label>
			<input class="block__field" id="g_phone" name="g_phone" type="text" value="<?php echo $row["g_phone"]; ?>">
		</div>
		<div class="field-wrap">
			<label for="g_address" class="block__label">Адрес проживания</label>
			<input class="block__field" id="g_address" name="g_address" type="text" value="<?php echo $row["g_address"]; ?>">
		</div>
		<div class="field-wrap">
			<input class="block__field" id="g_pensioner" name="g_pensioner" type="checkbox" value="checked" <?php echo $row["g_pensioner"] == 1 ? "checked" : ""; ?>>
			<label for="g_pensioner" class="block__label"><span></span>Пенсионер</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="g_work" name="g_work" type="checkbox" value="checked" <?php echo $row["g_work"] == 1 ? "checked" : ""; ?>>
			<label for="g_work" class="block__label"><span></span>Работа</label>	
		</div>		
		<div class="field-wrap">
			<input class="block__field" id="lowincome" name="lowincome" type="checkbox" value="checked" <?php echo $row["lowincome"] == 1 ? "checked" : ""; ?>>
			<label for="lowincome" class="block__label"><span></span>Малообеспеченные</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="children" name="children" type="checkbox" value="checked" <?php echo $row["children"] == 1 ? "checked" : ""; ?>>
			<label for="children" class="block__label"><span></span>Многодетные</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="socialrisk" name="socialrisk" type="checkbox" value="checked" <?php echo $row["socialrisk"] == 1 ? "checked" : ""; ?>>
			<label for="socialrisk" class="block__label"><span></span>Семья социального риска</label>			
		</div>	
		<input name="submit" class="block__btn" type="submit" value="Сохранить изменения">		
	</div>
</div>
</form>
<?php
	}

//Сохранить изменения
if(isset($_POST["edit_stud_save"])){
		$id = $_POST["stud_save"];
		$name = $_POST["name"];
		$lastname = $_POST["lastname"];
		$father = $_POST["father"];
		$group_num = $_POST["group_num"]; 
		$speciality = $_POST["speciality"];
		$birthdate = $_POST["birthdate"];
		$phone = $_POST["phone"];
		$registration = $_POST["registration"]; 
		$dormitory = isset($_POST["dormitory"]) ? "1" : "0";
		$residence = $_POST["residence"];
		$grouphealth = $_POST["grouphealth"];
		$disability = isset($_POST["disability"]) ? "1" : "0";
		$kdn = isset($_POST["kdn"]) ? "1" : "0";
		$class = $_POST["class"];
		$midmark = $_POST["midmark"];
		$work = $_POST["work"];
		$hobby = $_POST["hobby"];
		$family = $_POST["family"];
		$security = $_POST["security"];	
		$lowincome = isset($_POST["lowincome"]) ? "1" : "0";
		$children = isset($_POST["children"]) ? "1" : "0";	
		$socialrisk = isset($_POST["socialrisk"]) ? "1" : "0";		
		$father_name = $_POST["father_name"];
		$f_pensioner = isset($_POST["f_pensioner"]) ? "1" : "0";
		$f_work = isset($_POST["f_work"]) ? "1" : "0";
		$f_workplace = $_POST["f_workplace"];
		$f_phone = $_POST["f_phone"];
		$f_address = $_POST["f_address"];	
		$mother_name = $_POST["mother_name"];
		$m_pensioner = isset($_POST["m_pensioner"]) ? "1" : "0";
		$m_work = isset($_POST["m_work"]) ? "1" : "0";
		$m_workplace = $_POST["m_workplace"];
		$m_phone = $_POST["m_phone"];
		$m_address = $_POST["m_address"];			
		$guardian_name = $_POST["guardian_name"];
		$g_pensioner = isset($_POST["g_pensioner"]) ? "1" : "0";
		$g_work = isset($_POST["g_work"]) ? "1" : "0";
		$g_workplace = $_POST["g_workplace"];
		$g_phone = $_POST["g_phone"];
		$g_address = $_POST["g_address"];
 		
		$result = mysqli_query($load, "UPDATE students SET name='$name', lastname='$lastname', father='$father', group_num='$group_num'
			, speciality='$speciality', birthdate='$birthdate', phone='$phone', registration='$registration', dormitory='$dormitory', residence='$residence'
			, grouphealth='$grouphealth', disability='$disability', kdn='$kdn', class='$class', midmark='$midmark', work='$work'
			, hobby='$hobby', family='$family', security='$security', lowincome='$lowincome', children='$children', socialrisk='$socialrisk', father_name='$father_name', f_pensioner='$f_pensioner', f_work='$f_work'
			, f_workplace='$f_workplace', f_phone='$f_phone', f_address='$f_address', mother_name='$mother_name', m_pensioner='$m_pensioner', m_work='$m_work'
			, m_workplace='$m_workplace', m_phone='$m_phone', m_address='$m_address', guardian_name='$guardian_name', g_pensioner='$g_pensioner', g_work='$g_work'
			, g_workplace='$g_workplace', g_phone='$g_phone', g_address='$g_address' WHERE id='$id'");
}


//Просмотр студента
if(isset($_POST["view_stud"])){
		$id = $_POST["view_stud"];
		if(isset($_COOKIE["group"])){
			$group = $_COOKIE["group"];
			$result = mysqli_query($load, "SELECT * FROM students WHERE id='$id' AND group_num = '$group'");
		}
		else $result = mysqli_query($load, "SELECT * FROM students WHERE id='$id'");
		$row = mysqli_fetch_array($result);
?>
<form class="popup-inline" name="forma" action="doc2.php?doc_id=<?php echo $id; ?>" method="post">
		<div class="block block_view">
			<h2 class="block__title">Студент</h2>

			<div class="field-wrap">
				<label class="block__label" for="FirstName">Имя</label>
				<?php echo $row["name"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="LastName">Фамилия</label>
				<?php echo $row["lastname"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Otchestvo">Отчество</label>
				<?php echo $row["father"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="NumberGroup">Номер группы</label>
				<?php echo $row["group_num"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Specialnost">Специальность</label> 
				<?php echo $row["speciality"]; ?>
			</div>
			
			<div class="field-wrap">
				<label class="block__label" for="BirthDate">Дата рождения</label>
				<?php echo $row["birthdate"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Phone">Номер телефона</label>
				<?php echo $row["phone"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Propiska">Адрес прописки</label>
				<?php echo $row["registration"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Progivaet">Адрес проживания</label>
				<?php echo $row["residence"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="GroupHealth">Группа здоровья</label> 
				<?php echo $row["grouphealth"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Class">Образование (9/11)</label>
				<?php echo $row["class"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="SrBallAt">Средний балл аттестата</label>
				<?php echo $row["midmark"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Rabota">Подработка</label>
				<?php echo $row["work"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Hobbi">Кружки, секции</label>
				<?php echo $row["hobby"]; ?>
			</div>

			<div class="field-wrap">				
				<input class="block__field" type="checkbox" <?php echo $row["dormitory"] == 1 ? "checked" : ""; ?> disabled>
				<label class="block__label label_inline" for="Obshaga"><span></span>Проживание в общежитии</label>
			</div>

			<div class="field-wrap">				
				<input class="block__field" type="checkbox" <?php echo $row["disability"] == 1 ? "checked" : ""; ?> disabled>
				<label class="block__label label_inline" for="Invalidnost"><span></span>Студент с ОВЗ</label>
			</div>		

			<div class="field-wrap">				
				<input class="block__field" type="checkbox" <?php echo $row["kdn"] == 1 ? "checked" : ""; ?> disabled>
				<label class="block__label label_inline" for="KDN"><span></span>Состоящий на учете в КДН</label>
			</div>				

		</div>

	<!--Семья-->
	<div class="block block_view">	
		<h2 class="block__title">Семья</h2>
		<div class="field-wrap">
			<label class="block__label" for="">Семья</label>
			<?php echo $row["family"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Обеспечение</label>
			<?php echo $row["security"]; ?>
		</div>

		<h3 class="block__subtitle">Отец</h3>
		<div class="field-wrap">
			<label class="block__label" for="">ФИО отца</label>
			<?php echo $row["father_name"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Место работы</label>
			<?php echo $row["f_workplace"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Номер телефона</label>
			<?php echo $row["f_phone"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Адрес проживания</label>
			<?php echo $row["f_address"]; ?>
		</div>

		<div class="field-wrap">
			<input class="block__field" type="checkbox" <?php echo $row["f_pensioner"] == 1 ? "checked" : ""; ?> disabled>
			<label class="block__label" for="FPensioner"><span></span>Пенсионер</label>
		</div>
		<div class="field-wrap">
			<input class="block__field" type="checkbox" <?php echo $row["f_work"] == 1 ? "checked" : ""; ?> disabled>
			<label class="block__label" for="FRabota"><span></span>Работа</label>
		</div>

		<h3 class="block__subtitle">Мать</h3>
		<div class="field-wrap">
			<label class="block__label" for="FIOMother">ФИО матери</label>
			<?php echo $row["mother_name"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="MMestoR">Место работы</label>
			<?php echo $row["m_workplace"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="MPhoner">Номер телефона</label>
			<?php echo $row["m_phone"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="MAdres">Адрес проживания</label>
			<?php echo $row["m_address"]; ?>
		</div>

		<div class="field-wrap">
			<input type="checkbox" class="block__field" <?php echo $row["m_pensioner"] == 1 ? "checked" : ""; ?> disabled>
			<label class="block__label" for="MPensioner"><span></span>Пенсионер</label>
		</div>
		<div class="field-wrap">
			<input type="checkbox" class="block__field" <?php echo $row["m_work"] == 1 ? "checked" : ""; ?> disabled>
			<label class="block__label" for="MRabota"><span></span>Работа</label>
		</div>


		<h3 class="block__subtitle">Опекун</h3>
		<div class="field-wrap">
			<label class="block__label" for="FIOOpekun">ФИО опекуна</label>
			<?php echo $row["guardian_name"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="OMestoR">Место работы</label>
			<?php echo $row["g_workplace"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="OPhoner">Номер телефона</label>
			<?php echo $row["g_phone"]; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="OAdres">Адрес проживания</label>
			<?php echo $row["g_address"]; ?>
		</div>

		<div class="field-wrap">
			<input type="checkbox" class="block__field" <?php echo $row["g_pensioner"] == 1 ? "checked" : ""; ?> disabled>
			<label class="block__label" for="OPensioner"><span></span>Пенсионер</label>			
		</div>

		<div class="field-wrap">
			<input type="checkbox" class="block__field" <?php echo $row["g_work"] == 1 ? "checked" : ""; ?> disabled>
			<label class="block__label" for="ORabota"><span></span>Работа</label>	
		</div>				

		<div class="field-wrap">
			<input type="checkbox" class="block__field" <?php echo $row["lowincome"] == 1 ? "checked" : ""; ?> disabled>
			<label class="block__label" for="Maloobespech"><span></span>Малообеспеченные</label>
		</div>

		<div class="field-wrap">
			<input type="checkbox" class="block__field" <?php echo $row["children"] == 1 ? "checked" : ""; ?> disabled>
			<label class="block__label" for="Mnogodet"><span></span>Многодетные</label>
		</div>

		<div class="field-wrap">
			<input type="checkbox" class="block__field" <?php echo $row["socialrisk"] == 1 ? "checked" : ""; ?> disabled>
			<label class="block__label" for="Socialrisk"><span></span>Семья социального риска</label>
		</div>

		<input class="block__btn" type="submit" name="doc" value="Скачать">
	</div>
</form>
<?php
}

//Сортировка
if(isset($_POST["sel_id"])){
	$id = $_POST["sel_id"];
	if(isset($_COOKIE["admin"])) $result = mysqli_query($load, "SELECT * FROM students WHERE $id = '1' ORDER BY lastname ASC");
	else {
		$group = $_COOKIE["group"];
		$result = mysqli_query($load, "SELECT * FROM students WHERE $id = '1' AND group_num = '$group' ORDER BY lastname ASC");		
	}
?>	
		<tr>
			<th>№</th>
			<th><a class="sort_table" data-sort="lastname">Фамилия</a></th>
			<th><a class="sort_table" data-sort="name">Имя</a></th>
			<th><a class="sort_table" data-sort="father">Отчество</a></th>
			<th><a class="sort_table" data-sort="birthdate">Дата рождения</a></th>
			<th><a class="sort_table" data-sort="dormitory">Общежитие</a></th>
			<th><a class="sort_table" data-sort="registration">Адрес проживания</a></th>
			<th><a class="sort_table" data-sort="phone">Телефон</a></th>
			<?php if(isset($_COOKIE["admin"])){ ?>
				<th><a>Группа</a></th>
			<?php } ?>
		</tr>

<?php
		$i = 1;
		while($stud = mysqli_fetch_array($result)){
			$h = $stud["id"];
?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $stud['lastname']; ?></td> 
			<td><?php echo $stud['name']; ?></td>
			<td><?php echo $stud['father']; ?></td>
			<td><?php echo $stud['birthdate']; ?></td>
<?php
			if($stud["dormitory"] == "1") echo "<td>Проживает</td>";
			else echo "<td>Не проживает</td>";
?>
			<td><?php echo $stud["residence"]; ?></td>
			<td><?php echo $stud["phone"]; ?></td>
			<?php if(isset($_COOKIE["admin"])) { ?>
			<td><?php echo $stud["group_num"]; ?></td>
			<?php } ?>
			<td><a class="view_stud" data-view_stud="<?php echo $stud["id"]; ?>">Просмотр</a></td>
			<td><a class="edit_stud" data-edit_stud="<?php echo $stud["id"]; ?>">Редактировать</a></td>
			<td><a class="del_stud" data-del_stud="<?php echo $stud["id"]; ?>">Удалить</a></td>
		</tr>
<?php
			$i++;
		}
}

//Новый пользователь
if(isset($_POST["year"])){
	$username = $_POST["login"];
	$pass = md5($_POST["pass"]);
	$confpass = $_POST["confpass"];
	$admin = $_POST["priv"] == "admin" ? "1" : "0";
	$confpass = $_POST["confpass"];
	$group = $_POST["number"];
	$year = $_POST["year"];

	$query = mysqli_query($load, "SELECT username FROM users WHERE username = '$username'");
	if(mysqli_num_rows($query)) die("<span class='info_error'>Пользователь с таким логином уже есть!</span>");

	$query = mysqli_query($load, "SELECT g_name FROM groups WHERE g_name = '$group'");
	if(mysqli_num_rows($query)) die("<span class='info_error'>Такая группа уже есть!</span>");
	
	if(!($_POST["pass"] == $confpass)) die("<span class='info_error'>Пароли не совпадают!</span>");

	$query = mysqli_query($load, "INSERT INTO users (`uid`, `username`, `pass`, `admin`) VALUES (NULL, '$username', '$pass', '$admin')");
	if(!$query) die("<span class='info_error'>Не удалось добавить пользователя :(</span>");

	echo "Пользователь успешно добавлен!";
	$getuid = mysqli_query($load, "SELECT uid FROM users WHERE username = '$username'");
	$getuid = mysqli_fetch_array($getuid);
	$uid = $getuid["uid"];

	$query = mysqli_query($load, "INSERT INTO groups (`g_name`, `g_year`, `g_curator`) VALUES ('$group', '$year', '$uid')");
}
?>