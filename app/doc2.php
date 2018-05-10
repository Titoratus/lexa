<?php
	include("bd.php");
	$id = $_GET["doc_id"];
	$result = mysqli_query($load, "SELECT * FROM students WHERE id = '$id'");
	$row = mysqli_fetch_array($result);

	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=".$row["lastname"]." ".$row["name"].".doc");
	header("Content-Transfer-Encoding: binary");
?>
<html>
<body>
	<h2>Личное дело студента <?php echo $row["group_num"]; ?> группы</h2>
	<p>Фамилия: <?php echo $row["lastname"]; ?></p>
	<p>Имя: <?php echo $row["name"]; ?></p>
	<p>Отчество: <?php echo $row["father"]; ?></p>
	<p>Номер группы: <?php echo $row["group_num"]; ?></p>
	<p>Специальность: <?php echo $row["speciality"]; ?></p>
	<p>Дата рождения: <?php echo $row["birthdate"]; ?></p>
	<p>Номер телефона: <?php echo $row["phone"]; ?></p>
	<p>Адрес прописки: <?php echo $row["registration"]; ?></p>
	<p>Проживание в общежитие:
	<?php
		if($row["dormitory"] == "1") echo "+";
		else echo "-";
	?>	
	</p>
	<p>Адрес проживания: <?php echo $row["residence"]; ?></p>
	<p>Группа здоровья: <?php echo $row["grouphealth"]; ?></p>
	<p>ОВЗ:
	<?php
		if($row["disability"] == "1") echo "+";
		else echo "-";
	?>
	</p>

	<p>Студент стоящий на учете в КДН:
	<?php
		if($row["kdn"] == "1") echo "+";
		else echo "-";
	?>
	</p>
	<p>Образование: <?php echo $row["class"]; ?></p>
	<p>Средний балл аттестата: <?php echo $row["midmark"]; ?></p>
	<p>Работа: <?php echo $row["work"]; ?></p>
	<p>Увлечения: <?php echo $row["hobby"]; ?></p>

	<h3>Семья</h3>

	<p>Семья: <?php echo $row["family"]; ?></p>
	<p>Обеспечение (если сирота): <?php echo $row["security"]; ?></p>
	<p>Малообеспеченная семья;
	<?php 
		if($row["lowincome"] == "1") echo "+";
		else echo "-";
	?>
	</p>
	<p>Многодентная семья:
		<?php
	if($row["children"] == "1") echo "+";
	else echo "-";
		?>
	</p>
	<p>Семья социального риска:
	<?php
	if($row["socialrisk"] == "1") echo "+";
	else echo "-";
		?>
	</p>

	<h4>Отец</h4>

	<p>ФИО отца: <?php echo $row["father_name"]; ?></p>
	<p>Пенсионер:
		<?php
	if($row["f_pensioner"] == "1") echo "+";
	else echo "-";
		?>
	</p>
	<p>Работает:
	<?php
	if($row["f_work"] == "1") echo "+";
	else echo "-";
		?>
	</p>
	<p>Место работа (если работает): <?php echo $row["f_workplace"]; ?></p>
	<p>Номер телефона: <?php echo $row["f_phone"]; ?></p>
	<p>Адрес проживания: <?php echo $row["f_address"]; ?></p>

	<h4>Мать</h4>

	<p>ФИО матери: <?php echo $row["mother_name"]; ?></p>
	<p>Пенсионер:
	<?php
		if($row["m_pensioner"] == "1") echo "+";
	  else echo "-";
  ?>
	</p>
	<p>Работает:
	<?php
		if($row["m_work"] == "1") echo "+";
	  else echo "-";
  ?>
	</p>
	<p>Место работа (если работает): <?php echo $row["m_workplace"]; ?></p>
	<p>Номер телефона: <?php echo $row["m_phone"]; ?></p>
	<p>Адрес проживания: <?php echo $row["m_address"]; ?></p>

	<h4>Опекун</h4>

	<p>ФИО матери: <?php echo $row["guardian_name"]; ?></p>
	<p>Пенсионер:
	<?php
		if($row["g_pensioner"] == "1") echo "+";
		else echo "-";
	?>
	</p>
	<p>Работает:
	<?php
		if($row["g_work"] == "1") echo "+";
		else echo "-";
	?>
	</p>
	<p>Место работа (если работает): <?php echo $row["g_workplace"]; ?></p>
	<p>Номер телефона: <?php echo $row["g_phone"]; ?></p>
	<p>Адрес проживания: <?php echo $row["g_address"]; ?></p>
</body>
</html>