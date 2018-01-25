<?PHP
include ('header.php');
$group = $_SESSION['Table'];
$id = $_GET['doc_id'];
$st='LastName';
$result = mysqli_query($load, "SELECT * FROM $group order by $st");
header('Content-type: application/vnd.ms-word');
header('Content-Disposition: attachment;Filename=' . 'Список '.$_SESSION['kurs'].' группы.doc');
header("Content-Transfer-Encoding: binary");
echo '<html><body>';
?>

<table  align="center" border="1">
		<caption>Таблица  студентов <? echo $_SESSION['kurs'] ?> группы</caption>
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
	$i=1;
		while ($row = mysqli_fetch_array($result)){
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
			echo
			'<td>'.$row['Progivaet'].'</td>
			<td>'.$row['Phone'].'</td></tr>';
			$i++;
		}		
		

echo '</table></body>';
echo '</html>';
?>