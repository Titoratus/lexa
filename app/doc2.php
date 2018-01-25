<?PHP
include ('header.php');
$group = $_SESSION['Table'];
$id = $_GET['doc_id'];
$result = mysqli_query($load, "SELECT * FROM $group WHERE id=$id");
$row = mysqli_fetch_array($result);
header('Content-type: application/vnd.ms-word');
header('Content-Disposition: attachment;Filename=' .  $row['LastName'].' '.$row['FirstName'] . '.doc');
header("Content-Transfer-Encoding: binary");
echo '<html><body> <h2>Личное дело студента '.$_SESSION['kurs'].' группы</h2>';
echo 'Фамилия:<b> ' . $row['LastName'].'</b><br>';
echo 'Имя:<b> ' . $row['FirstName'].'</b><br>';
echo 'Отчество:<b> ' . $row['Otchestvo'].'</b><br>';
echo '<br>';
echo 'Номер группы:<b> ' . $row['NumberGroup'].'</b><br>';
echo 'Специальность:<b> ' . $row['Specialnost'].'</b><br>';
echo 'Дата рождения:<b> ' . $row['BirthDate'].'</b><br>';
echo 'Номер телефона:<b> ' . $row['Phone'].'</b><br>';
echo 'Адрес прописки:<b> ' . $row['Propiska'].'</b><br>';
echo 'Проживание в общежитие:<b> ';
if ($row['Obshaga']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Адрес проживания:<b> ' . $row['Progivaet'].'</b><br>';
echo 'Группа здоровья:<b> ' . $row['GroupHealth'].'</b><br>';
echo 'ОВЗ: <b>';
if ($row['Invalidnost']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Студент стоящий на учете в КДН:<b> ';
if ($row['KDN']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Образование:<b> ' . $row['Class'].'</b><br>';
echo 'Средний балл аттестата:<b> ' . $row['SrBallAt'].'</b><br>';
echo 'Работа:<b> ' . $row['Rabota'].'</b><br>';
echo 'Увлечения:<b> ' . $row['Hobbi'].'</b><br>';

echo '<h3>Семья</h3>';

echo 'Семья:<b> ' . $row['Family'].'</b><br>';
echo 'Обеспечение (если сирота):<b> ' . $row['Obespechenie'].'</b><br>';
echo 'Малообеспеченная семья:<b> ';
if ($row['Maloobespech']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Многодентная семья:<b> ';
if ($row['Mnogodet']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Семься социального риска:<b> ';
if ($row['Mnogodet']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}

echo '<h4>Отец</h4>';

echo 'ФИО отца:<b> ' . $row['FIOFather'].'</b><br>';
echo 'Пенсионер:<b> ';
if ($row['FPensioner']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Работает:<b> ';
if ($row['FRabota']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Место работа (если работает):<b> ' . $row['FMestoR'].'</b><br>';
echo 'Номер телефона:<b> ' . $row['FPhoner'].'</b><br>';
echo 'Адрес проживания:<b> ' . $row['FAdres'].'</b><br>';

echo '<h4>Мать</h4>';

echo 'ФИО матери:<b> ' . $row['FIOMother'].'</b><br>';
echo 'Пенсионер:<b> ';
if ($row['MPensioner']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Работает:<b> ';
if ($row['MRabota']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Место работа (если работает):<b> ' . $row['MMestoR'].'</b><br>';
echo 'Номер телефона:<b> ' . $row['MPhoner'].'</b><br>';
echo 'Адрес проживания:<b> ' . $row['MAdres'].'</b><br>';

echo '<h4>Опекун</h4>';

echo 'ФИО матери:<b> ' . $row['FIOOpekun'].'</b><br>';
echo 'Пенсионер:<b> ';
if ($row['OPensioner']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Работает:<b> ';
if ($row['ORabota']=="checked"){
	echo '+ </b><br>';
} else {
	echo '- </b><br>';
}
echo 'Место работа (если работает):<b> ' . $row['OMestoR'].'</b><br>';
echo 'Номер телефона:<b> ' . $row['OPhoner'].'</b><br>';
echo 'Адрес проживания:<b> ' . $row['OAdres'].'</b><br>';
echo '</body>';
echo '</html>';
?>