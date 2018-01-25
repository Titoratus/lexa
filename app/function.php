<?php
	session_start();
	include ('bd.php');
	//Вход
	if(isset($_POST["e_login"])){
		$e_login=$_POST['e_login'];
		$e_password=md5($_POST['e_password']);
		$query = mysqli_query($load, "SELECT * FROM `users` WHERE `user` ='$e_login'");
		$user_data = mysqli_fetch_array($query);				
		if ($user_data['pass']==$e_password){
			$_SESSION['login'] = $e_login;
			$_SESSION['group'] = $user_data['grup'];
			$_SESSION['priv'] = $user_data['priv'];
			if (date('m')<8){
				$kurs = (date('Y')-$user_data['year']-1)*10+$user_data['grup'];
			} else {
				$kurs = (date('Y')-$user_data['year'])*10+$user_data['grup'];
			}
			$_SESSION['kurs'] = $kurs;
			$group = $user_data['grup'].'_'.$user_data['year'];
			$_SESSION['Table'] = $group;
		} else {
			die("error");
		}
	}
		
	function infa($id){
		$group = $_SESSION['Table'];
		$query=mysqli_query($load, "SELECT * FROM $group WHERE `id` ='$id'");
		$user_data = mysqli_fetch_array($query);	
		echo $user_data['LastName'];
	}
	
	function create_bd($name){
		mysqli_query($load, "CREATE TABLE $name	(
		id int auto_increment primary key,
		FirstName VARCHAR(40),
		LastName VARCHAR(40),
		Otchestvo VARCHAR(40),
		NumberGroup VARCHAR(3),
		Specialnost VARCHAR(40),
		BirthDate VARCHAR(40),
		Phone VARCHAR(12),
		Propiska VARCHAR(40),
		Obshaga VARCHAR(10),
		Progivaet VARCHAR(50),
		GroupHealth VARCHAR(30),
		Invalidnost VARCHAR(10),
		KDN VARCHAR(10),
		Class VARCHAR(10),
		SrBallAt VARCHAR(5),
		Rabota VARCHAR(50),
		Hobbi VARCHAR(50),
		Family VARCHAR(50),
		Obespechenie VARCHAR(50),
		Maloobespech VARCHAR(50),
		Mnogodet VARCHAR(50),
		Socialrisk VARCHAR(50),
		FIOFather VARCHAR(50),
		FPensioner VARCHAR(10),
		FRabota VARCHAR(10),
		FMestoR VARCHAR(50),
		FPhoner VARCHAR(12),
		FAdres VARCHAR(50),
		FIOMother VARCHAR(50),
		MPensioner VARCHAR(10),
		MRabota VARCHAR(10),
		MMestoR VARCHAR(50),
		MPhoner VARCHAR(12),
		MAdres VARCHAR(50),
		FIOOpekun VARCHAR(50),
		OPensioner VARCHAR(10),
		ORabota VARCHAR(10),
		OMestoR VARCHAR(50),
		OPhoner VARCHAR(12),
		OAdres VARCHAR(50)) ") Or die(mysql_error()); //Создание таблиц и разделов
	}
	
	function reg($login, $pass, $priv, $group, $year){
		$pass = md5($pass);
		$result = mysqli_query($load, "INSERT INTO users (user, pass, priv, grup, year)
		VALUES ('$login', '$pass', '$priv', '$group', '$year')");
		$ob = $group.'_'.$year;
		$result = mysqli_query($load, "INSERT INTO config (groups, years, obshee)
		VALUES ('$group', '$year', '$ob')");
	}
?>