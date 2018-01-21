<?php
	$page = "Студенты";
	include ('header.php');
	if (!isset($_SESSION['login'])){
		echo "Пожалуйста, войдите в учетную запись!";
	} elseif ($_SESSION['priv']== "admin") {
		echo "Вы админ!";
		
	} else { 
		$group = $_SESSION['Table'];
		$result = mysql_query("SELECT * FROM $group");
		if (isset($_GET['sort_id'])) {
			$st = $_GET['sort_id'];
			echo "Отсортировано по '$st'";
			$result = mysql_query("SELECT * FROM $group order by $st");
		}
?>
<form action='' method='POST'>
	<table class="table">
		<caption class="table__cap">Таблица  студентов <? echo $_SESSION['kurs'] ?> группы <div class="load_student">Скачать</div></caption>
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
		while ($row = mysql_fetch_array($result)){
			$h=$row['id'];
			echo 
			'<td><b>'.$i."</b></td>
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
</form>
<form method='post'>
	<?php
		if (isset($_POST['testing'])){
			header("Location: /viborka.php".$_POST['viborka']);
		}
	?>
	Проживание в общежитие: <input type='radio' value='?viborka_id=Obshaga' name='viborka' checked><br>
	Студенты с ОВЗ:<input type='radio' value='?viborka_id=Invalidnost' name='viborka'><br>
	<input type='submit' name='testing'>
</form>
<?php
	}

	include("footer.php");
?>

