<?php
	session_start();
	include("bd.php");

	//Новый студент
	if(isset($_POST['FirstName'])){
		$table = $_SESSION['Table'];
		function add_person($name){
			$load = mysqli_connect("localhost","root", "", "lich") or die("Ошибка подключения к БД!");	
			$FirstName = $_POST['FirstName'];
			$LastName = $_POST['LastName'];
			$Otchestvo = $_POST['Otchestvo'];
			$NumberGroup = $_POST['NumberGroup']; 
			$Specialnost = $_POST['Specialnost'];
			$BirthDate = $_POST['BirthDate'];
			$Phone = $_POST['Phone'];
			$Propiska = $_POST['Propiska']; 
			$Obshaga = isset($_POST['Obshaga']) ? 'checked' : '';
			$Progivaet = $_POST['Progivaet'];
			$GroupHealth = $_POST['GroupHealth'];
			$Invalidnost = isset($_POST['Invalidnost']) ? 'checked' : ''; 
			$KDN = isset($_POST['KDN']) ? 'checked' : ''; 
			$Class = $_POST['Class'];
			$SrBallAt = $_POST['SrBallAt'];
			$Rabota = $_POST['Rabota'];
			$Hobbi = $_POST['Hobbi'];
			$Family = $_POST['Family'];
			$Obespechenie = $_POST['Obespechenie'];	
			$Maloobespech = isset($_POST['Maloobespech']) ? 'checked' : '';
			$Mnogodet = isset($_POST['Mnogodet']) ? 'checked' : '';	
			$Socialrisk = isset($_POST['Socialrisk']) ? 'checked' : '';		
			$FIOFather = $_POST['FIOFather'];
			$FPensioner = isset($_POST['FPensioner']) ? 'checked' : '';
			$FRabota = isset($_POST['FRabota']) ? 'checked' : '';
			$FMestoR = $_POST['FMestoR'];
			$FPhoner = $_POST['FPhoner'];
			$FAdres = $_POST['FAdres'];	
			$FIOMother = $_POST['FIOMother'];
			$MPensioner = isset($_POST['MPensioner']) ? 'checked' : '';
			$MRabota = isset($_POST['MRabota']) ? 'checked' : '';
			$MMestoR = $_POST['MMestoR'];
			$MPhoner = $_POST['MPhoner'];
			$MAdres = $_POST['MAdres'];			
			$FIOOpekun = $_POST['FIOOpekun'];
			$OPensioner = isset($_POST['OPensioner']) ? 'checked' : '';
			$ORabota = isset($_POST['ORabota']) ? 'checked' : '';
			$OMestoR = $_POST['OMestoR'];
			$OPhoner = $_POST['OPhoner'];
			$OAdres = $_POST['OAdres'];	
			$result = mysqli_query($load, "INSERT INTO $name (FirstName, LastName, Otchestvo, NumberGroup, Specialnost, BirthDate, Phone, Propiska, Obshaga, 
			Progivaet, GroupHealth, Invalidnost, KDN, Class, SrBallAt, Rabota, Hobbi, Family, Obespechenie, Maloobespech, Mnogodet, Socialrisk, FIOFather, FPensioner, FRabota, FMestoR, FPhoner, FAdres,
			FIOMother, MPensioner, MRabota, MMestoR, MPhoner, MAdres, FIOOpekun, OPensioner, ORabota, OMestoR, OPhoner, OAdres) 
			VALUES ('$FirstName', '$LastName', '$Otchestvo', '$NumberGroup', '$Specialnost', '$BirthDate', '$Phone', '$Propiska', '$Obshaga', '$Progivaet',
			'$GroupHealth', '$Invalidnost', '$KDN', '$Class', '$SrBallAt', '$Rabota', '$Hobbi', '$Family', '$Obespechenie', '$Maloobespech', '$Mnogodet', '$Socialrisk', '$FIOFather', '$FPensioner', '$FRabota', 
			'$FMestoR',	'$FPhoner', '$FAdres', '$FIOMother', '$MPensioner', '$MRabota', '$MMestoR',	'$MPhoner', '$MAdres', '$FIOOpekun', '$OPensioner',
			'$ORabota', '$OMestoR',	'$OPhoner', '$OAdres')");
			//Если запрос пройдет успешно то в переменную result вернется true
			if($result == 'true') {
				echo "Ваши данные успешно добавлены!";
			} else {
				echo "Ваши данные не добавлены!";
			}
		}
		add_person($table);
	}


