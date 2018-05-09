<?php
	include("bd.php");

	if(isset($_COOKIE["admin"])) $result = mysqli_query($load, "SELECT * FROM students ORDER BY lastname");
	else {
		$group = $_COOKIE["group"];
		$result = mysqli_query($load, "SELECT * FROM students WHERE group_num = '$group' ORDER BY lastname");
	}

	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=" . "Список ".$_COOKIE["group"]." группы.doc");
	header("Content-Transfer-Encoding: binary");
	?>
<html>
<body>
	<table class="table">
		<?php if(isset($_COOKIE["admin"])){ ?>
		<caption>Таблица всех студентов</caption>
		<?php } else { ?>
		<caption>Таблица студентов <?php echo $_COOKIE["group"]; ?> группы</caption>
		<?php } ?>
		<tr>
			<th>№</th>
			<th>Фамилия</th>
			<th>Имя</th>
			<th>Отчество</th>
			<th>Дата рождения</th>
			<th>Общежитие</th>
			<th>Адрес</th>
			<th>Телефон</th>
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
		</tr>
<?php
			$i++;
		}		
?>
	</table>
</body>
</html>