<?php
	// $host_bd = 'localhost'; //Хост
	// $user_bd = 'root'; //Имя пользователя (логин)
	// $pass_bd = ''; //Пароль пользователя
	// $name_bd = 'lich_bd'; //Имя базы данных
	// $name_tb = 'users'; //Имя таблицы
	// mysql_connect($host_bd, $user_bd, $pass_bd) or die(mysql_error()); //Создание подключения к БД
	// mysql_query ("CREATE DATABASE $name_bd "); //Создание БД
	// mysql_select_db($name_bd) or die(mysql_error()); //Выбор БД
	// mysql_query("CREATE TABLE $name_tb	(
		// id int auto_increment primary key,
		// user VARCHAR(40),
		// pass VARCHAR(40),
		// priv VARCHAR(40),
		// grup VARCHAR(30),
		// year VARCHAR(40)) ")
		// Or die(mysql_error()); //Создание таблиц и разделов
	// $pw = md5('admin');
	// $result = mysql_query("INSERT INTO $name_tb (user, pass, priv, grup) 
	// VALUES ('admin', '$pw', 'admin', '666')");
	// if($result == 'true') {
		// echo "БД успешно установлена!<br> User: <b>Admin</b><br> Password: <b>admin</b>";
	// } else {
		// echo "Не удалость установить БД";
	// }

header('Content-Type: text/html; charset=utf-8');
if($_POST['button'] == "Создать")
{
    // Подключаемся к серверу, 
	$db_host = htmlspecialchars($_POST['name_server']); 
	// пользователь базы данных MySQL 
	$db_user = htmlspecialchars($_POST['login']);
	// пароль для доступа к серверу MySQL
	$db_pass = htmlspecialchars($_POST['db_pass']);
	// название создаваемой базы данных
	$db_name = htmlspecialchars($_POST['name_db']); 
	
	$kolvo_soxr2=$_POST['kolvo_soxr2'];
	}
if ($_POST['default']==true){
	$connect = mysql_connect('localhost','root','') or die("Ошибка соединения с сервером");
	$query = "CREATE DATABASE IF NOT EXISTS lich_bd";
	$result = mysql_query ($query) or die ("Ошибка создания БД");
	$db = mysql_select_db("lich_bd",$connect)  or die ("База данных не выбрана");
	$db_host='localhost';
	$db_user='root';
	$db_pass='';
	$db_name='lich_bd';
	$kolvo_soxr2=4;
}

if($_POST['button'] == true or $_POST['default']==true){
    if(!empty($db_host) && !empty($db_user) && !empty($db_name)){
		if(@!mysql_connect("$db_host", "$db_user", "$db_pass")){
			echo "<strong>Невозможно подключение к серверу.</strong><br> <br>
                   <p align=left><b> Возможные причины:</b><br>
					1. Не правильно введён пароль. (по умолчанию пороль отсутствует)<br>
                    2. Имя сервера введено не верно.<br>
                    3. Логин доступа к серверу базы данных MySQL не идентифицирован.</p>";
		}
		$r = mysql_query("CREATE DATABASE IF NOT EXISTS $db_name");
		if(!$r){
			echo "<strong>Невозможно создать базу данных.</strong><br> <br>
                   <p align=left><b> Возможные причины:</b><br>
					База данных уже существует, создана ранее.</p>";
		}

		if (!mysql_select_db($db_name)){
			echo mysql_error();
		}
		mysql_query('SET NAMES utf-8;');
		
// Создаём конфигурационный файл		
$data = "<?
\$db_host = '".$db_host."'; //имя MySQL-сервера
\$db_user = '".$db_user."'; // имя пользователя
\$db_pass = '".$db_pass."'; // пароль
\$db_name = '".$db_name."'; // имя БАЗЫ
\$kolvo_soxr = '".$kolvo_soxr2."'; //Количество сохранений БД
// устанавливаем соединение с БД
mysql_connect(\$db_host,\$db_user,\$db_pass) or die('Отсутствует подключение к MySQL-серверу.<br />'.mysql_error());
mysql_select_db(\$db_name) or die('Ne podkluchaetsa k .'.\$db_name .'<br />'.mysql_error().'<br><a href=\"install.php\">install</a>');
mysql_query(\"set character_set_client='utf8'\");
mysql_query(\"set character_set_results='utf8'\");
mysql_query(\"set collation_connection='utf8_unicode_ci'\");

function zapros(\$select) {
 \$result = mysql_query(\$select);
 \$row = mysql_fetch_array(\$result);
 return(\$row[0]);
}
\$dni_arr=array(\"\",\"Понедельник\",\"Вторник\",\"Среда\",\"Четверг\",\"Пятница\",\"Суббота\");
?>";
		$hd = fopen('config.php',"w");
		$e = fwrite($hd, $data);
		if($e == -1){
		   echo "Ошибка. Конфигурационный файл не создан.";	
		}
		$echo="<center><div>База данных<b> \"$db_name\" </b>успешно создана.<br>
        <a href='index.php'>Далее</a></div></center>";

mysql_query ("SET NAMES utf8;");

mysql_query (" CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priv` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `grup` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

");
$pw = md5('admin');
mysql_query (" INSERT INTO `users` (`user`, `pass`, `priv`) VALUES
('admin', '$pw', 'admin');");

mysql_query ("SET FOREIGN_KEY_CHECKS=1;");
mysql_query ("COMMIT;");
//mysql_close($connect);

//$rus=iconv('utf-8', 'cp1251', 'Удалите эту папку, если всё нормально установилось');
//mkdir($rus, 0777); 
//copy("install.php", $rus.'/install.php');
//unlink("install.php");
//rename('instal.php','333.php');
	}
	else{
		$oshibka='<center>Не все поля заполнены.</center>';
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Установка</title>
</head>

<body>

<form method="post" action="install.php">
  <div class="centers">
    <!--<p align="left">Поля отмеченные звёздочкой (<span class='red'></span>), обязательны к заполнению.</p>--><br>
    <br>
     <table align="center" width="483" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td colspan="2" align="center"><strong> СОЗДАТЬ БАЗУ ДАННЫХ </strong></td>
      </tr>
      <tr>
        <td width="224" align="right"><span class='red'></span>Имя сервера:</td>
        <td width="227" align="left"><input name="name_server" type="text" placeholder="localhost" size="30" maxlength="45"></td>
      </tr>
      <tr>
        <td align="right"><span class='red'></span>Логин :</td>
        <td><input name="login" type="text" placeholder="root"  size="20" maxlength="25"></td>
      </tr>
      <tr>
        <td align="right">Пароль:</td>
        <td><input name="db_pass" type="text" size="20" maxlength="20"></td>
      </tr>
      <tr>
        <td align="right"><span class='red'></span>Имя БД:</td>
        <td><input name="name_db" type="text" value="<?php echo $db_name; ?>" size="30" maxlength="30" placeholder="lich_bd"></td>
      </tr>
	  <tr>
        <td align="right"><span class='red'></span>Количество максимальных сохранений БД, при максимальном сжатии.</td>
        <td><input name="kolvo_soxr2" type="text" placeholder="4" size="30" maxlength="30"></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td><label>
          <input type="submit" name="button" id="button" value="Создать" class="buts">
        </label>
		<input type=submit value="Если лень думать &#xa; жми сюда" name=default title="По умолчанию.Создаётся маленькое расписание, чтобы его потом очистить жми ctrl+*">
		</td>
      </tr>
    </table>
  </div>
</form>
<?=$echo?>
<?=$oshibka?>
</body>
</html>