//Удалить студента
if(isset($_POST["del_stud"])){
	$group = $_SESSION['Table'];
	$result = mysqli_query($load, "SELECT * FROM $group");
	$id = $_POST["del_stud"];
	function delet($name,$id){
		$load = mysqli_connect("localhost","root", "", "lich") or die("Ошибка подключения к БД!");	
		$result = mysqli_query($load, "DELETE FROM $name WHERE id='$id'");
	}		
	delet($group,$id);
}


//Редактировать студента
if(isset($_POST["edit_stud"])){
	$group = $_SESSION['Table'];
	$id = $_POST["edit_stud"];
	$result = mysqli_query($load, "SELECT * FROM $group WHERE id=$id");
	$row = mysqli_fetch_array($result);
	$table = $_SESSION['Table'];
?>
<form id="form_save" action="" method="post">
	<div class="block">
		<h2 class="block__title">Студент</h2>
		<div class="field-wrap">
			<label for="FirstName" class="block__label">Имя</label>
			<input class="block__field" id="FirstName" name="FirstName" type="text" value="<?php echo $row['FirstName']; ?>">
		</div>
		<div class="field-wrap">
			<label for="LastName" class="block__label">Фамилия</label>
			<input class="block__field" id="LastName" name="LastName" type="text" value="<?php echo $row['LastName']; ?>">
		</div>
		<div class="field-wrap">
			<label for="Otchestvo" class="block__label">Отчество</label>
			<input class="block__field" id="Otchestvo" name="Otchestvo" type="text" value="<?php echo $row['Otchestvo']; ?>">
		</div>
		<div class="field-wrap">
			<label for="NumberGroup" class="block__label">Номер группы</label>
			<input class="block__field" id="NumberGroup" name="NumberGroup" type="text" value="<?php echo $row['NumberGroup']; ?>">
		</div>
		<div class="field-wrap">
			<label for="Specialnost" class="block__label">Специальность</label>
			<select class="block__field" id="Specialnost" name="Specialnost" required>
				<option></option>
				<option value="Преподавание в начальных классах" <?php if ($row['specialnost']=='Преподавание в начальных классах'){echo 'selected';}?>>Преподавание в начальных классах</option>
				<option value="Дошкольное образование" <?php if ($row['specialnost']=='Дошкольное образование'){echo 'selected';}?>>Дошкольное образование</option>
				<option value="Изобразительное искусство и черчение" <?php if ($row['specialnost']=='Изобразительное искусство и черчение'){echo 'selected';}?>>Изобразительное искусство и черчение</option>
				<option value="Физическая культура" <?php if ($row['specialnost']=='Физическая культура'){echo 'selected';}?>>Физическая культура</option>
				<option value="Прикладная информатика" <?php if ($row['specialnost']=='Прикладная информатика'){echo 'selected';}?>>Прикладная информатика</option>
				<option value="Социальная работа" <?php if ($row['specialnost']=='Социальная работа'){echo 'selected';}?>>Социальная работа</option>
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
			<label for="OMestoR" class="block__label">Место работы</label>
			<input class="block__field" id="OMestoR" name="OMestoR" type="text" value="<?php echo ($row['OMestoR']); ?>">
		</div>
		<div class="field-wrap">
			<label for="OPhoner" class="block__label">Номер телефона</label>
			<input class="block__field" id="OPhoner" name="OPhoner" type="text" value="<?php echo ($row['OPhoner']); ?>">
		</div>
		<div class="field-wrap">
			<label for="OAdres" class="block__label">Адрес проживания</label>
			<input class="block__field" id="OAdres" name="OAdres" type="text" value="<?php echo ($row['OAdres']); ?>">
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


//Сохранить изменения
if(isset($_POST["edit_stud_save"])){
	function edit($name,$id){
		$load = mysqli_connect("localhost","root", "", "lich") or die("Ошибка подключения к БД!");	
		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Otchestvo = $_POST['Otchestvo'];
		$NumberGroup = $_POST['NumberGroup']; 
		$Specialnost = $_POST['Specialnost'];
		$BirthDate = $_POST['BirthDate'];
		$Phone = $_POST['Phone'];
		$Propiska = $_POST['Propiska']; 
		$Obshaga = isset($_POST['Obshaga']) ? 'checked' : '';
		$Progivaet = $_POST['Progivaet'];
		$GroupHealth = $_POST['GroupHealth'];
		$Invalidnost = isset($_POST['Invalidnost']) ? 'checked' : ''; 
		$KDN = isset($_POST['KDN']) ? 'checked' : ''; 
		$Class = $_POST['Class'];
		$SrBallAt = $_POST['SrBallAt'];
		$Rabota = $_POST['Rabota'];
		$Hobbi = $_POST['Hobbi'];
		$Family = $_POST['Family'];
		$Obespechenie = $_POST['Obespechenie'];	
		$Maloobespech = isset($_POST['Maloobespech']) ? 'checked' : '';
		$Mnogodet = isset($_POST['Mnogodet']) ? 'checked' : '';	
		$Socialrisk = isset($_POST['Socialrisk']) ? 'checked' : '';		
		$FIOFather = $_POST['FIOFather'];
		$FPensioner = isset($_POST['FPensioner']) ? 'checked' : '';
		$FRabota = isset($_POST['FRabota']) ? 'checked' : '';
		$FMestoR = $_POST['FMestoR'];
		$FPhoner = $_POST['FPhoner'];
		$FAdres = $_POST['FAdres'];	
		$FIOMother = $_POST['FIOMother'];
		$MPensioner = isset($_POST['MPensioner']) ? 'checked' : '';
		$MRabota = isset($_POST['MRabota']) ? 'checked' : '';
		$MMestoR = $_POST['MMestoR'];
		$MPhoner = $_POST['MPhoner'];
		$MAdres = $_POST['MAdres'];			
		$FIOOpekun = $_POST['FIOOpekun'];
		$OPensioner = isset($_POST['OPensioner']) ? 'checked' : '';
		$ORabota = isset($_POST['ORabota']) ? 'checked' : '';
		$OMestoR = $_POST['OMestoR'];
		$OPhoner = $_POST['OPhoner'];
		$OAdres = $_POST['OAdres'];	
		$result = mysqli_query($load, "UPDATE $name SET FirstName='$FirstName', LastName='$LastName', Otchestvo='$Otchestvo', NumberGroup='$NumberGroup'
			, Specialnost='$Specialnost', BirthDate='$BirthDate', Phone='$Phone', Propiska='$Propiska', Obshaga='$Obshaga', Progivaet='$Progivaet'
			, GroupHealth='$GroupHealth', Invalidnost='$Invalidnost', KDN='$KDN', Class='$Class', SrBallAt='$SrBallAt', Rabota='$Rabota'
			, Hobbi='$Hobbi', Family='$Family', Obespechenie='$Obespechenie', Maloobespech='$Maloobespech', Mnogodet='$Mnogodet', Socialrisk='$Socialrisk', FIOFather='$FIOFather', FPensioner='$FPensioner', FRabota='$FRabota'
			, FMestoR='$FMestoR', FPhoner='$FPhoner', FAdres='$FAdres', FIOMother='$FIOMother', MPensioner='$MPensioner', MRabota='$MRabota'
			, MMestoR='$MMestoR', MPhoner='$MPhoner', MAdres='$MAdres', FIOOpekun='$FIOOpekun', OPensioner='$OPensioner', ORabota='$ORabota'
			, OMestoR='$OMestoR', OPhoner='$OPhoner', OAdres='$OAdres' WHERE id='$id'");
	}	
	$table = $_SESSION['Table'];
	$id = $_POST["stud_save"];
	edit($table,$id);
}


//Просмотр студента
if(isset($_POST["view_stud"])){
		$table = $_SESSION['Table'];
		$id = $_POST["view_stud"];
		$group = $_SESSION['Table'];
		$result = mysqli_query($load, "SELECT * FROM $group WHERE id=$id");
		$row = mysqli_fetch_array($result);
?>
<form name="forma" action="doc2.php?doc_id=<?php echo $id; ?>" method="post">
		<div class="block block_view">
			<h2 class="block__title">Студент</h2>

			<div class="field-wrap">
				<label class="block__label" for="FirstName">Имя</label>
				<?php echo $row["FirstName"]; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="LastName">Фамилия</label>
				<?php echo $row['LastName']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Otchestvo">Отчество</label>
				<?php echo $row['Otchestvo']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="NumberGroup">Номер группы</label>
				<?php echo $row['NumberGroup']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Specialnost">Специальность</label> 
				<?php echo $row['Specialnost']; ?>
			</div>
			
			<div class="field-wrap">
				<label class="block__label" for="BirthDate">Дата рождения</label>
				<?php echo $row['BirthDate']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Phone">Номер телефона</label>
				<?php echo $row['Phone']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Propiska">Адрес прописки</label>
				<?php echo $row['Propiska']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Progivaet">Адрес проживания</label>
				<?php echo $row['Progivaet']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="GroupHealth">Группа здоровья</label> 
				<?php echo $row['GroupHealth']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Class">Образование (9/11)</label>
				<?php echo $row['Class']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="SrBallAt">Средний балл аттестата</label>
				<?php echo $row['SrBallAt']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Rabota">Подработка</label>
				<?php echo $row['Rabota']; ?>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Hobbi">Кружки, секции</label>
				<?php echo $row['Hobbi']; ?>
			</div>

			<div class="field-wrap">				
				<input class="block__field" type="checkbox" <?php echo $row['Obshaga']; ?> disabled>
				<label class="block__label label_inline" for="Obshaga"><span></span>Проживание в общежитии</label>
			</div>

			<div class="field-wrap">				
				<input class="block__field" type="checkbox" <?php echo $row['Invalidnost']; ?> disabled>
				<label class="block__label label_inline" for="Invalidnost"><span></span>Студент с ОВЗ</label>
			</div>		

			<div class="field-wrap">				
				<input class="block__field" type="checkbox" <?php echo $row['KDN']; ?> disabled>
				<label class="block__label label_inline" for="KDN"><span></span>Состоящий на учете в КДН</label>
			</div>				

		</div>

	<!--Семья-->
	<div class="block block_view">	
		<h2 class="block__title">Семья</h2>
		<div class="field-wrap">
			<label class="block__label" for="">Семья</label>
			<?php echo $row['Family']?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Обеспечение</label>
			<?php echo $row['Obespechenie']?>
		</div>

		<h3 class="block__subtitle">Отец</h3>
		<div class="field-wrap">
			<label class="block__label" for="">ФИО отца</label>
			<?php echo $row['FIOFather']; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Место работы</label>
			<?php echo $row['FMestoR']; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Номер телефона</label>
			<?php echo $row['FPhoner']; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Адрес проживания</label>
			<?php echo $row['FAdres']; ?>
		</div>

		<div class="field-wrap">
			<input class="block__field" type="checkbox" <?php echo $row['FPensioner']; ?> disabled>
			<label class="block__label" for="FPensioner"><span></span>Пенсионер</label>
		</div>
		<div class="field-wrap">
			<input class="block__field" type="checkbox" <?php echo $row['FRabota']; ?> disabled>
			<label class="block__label" for="FRabota"><span></span>Работа</label>
		</div>

		<h3 class="block__subtitle">Мать</h3>
		<div class="field-wrap">
			<label class="block__label" for="FIOMother">ФИО матери</label>
			<?php echo $row['FIOMother']; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="MMestoR">Место работы</label>
			<?php echo $row['MMestoR']; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="MPhoner">Номер телефона</label>
			<?php echo $row['MPhoner']; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="MAdres">Адрес проживания</label>
			<?php echo $row['MAdres']; ?>
		</div>

		<div class="field-wrap">
			<input type="checkbox" <?php echo $row['MPensioner']; ?> disabled>
			<label class="block__label" for="MPensioner"><span></span>Пенсионер</label>
		</div>
		<div class="field-wrap">
			<input type="checkbox" <?php echo $row['MRabota']; ?> disabled>
			<label class="block__label" for="MRabota"><span></span>Работа</label>
		</div>


		<h3 class="block__subtitle">Опекун</h3>
		<div class="field-wrap">
			<label class="block__label" for="FIOOpekun">ФИО опекуна</label>
			<?php echo $row['FIOOpekun']; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="OMestoR">Место работы</label>
			<?php echo $row['OMestoR']; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="OPhoner">Номер телефона</label>
			<?php echo $row['OPhoner']; ?>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="OAdres">Адрес проживания</label>
			<?php echo $row['OAdres']; ?>
		</div>

		<div class="field-wrap">
			<input type="checkbox" <?php echo $row['OPensioner']; ?> disabled>
			<label class="block__label" for="OPensioner"><span></span>Пенсионер</label>			
		</div>

		<div class="field-wrap">
			<input type="checkbox" <?php echo $row['ORabota']; ?> disabled>
			<label class="block__label" for="ORabota"><span></span>Работа</label>	
		</div>				

		<div class="field-wrap">
			<input type="checkbox" <?php echo $row['Maloobespech']; ?> disabled>
			<label class="block__label" for="Maloobespech"><span></span>Малообеспеченные</label>
		</div>

		<div class="field-wrap">
			<input type="checkbox" <?php echo $row['Mnogodet']; ?> disabled>
			<label class="block__label" for="Mnogodet"><span></span>Многодетные</label>
		</div>

		<div class="field-wrap">
			<input type="checkbox" <?php echo $row['Socialrisk']; ?> disabled>
			<label class="block__label" for="Socialrisk"><span></span>Семья социального риска</label>
		</div>

		<input class="block__btn" type="submit" name="doc" value="Скачать">
	</div>
</form>
<?php
}

	//Сортировка по общаге и ОВЗ
if(isset($_POST["sel_id"])){
	$group = $_SESSION["Table"];
	$result = mysqli_query($load, "SELECT * FROM $group");
	$id = $_POST["sel_id"];
	$result = mysqli_query($load, "SELECT * FROM $group where $id='checked'");
?>
	<table class="table">		
		<tr>
			<th>№</th>
			<th>
				<?php 
					echo '<a href="?sort_id=LastName">Фамилия</a>';
				?>
			</th>
			<th>
				<?php 
					echo '<a href="?sort_id=FirstName">Имя</a>';
				?>
			</th>
			<th>
				<?php 
					echo '<a href="?sort_id=Otchestvo">Отчество</a>';
				?>
			</th>
			<th>
				<?php 
					echo '<a href="?sort_id=BirthDate">Дата рождения</a>';
				?>
			</th>
			<th>
				<?php 
					echo '<a href="?sort_id=Obshaga">Общежитие</a>';
				?>
			</th>
			<th>
				<?php 
					echo '<a href="?sort_id=Progivaet">Адрес проживания</a>';
				?>
			</th>
			<th>
				<?php 
					echo '<a href="?sort_id=Phone">Телефон</a>';
				?>
			</th>
		</tr>
<?php
		echo"<tr>";
		$i=1;
		while ($row = mysqli_fetch_array($result)){
			$h=$row['id'];
			echo 
			'<td>'.$i."</td>
			<td>".$row['LastName'].'</td> 
			<td>'.$row['FirstName'].'</td>
			<td>'.$row['Otchestvo'].'</td>
			<td>'.$row['BirthDate'].'</td>';
			if ($row['Obshaga']=='checked'){
				echo '<td>Проживает</td>';
			} else{
				echo '<td>Не проживает</td>';
			};
?>
			<td><?php echo $row['Progivaet']; ?></td>
			<td><?php echo $row['Phone']; ?></td>
			<td><a class="view_stud" data-view_stud="<?php echo $row["id"]; ?>">Просмотр</a></td>
			<td><a class="edit_stud" data-edit_stud="<?php echo $row["id"]; ?>">Редактировать</a></td>
			<td><a class="del_stud" data-del_stud="<?php echo $row["id"]; ?>">Удалить</a></td></tr>
<?php
			$i++;
		}		
?>
	</table>

<?php
}

if(isset($_POST["year"])){
	function create_bd($name){
		$load = mysqli_connect("localhost","root", "", "lich") or die("Ошибка подключения к БД!");	
		mysqli_query($load, "CREATE TABLE $name	(
		id int auto_increment primary key,
		FirstName VARCHAR(40),
		LastName VARCHAR(40),
		Otchestvo VARCHAR(40),
		NumberGroup VARCHAR(3),
		Specialnost VARCHAR(40),
		BirthDate VARCHAR(40),
		Phone VARCHAR(12),
		Propiska VARCHAR(40),
		Obshaga VARCHAR(10),
		Progivaet VARCHAR(50),
		GroupHealth VARCHAR(30),
		Invalidnost VARCHAR(10),
		KDN VARCHAR(10),
		Class VARCHAR(10),
		SrBallAt VARCHAR(5),
		Rabota VARCHAR(50),
		Hobbi VARCHAR(50),
		Family VARCHAR(50),
		Obespechenie VARCHAR(50),
		Maloobespech VARCHAR(50),
		Mnogodet VARCHAR(50),
		Socialrisk VARCHAR(50),
		FIOFather VARCHAR(50),
		FPensioner VARCHAR(10),
		FRabota VARCHAR(10),
		FMestoR VARCHAR(50),
		FPhoner VARCHAR(12),
		FAdres VARCHAR(50),
		FIOMother VARCHAR(50),
		MPensioner VARCHAR(10),
		MRabota VARCHAR(10),
		MMestoR VARCHAR(50),
		MPhoner VARCHAR(12),
		MAdres VARCHAR(50),
		FIOOpekun VARCHAR(50),
		OPensioner VARCHAR(10),
		ORabota VARCHAR(10),
		OMestoR VARCHAR(50),
		OPhoner VARCHAR(12),
		OAdres VARCHAR(50))") Or die("Произошла ошибка!"); //Создание таблиц и разделов
	}
	$groups = $_POST['number'].'_'.$_POST['year'];	
	$login = $_POST["login"];
	$pass = $_POST["pass"];
	$priv = $_POST["priv"];
	$group = $_POST["number"];
	$year = $_POST["year"];
	$pass = md5($pass);
	$result = mysqli_query($load, "INSERT INTO users (user, pass, priv, grup, year)
	VALUES ('$login', '$pass', '$priv', '$group', '$year')");
	$ob = $group.'_'.$year;
	$result = mysqli_query($load, "INSERT INTO config (groups, years, obshee)
	VALUES ('$group', '$year', '$ob')");
	create_bd($groups);
	echo "Пользователь успешно добавлен!";
}
?>