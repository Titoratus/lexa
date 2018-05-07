<?php
	$page = "Студенты";
	include('header.php');
	if(!isset($_SESSION['login'])){
		echo "Пожалуйста, войдите в учётную запись!";

		//Админка
	} else if($_SESSION['priv'] == "admin") {

	$query = mysqli_query($load, "SELECT grup, year FROM users");
?>
	<input type='radio' class="hidden radio_sort" id="dormitory" name='selection'>
	<label data-sort="Obshaga" class="radio" for="dormitory">Проживание в общежитии</label>
	<input type='radio' class="hidden radio_sort" id="ovz" name='selection'>
	<label data-sort="Invalidnost" class="radio" for="ovz">Студенты с ОВЗ</label>

	<table class="table">		
		<tr>
			<th>№</th>
			<th><a href="?sort_id=LastName">Фамилия</a></th>
			<th><a href="?sort_id=FirstName">Имя</a></th>
			<th><a href="?sort_id=Otchestvo">Отчество</a></th>
			<th><a href="?sort_id=BirthDate">Дата рождения</a></th>
			<th><a href="?sort_id=Obshaga">Общежитие</a></th>
			<th><a href="?sort_id=Progivaet">Адрес проживания</a></th>
			<th><a href="?sort_id=Phone">Телефон</a></th>
			<th><a>Группа</a></th>			
		</tr>
<?php
	//Вывод ВСЕХ студентов в админке
	while($grup = mysqli_fetch_array($query)){
		$i = 1;
?>
	<tr>
		<?php
			$groups = $grup["grup"]."_".$grup["year"];
			$onlyGroup = $grup["grup"];
			$result = mysqli_query($load, "SELECT * FROM $groups");
			//Пропускаем админа
			if(mysqli_num_rows($result) == 0) continue;

			while($row = mysqli_fetch_array($result)){
				$h = $row["id"];
		?>

		<td><?php echo $i; ?></td>
		<td><?php echo $row['LastName']; ?></td> 
		<td><?php echo $row['FirstName']; ?></td>
		<td><?php echo $row['Otchestvo']; ?></td>
		<td><?php echo $row['BirthDate']; ?></td>

		<?php
			if($row["Obshaga"] == "checked") echo "<td>Проживает</td>";
			else echo "<td>Не проживает</td>";
		?>

		<td><?php echo $row["Progivaet"]; ?></td>
		<td><?php echo $row["Phone"]; ?></td>
		<td><?php echo $onlyGroup; ?></td>
		<td><a class="view_stud" data-view_stud="<?php echo $row["id"]; ?>">Просмотр</a></td>
		<td><a class="edit_stud" data-edit_stud="<?php echo $row["id"]; ?>">Редактировать</a></td>
		<td><a class="del_stud" data-del_stud="<?php echo $row["id"]; ?>">Удалить</a></td>
		
	</tr>
  <?php $i++; } ?>
<?php
	}
?>
</table>
<?php
} else { 
	$group = $_SESSION['Table'];
	$result = mysqli_query($load, "SELECT * FROM $group");
	if(isset($_GET['sort_id'])){
		$st = $_GET['sort_id'];
		echo "Отсортировано по '$st'";
		$result = mysqli_query($load, "SELECT * FROM $group order by $st");
	}
	?>
	<h1 class="table__cap">Таблица  студентов <? echo $_SESSION['kurs'] ?> группы <div class="load_student">Скачать</div></h1>
	<input type='radio' class="hidden radio_sort" id="dormitory" name='selection'>
	<label data-sort="Obshaga" class="radio" for="dormitory">Проживание в общежитии</label>
	<input type='radio' class="hidden radio_sort" id="ovz" name='selection'>
	<label data-sort="Invalidnost" class="radio" for="ovz">Студенты с ОВЗ</label>
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
		while($row = mysqli_fetch_array($result)){
			$h=$row['id'];
			echo 
			'<td>'.$i."</td>
			<td>".$row['LastName'].'</td> 
			<td>'.$row['FirstName'].'</td>
			<td>'.$row['Otchestvo'].'</td>
			<td>'.$row['BirthDate'].'</td>';
			if ($row['Obshaga']=='checked'){
				echo '<td>Проживает</td>';
			} else {
				echo '<td>Не проживает</td>';
			}
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

include("footer.php");
?>

