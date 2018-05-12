<?php
	include("bd.php");

	//Для вывода всех студентов без фильтров (кроме поиска)
	if(isset($_POST["full"])){
		//Если есть значение в поиске
		if($_POST["search"] != "0") $val = $_POST["search"]."%";
		else $val = "%";
		
		if(isset($_COOKIE["admin"])) $query = mysqli_query($load, "SELECT * FROM students WHERE lastname LIKE '$val' ORDER BY lastname ASC");
		else if(isset($_COOKIE["group"])) {
			$group = $_COOKIE["group"];
			$query = mysqli_query($load, "SELECT * FROM students WHERE group_num='$group' AND lastname LIKE '$val' ORDER BY lastname ASC");
		}
	}
	else {
		$val = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["value"]))));
		//Если установлен фильтр
		if($_POST["filter"] != "0"){
			$filter = $_POST["filter"];
			$query = mysqli_query($load, "SELECT * FROM students WHERE lastname LIKE '$val%' AND $filter = '1' ORDER BY lastname ASC");
		}
		else $query = mysqli_query($load, "SELECT * FROM students WHERE lastname LIKE '$val%' ORDER BY lastname ASC");
	}
	
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
<?php
	$i++;
	}
	mysqli_close($load);
?>