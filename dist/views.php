<?php
	include ('header.php');
	if (!(isset($_SESSION['login']))){
		echo "Пожалуйста, войдите в учетную запись!";
	} elseif ($_SESSION['priv']== "admin") {
		echo "Вы админ!";
	} else { 
		$table = $_SESSION['Table'];
		$id = $_GET['red_id'];
		$group = $_SESSION['Table'];
		$id = $_GET['vie_id'];
		$result = mysql_query("SELECT * FROM $group WHERE id=$id");
		$row = mysql_fetch_array($result);
?>
<form name="forma" action="doc2.php?doc_id=<?php echo $id ?>" method="post">
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
?>