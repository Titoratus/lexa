<?php
	$page = "Студенты";
	include("header.php");
	if(!isset($_COOKIE["curator"]) && !isset($_COOKIE["admin"])) die("Пожалуйста, войдите в учётную запись!");

		//Админка
	if(isset($_COOKIE["admin"])) {
		$query = mysqli_query($load, "SELECT * FROM students ORDER BY lastname ASC");
?>
	  <h1 class="table__cap">Таблица всех студентов <div class="load_student">Скачать</div></h1>
<?php } else {
		$group = $_COOKIE["group"];
		$query = mysqli_query($load, "SELECT * FROM students WHERE group_num = '$group' ORDER BY lastname ASC");
?>
		<h1 class="table__cap">Таблица студентов <?php echo $group; ?> группы <div class="load_student">Скачать</div></h1>
<?php } ?>
	<input type="text" placeholder="Поиск по фамилии..." maxlength="15" class="search_stud">
	<input type="radio" data-filter="dormitory" class="hidden filter" id="filter_dorm" name="selection">
	<label data-sort="dormitory" class="filter_title" for="filter_dorm">Проживание в общежитии</label>
	<input type="radio" data-filter="disability" class="hidden filter" id="ovz" name="selection">
	<label data-sort="disability" class="filter_title" for="ovz"><span></span>Студенты с ОВЗ</label>

	<table class="table">		
		<tr>
			<th>№</th>
			<th><a class="sort_table" data-sort="lastname">Фамилия</a></th>
			<th><a class="sort_table" data-sort="name">Имя</a></th>
			<th><a class="sort_table" data-sort="father">Отчество</a></th>
			<th><a class="sort_table" data-sort="birthdate">Дата рождения</a></th>
			<th><a class="sort_table" data-sort="dormitory">Общежитие</a></th>
			<th><a class="sort_table" data-sort="registration">Адрес проживания</a></th>
			<th><a class="sort_table" data-sort="phone">Телефон</a></th>
			<?php if(isset($_COOKIE["admin"])) { ?>
				<th><a>Группа</a></th>
			<?php } ?>	
		</tr>
<?php
	//Вывод ВСЕХ студентов в админке
	$i = 1;
	while($stud = mysqli_fetch_array($query)){
?>
	<tr>
		<?php
				$h = $stud["id"];
		?>

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
		<td><a class="view_stud" data-view_stud="<?php echo $stud["id"]; ?>"></a></td>
		<td><a class="edit_stud" data-edit_stud="<?php echo $stud["id"]; ?>"></a></td>
		<td><a class="del_stud" data-del_stud="<?php echo $stud["id"]; ?>"></a></td>
		
	</tr>
  <?php $i++; ?>
<?php
	}
?>
</table>
<?php include("footer.php"); ?>