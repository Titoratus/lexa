<?php
	include ('header.php');
	if (!isset($_COOKIE["curator"])){
		echo "Пожалуйста, войдите в учетную запись!";
	} else if(isset($_COOKIE["admin"])){
		echo "Вы админ!";
	} else {
	$group = $_SESSION['Table'];
	$id = $_GET['red_id'];
	$result = mysqli_query($load, "SELECT * FROM $group WHERE id=$id");
	$row = mysqli_fetch_array($result);
	$table = $_SESSION['Table'];
	if (isset($_POST['submit'])){
		edit($table,$id);
	}
?>
<form name="forma" action="" method="post">
	<div class="block">
		<h2 class="block__title">Студент</h2>

		<div class="field-wrap">
			<label for="LastName" class="block__label">Фамилия</label>
			<input class="block__field" id="LastName" name="LastName" type="text" value="<?php echo ($row['LastName']); ?>">
		</div>
		<div class="field-wrap">
			<label for="FirstName" class="block__label">Имя</label>
			<input class="block__field" id="FirstName" name="FirstName" type="text" value="<?php echo ($row['FirstName']); ?>">
		</div>
		<div class="field-wrap">
			<label for="Otchestvo" class="block__label">Отчество</label>
			<input class="block__field" id="Otchestvo" name="Otchestvo" type="text" value="<?php echo ($row['Otchestvo']); ?>">
		</div>
		<div class="field-wrap">
			<label for="NumberGroup" class="block__label">Номер группы</label>
			<input class="block__field" id="NumberGroup" name="NumberGroup" type="text" value="<?php echo ($row['NumberGroup']); ?>">
		</div>
		<div class="field-wrap">
			<label for="Specialnost" class="block__label">Специальность</label>
			<select class="block__field" id="Specialnost" name="Specialnost" required>
				<option></option>
				<option value="ПРЕПОДАВАНИЕ В НАЧАЛЬНЫХ КЛАССАХ" <?php if ($row['Specialnost']=='ПРЕПОДАВАНИЕ В НАЧАЛЬНЫХ КЛАССАХ'){echo 'selected';}?>>ПРЕПОДАВАНИЕ В НАЧАЛЬНЫХ КЛАССАХ</option>
				<option value="ДОШКОЛЬНОЕ ОБРАЗОВАНИЕ" <?php if ($row['Specialnost']=='ДОШКОЛЬНОЕ ОБРАЗОВАНИЕ'){echo 'selected';}?>>ДОШКОЛЬНОЕ ОБРАЗОВАНИЕ</option>
				<option value="ИЗОБРАЗИТЕЛЬНОЕ ИСКУССТВО И ЧЕРЧЕНИЕ" <?php if ($row['Specialnost']=='ИЗОБРАЗИТЕЛЬНОЕ ИСКУССТВО И ЧЕРЧЕНИЕ'){echo 'selected';}?>>ИЗОБРАЗИТЕЛЬНОЕ ИСКУССТВО И ЧЕРЧЕНИЕ</option>
				<option value="ФИЗИЧЕСКАЯ КУЛЬТУРА" <?php if ($row['Specialnost']=='ФИЗИЧЕСКАЯ КУЛЬТУРА'){echo 'selected';}?>>ФИЗИЧЕСКАЯ КУЛЬТУРА</option>
				<option value="ПРИКЛАДНАЯ ИНФОРМАТИКА" <?php if ($row['Specialnost']=='ПРИКЛАДНАЯ ИНФОРМАТИКА'){echo 'selected';}?>>ПРИКЛАДНАЯ ИНФОРМАТИКА</option>
				<option value="СОЦИАЛЬНАЯ РАБОТА" <?php if ($row['Specialnost']=='СОЦИАЛЬНАЯ РАБОТА'){echo 'selected';}?>>СОЦИАЛЬНАЯ РАБОТА</option>
			</select>
		</div>

		<div class="field-wrap">
			<label for="BirthDate" class="block__label">Дата рождения</label> 
			<input id="BirthDate" class="block__field" name="BirthDate" type="date" value="<?php echo ($row['BirthDate']); ?>">
		</div>
		<div class="field-wrap">
			<label for="Phone" class="block__label">Номер телефона</label> 
			<input id="Phone" class="block__field" name="Phone" type="text" value="<?php echo ($row['Phone']); ?>">
		</div>
		<div class="field-wrap">
			<label for="Propiska" class="block__label">Адрес прописки</label> 
			<input id="Propiska" class="block__field" name="Propiska" type="text" value="<?php echo ($row['Propiska']); ?>">
		</div>
		<div class="field-wrap">
			<label for="Progivaet" class="block__label">Адрес проживания</label> 
			<input id="Progivaet" class="block__field" name="Progivaet" type="text" value="<?php echo ($row['Progivaet']); ?>">
		</div>
		<div class="field-wrap">
			<label for="GroupHealth" class="block__label">Группа здоровья</label> 
			<select id="GroupHealth" class="block__field" name="GroupHealth" required>
				<option></option>
				<option value="I" <?php if ($row['GroupHealth']=='I'){echo 'selected';}?>>I</option>
				<option value="II" <?php if ($row['GroupHealth']=='II'){echo 'selected';}?>>II</option>
				<option value="III" <?php if ($row['GroupHealth']=='III'){echo 'selected';}?>>III</option>
				<option value="IV" <?php if ($row['GroupHealth']=='IV'){echo 'selected';}?>>IV</option>
				<option value="V" <?php if ($row['GroupHealth']=='V'){echo 'selected';}?>>V</option>
			</select>
		</div>
		<div class="field-wrap">
			<label for="Class" class="block__label">Образование (9/11)</label>
			<select class="block__field" id="Class" name="Class" required>
				<option></option>
				<option value="9" <?php if ($row['Class']=='9'){echo 'selected';}?>>9</option>
				<option value="11" <?php if ($row['Class']=='11'){echo 'selected';}?>>11</option>
			</select>
		</div>
		<div class="field-wrap">
			<label for="SrBallAt" class="block__label">Средний балл аттестата</label> 
			<input class="block__field" id="SrBallAt" name="SrBallAt" type="text" value="<?php echo ($row['SrBallAt']); ?>">
		</div>
		<div class="field-wrap">
			<label for="Rabota" class="block__label">Подработка</label> 
			<input class="block__field" id="Rabota" name="Rabota" type="text" value="<?php echo ($row['Rabota']); ?>">
		</div>
	<div class="field-wrap">
		<label for="Hobbi" class="block__label">Кружки,секции</label> 
		<input class="block__field" id="Hobbi" name="Hobbi" type="text" value="<?php echo ($row['Hobbi']); ?>">
	</div>
		<div class="field-wrap">
			<input id="Obshaga" class="block__field" name="Obshaga" type="checkbox" value="checked" <?php echo $row['Obshaga']; ?>>
			<label for="Obshaga" class="block__label"><span></span>Проживание в общежитии</label> 			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="Invalidnost" name="Invalidnost" type="checkbox" value="checked" <?php echo ($row['Invalidnost']); ?>>
			<label for="Invalidnost" class="block__label"><span></span>Студент с ОВЗ</label> 			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="KDN" name="KDN" type="checkbox" value="checked" <?php echo ($row['KDN']); ?>>
			<label for="KDN" class="block__label"><span></span>Состоящий на учете в КДН</label> 			
		</div>	
</div>
	<div class="block">	
		<h2 class="block__title">Семья</h2>
		<div class="field-wrap">
			<label for="Family" class="block__label">Семья</label>
			<select class="block__field" id="Family" name="Family" required>
				<option></option>
				<option value="Полная" <?php if ($row['Family']=='Полная'){echo 'selected';}?>>Полная</option>
				<option value="Неполная" <?php if ($row['Family']=='Неполная'){echo 'selected';}?>>Неполная</option>
				<option value="Сирота" <?php if ($row['Family']=='Сирота'){echo 'selected';}?>>Сирота</option>
			</select>
		</div>
		<div class="field-wrap">
			<label for="Obespechenie" class="block__label">Обеспечение</label> 
			<select class="block__field" id="Obespechenie" name="Obespechenie" >
				<option></option>
				<option value="Гос.обеспечение" <?php if ($row['Obespechenie']=='Гос.обеспечение'){echo 'selected';}?>>Гос.обеспечение</option>
				<option value="Опекун" <?php if ($row['Obespechenie']=='Опекун'){echo 'selected';}?>>Опекун</option>
			</select>
		</div>
		<h3 class="block__subtitle">Отец</h3>
		<div class="field-wrap">
			<label for="FIOFather" class="block__label">ФИО отца</label>
			<input class="block__field" id="FIOFather" name="FIOFather" type="text" value="<?php echo ($row['FIOFather']); ?>">
		</div>
		<div class="field-wrap">
			<label for="FMestoR" class="block__label">Место работы</label>
			<input class="block__field" id="FMestoR" name="FMestoR" type="text" value="<?php echo ($row['FMestoR']); ?>">
		</div>
		<div class="field-wrap">
			<label for="FPhoner" class="block__label">Номер телефона</label>
			<input class="block__field" id="FPhoner" name="FPhoner" type="text" value="<?php echo ($row['FPhoner']); ?>">
		</div>
		<div class="field-wrap">
			<label for="FAdres" class="block__label">Адрес проживания</label>
			<input class="block__field" id="FAdres" name="FAdres" type="text" value="<?php echo ($row['FAdres']); ?>">
		</div>
		<div class="field-wrap">
			<input class="block__field" id="FPensioner" name="FPensioner" type="checkbox" value="checked" <?php echo ($row['FPensioner']); ?>>
			<label for="FPensioner" class="block__label"><span></span>Пенсионер</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="FRabota" name="FRabota" type="checkbox" value="checked" <?php echo ($row['FRabota']); ?>>
			<label for="FRabota" class="block__label"><span></span>Работа</label>			
		</div>
		<h3 class="block__subtitle">Мать</h3>
		<div class="field-wrap">
			<label for="FIOMother" class="block__label">ФИО матери</label>
			<input class="block__field" id="FIOMother" name="FIOMother" type="text" value="<?php echo ($row['FIOMother']); ?>">
		</div>
		<div class="field-wrap">
			<label for="MMestoR" class="block__label">Место работы</label>
			<input class="block__field" id="MMestoR" name="MMestoR" type="text" value="<?php echo ($row['MMestoR']); ?>">
		</div>
		<div class="field-wrap">
			<label for="MPhoner" class="block__label">Номер телефона</label>
			<input class="block__field" id="MPhoner" name="MPhoner" type="text" value="<?php echo ($row['MPhoner']); ?>">
		</div>
		<div class="field-wrap">
			<label for="MAdres" class="block__label">Адрес проживания</label>
			<input class="block__field" id="MAdres" name="MAdres" type="text" value="<?php echo ($row['MAdres']); ?>">
		</div>
		<div class="field-wrap">
			<input class="block__field" id="MPensioner" name="MPensioner" type="checkbox" value="checked" <?php echo ($row['MPensioner']); ?>>
			<label for="MPensioner" class="block__label"><span></span>Пенсионер</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="MRabota" name="MRabota" type="checkbox" value="checked" <?php echo ($row['MRabota']); ?>>
			<label for="MRabota" class="block__label"><span></span>Работа</label>			
		</div>		
		<h3 class="block__subtitle">Опекун</h3>
		<div class="field-wrap">
			<label for="FIOOpekun" class="block__label">ФИО опекуна</label>
			<input class="block__field" id="FIOOpekun" name="FIOOpekun" type="text" value="<?php echo ($row['FIOOpekun']); ?>">
		</div>
		<div class="field-wrap">
			<label for="" class="block__label">Место работы</label>
			<input class="block__field" id="" name="OMestoR" type="text" value="<?php echo ($row['OMestoR']); ?>">
		</div>
		<div class="field-wrap">
			<label for="" class="block__label">Номер телефона</label>
			<input class="block__field" id="" name="OPhoner" type="text" value="<?php echo ($row['OPhoner']); ?>">
		</div>
		<div class="field-wrap">
			<label for="" class="block__label">Адрес проживания</label>
			<input class="block__field" id="" name="OAdres" type="text" value="<?php echo ($row['OAdres']); ?>">
		</div>
		<div class="field-wrap">
			<input class="block__field" id="OPensioner" name="OPensioner" type="checkbox" value="checked" <?php echo ($row['OPensioner']); ?>>
			<label for="OPensioner" class="block__label"><span></span>Пенсионер</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="ORabota" name="ORabota" type="checkbox" value="checked" <?php echo ($row['ORabota']); ?>>
			<label for="ORabota" class="block__label"><span></span>Работа</label>	
		</div>		
		<div class="field-wrap">
			<input class="block__field" id="Maloobespech" name="Maloobespech" type="checkbox" value="checked" <?php echo ($row['Maloobespech']); ?>>
			<label for="Maloobespech" class="block__label"><span></span>Малообеспеченные</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="Mnogodet" name="Mnogodet" type="checkbox" value="checked" <?php echo ($row['Mnogodet']); ?>>
			<label for="Mnogodet" class="block__label"><span></span>Многодетные</label>			
		</div>
		<div class="field-wrap">
			<input class="block__field" id="Socialrisk" name="Socialrisk" type="checkbox" value="checked" <?php echo ($row['Socialrisk']); ?>>
			<label for="Socialrisk" class="block__label"><span></span>Семья социального риска</label>			
		</div>	
		<input name="submit" class="block__btn" type="submit" value="Сохранить изменения">		
	</div>
</div>
</form>
<?php
	}
?>