<?php
	include ('header.php');
	if (!(isset($_SESSION['login']))){
		echo "Пожалуйста, войдите в учетную запись!";
	} elseif ($_SESSION['priv']== "admin") {
		echo "Вы админ!";
	} else {
	$group = $_SESSION['Table'];
	$id = $_GET['red_id'];
	$result = mysql_query("SELECT * FROM $group WHERE id=$id");
	$row = mysql_fetch_array($result);
	$table = $_SESSION['Table'];
	if ($_POST['submit'] == true){
		edit($table,$id);
	}
?>
<form name="forma" action="" method="post">
	<fieldset>
		<legend>Студент</legend>
		Фамилия: <input name="LastName" type="text" value="<?php echo ($row['LastName']); ?>"><br> <!-- Фамилия -->
		Имя: <input name="FirstName" type="text" value="<?php echo ($row['FirstName']); ?>"><br> <!-- Имя -->
		Отчество: <input name="Otchestvo" type="text" value="<?php echo ($row['Otchestvo']); ?>"><br> <!-- Отчество -->
		Номер группы: <input name="NumberGroup" type="text" value="<?php echo ($row['NumberGroup']); ?>"><br> <!-- Номер группы -->
		Специальность:
		<select name="Specialnost" required>
			<option></option>
			<option value="ПРЕПОДАВАНИЕ В НАЧАЛЬНЫХ КЛАССАХ" <?php if ($row['Specialnost']=='ПРЕПОДАВАНИЕ В НАЧАЛЬНЫХ КЛАССАХ'){echo 'selected';}?>>ПРЕПОДАВАНИЕ В НАЧАЛЬНЫХ КЛАССАХ</option>
			<option value="ДОШКОЛЬНОЕ ОБРАЗОВАНИЕ" <?php if ($row['Specialnost']=='ДОШКОЛЬНОЕ ОБРАЗОВАНИЕ'){echo 'selected';}?>>ДОШКОЛЬНОЕ ОБРАЗОВАНИЕ</option>
			<option value="ИЗОБРАЗИТЕЛЬНОЕ ИСКУССТВО И ЧЕРЧЕНИЕ" <?php if ($row['Specialnost']=='ИЗОБРАЗИТЕЛЬНОЕ ИСКУССТВО И ЧЕРЧЕНИЕ'){echo 'selected';}?>>ИЗОБРАЗИТЕЛЬНОЕ ИСКУССТВО И ЧЕРЧЕНИЕ</option>
			<option value="ФИЗИЧЕСКАЯ КУЛЬТУРА" <?php if ($row['Specialnost']=='ФИЗИЧЕСКАЯ КУЛЬТУРА'){echo 'selected';}?>>ФИЗИЧЕСКАЯ КУЛЬТУРА</option>
			<option value="ПРИКЛАДНАЯ ИНФОРМАТИКА" <?php if ($row['Specialnost']=='ПРИКЛАДНАЯ ИНФОРМАТИКА'){echo 'selected';}?>>ПРИКЛАДНАЯ ИНФОРМАТИКА</option>
			<option value="СОЦИАЛЬНАЯ РАБОТА" <?php if ($row['Specialnost']=='СОЦИАЛЬНАЯ РАБОТА'){echo 'selected';}?>>СОЦИАЛЬНАЯ РАБОТА</option>
		</select><br><!-- Специальность -->
		Дата рождения: <input name="BirthDate" type="date" value="<?php echo ($row['BirthDate']); ?>"><br> <!-- Дата рождения -->
		Номер телефона: <input name="Phone" type="text" value="<?php echo ($row['Phone']); ?>"><br> <!-- Номер телефона -->
		Адрес прописки: <input name="Propiska" type="text" value="<?php echo ($row['Propiska']); ?>"><br> <!-- Адрес прописки -->
		Проживание в общежитии: <input name="Obshaga" type="checkbox" value="checked" <?php echo ($row['Obshaga']); ?>><br> <!-- Проживание в общежитии -->
		Адрес проживания: <input name="Progivaet" type="text" value="<?php echo ($row['Progivaet']); ?>"><br> <!-- Адрес проживания -->
		Группа здоровья: 
		<select name="GroupHealth" required>
			<option></option>
			<option value="I" <?php if ($row['GroupHealth']=='I'){echo 'selected';}?>>I</option>
			<option value="II" <?php if ($row['GroupHealth']=='II'){echo 'selected';}?>>II</option>
			<option value="III" <?php if ($row['GroupHealth']=='III'){echo 'selected';}?>>III</option>
			<option value="IV" <?php if ($row['GroupHealth']=='IV'){echo 'selected';}?>>IV</option>
			<option value="V" <?php if ($row['GroupHealth']=='V'){echo 'selected';}?>>V</option>
		</select><br><!-- Группа здоровья -->
		Студент с ОВЗ: <input name="Invalidnost" type="checkbox" value="checked" <?php echo ($row['Invalidnost']); ?>><br> <!-- Инвалидность -->
		Студент состоящий на учете в КДН: <input name="KDN" type="checkbox" value="checked" <?php echo ($row['KDN']); ?>><br> <!-- Инвалидность -->

		Образование (9/11):
		<select name="Class" required>
			<option></option>
			<option value="9" <?php if ($row['Class']=='9'){echo 'selected';}?>>9</option>
			<option value="11" <?php if ($row['Class']=='11'){echo 'selected';}?>>11</option>
		</select><br>
		Средний балл аттестата: <input name="SrBallAt" type="text" value="<?php echo ($row['SrBallAt']); ?>"><br> <!-- Средний балл аттестата -->
		Подработка: <input name="Rabota" type="text" value="<?php echo ($row['Rabota']); ?>"><br> <!-- Подработка -->
		Кружки,секции: <input name="Hobbi" type="text" value="<?php echo ($row['Hobbi']); ?>"><br> <!-- Увлечения -->
	</fieldset>
	<fieldset>
	<legend align="center">Семья</legend>
		Семья: 
		<select name="Family" required>
			<option></option>
			<option value="Полная" <?php if ($row['Family']=='Полная'){echo 'selected';}?>>Полная</option>
			<option value="Неполная" <?php if ($row['Family']=='Неполная'){echo 'selected';}?>>Неполная</option>
			<option value="Сирота" <?php if ($row['Family']=='Сирота'){echo 'selected';}?>>Сирота</option>
		</select><br>	
		Обеспечение: 
		<select name="Obespechenie" >
			<option></option>
			<option value="Гос.обеспечение" <?php if ($row['Obespechenie']=='Гос.обеспечение'){echo 'selected';}?>>Гос.обеспечение</option>
			<option value="Опекун" <?php if ($row['Obespechenie']=='Опекун'){echo 'selected';}?>>Опекун</option>
		</select><br>
		Малообеспеченные: <input name="Maloobespech" type="checkbox" value="checked" <?php echo ($row['Maloobespech']); ?>><br> <!-- Малообеспеченные -->
		Многодетные: <input name="Mnogodet" type="checkbox" value="checked" <?php echo ($row['Mnogodet']); ?>><br> <!-- Многодетные -->
		Семья социального риска: <input name="Socialrisk" type="checkbox" value="checked" <?php echo ($row['Socialrisk']); ?>><br> <!-- Семья социального риска -->
		<fieldset>
			<legend>Отец</legend>
			ФИО отца: <input name="FIOFather" type="text" value="<?php echo ($row['FIOFather']); ?>"><br> <!-- ФИО отца -->
			Пенсионер: <input name="FPensioner" type="checkbox" value="checked" <?php echo ($row['FPensioner']); ?>><br> <!-- Пенсионер -->
			Работа: <input name="FRabota" type="checkbox" value="checked" <?php echo ($row['FRabota']); ?>><br> <!-- Работа -->
			Место работы: <input name="FMestoR" type="text" value="<?php echo ($row['FMestoR']); ?>"><br> <!-- Место работы -->
			Номер телефона: <input name="FPhoner" type="text" value="<?php echo ($row['FPhoner']); ?>"><br> <!-- Номер телефона -->
			Адрес проживания: <input name="FAdres" type="text" value="<?php echo ($row['FAdres']); ?>"><br> <!-- Адрес проживания -->
		</fieldset>
		<fieldset>
			<legend>Мать</legend>
			ФИО матери: <input name="FIOMother" type="text" value="<?php echo ($row['FIOMother']); ?>"><br> <!-- ФИО матери -->
			Пенсионер: <input name="MPensioner" type="checkbox" value="checked" <?php echo ($row['MPensioner']); ?>><br> <!-- Пенсионер -->
			Работа: <input name="MRabota" type="checkbox" value="checked" <?php echo ($row['MRabota']); ?>><br> <!-- Работа -->
			Место работы: <input name="MMestoR" type="text" value="<?php echo ($row['MMestoR']); ?>"><br> <!-- Место работы -->
			Номер телефона: <input name="MPhoner" type="text" value="<?php echo ($row['MPhoner']); ?>"><br> <!-- Номер телефона -->
			Адрес проживания: <input name="MAdres" type="text" value="<?php echo ($row['MAdres']); ?>"><br> <!-- Адрес проживания -->
		</fieldset>
		<fieldset>
			<legend>Опекун</legend>
			ФИО опекуна: <input name="FIOOpekun" type="text" value="<?php echo ($row['FIOOpekun']); ?>"><br> <!-- ФИО матери -->
			Пенсионер: <input name="OPensioner" type="checkbox" value="checked" <?php echo ($row['OPensioner']); ?>><br> <!-- Пенсионер -->
			Работа: <input name="ORabota" type="checkbox" value="checked" <?php echo ($row['ORabota']); ?>><br> <!-- Работа -->
			Место работы: <input name="OMestoR" type="text" value="<?php echo ($row['OMestoR']); ?>"><br> <!-- Место работы -->
			Номер телефона: <input name="OPhoner" type="text" value="<?php echo ($row['OPhoner']); ?>"><br> <!-- Номер телефона -->
			Адрес проживания: <input name="OAdres" type="text" value="<?php echo ($row['OAdres']); ?>"><br> <!-- Адрес проживания -->
		</fieldset>
	</fieldset>
	<input name="submit" type="submit" value="Сохранить изменения"> <!-- Кнопка -->
</form>
<?php
	}
?>