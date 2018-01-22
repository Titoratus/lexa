<?php
	include ('header.php');
	if (!isset($_SESSION['login'])){
		echo "Пожалуйста, войдите в учетную запись!";
	} elseif ($_SESSION['priv']== "admin") {
		echo "Вы админ!";
	} else { 
		$group = $_SESSION['Table'];
		$result = mysql_query("SELECT * FROM $group");
		$id = $_GET['viborka_id'];
		if (isset($_GET['viborka_id'])) {
			echo $id;
			$result = mysql_query("SELECT * FROM $group where $id='checked'");
		}
		if (isset($_GET['sort_id'])) {
			$st = $_GET['sort_id'];
			echo "Отсортировано по '$st'";
			$result = mysql_query("SELECT * FROM $group order by $st");
		}
?>
<form action='' method='post'>
	<table class="table">
		<caption>Таблица  студентов <? echo $_SESSION['kurs'] ?> группы</caption>
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
			<td>'.$row['Phone'].'</td>
			<td><a href="views.php?vie_id='.$row['id'].'">Просмотр</a></td></tr>';
			$i++;
		}		
?>
	</table>
</form>
<?php
	}
?>