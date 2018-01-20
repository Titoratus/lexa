<?php
	session_start();
	include ('bd.php');
	//Вход
	if(isset($_POST["e_login"])){
		$e_login=$_POST['e_login'];
		$e_password=md5($_POST['e_password']);
		$query = mysql_query("SELECT * FROM `users` WHERE `user` ='$e_login'");
		$user_data = mysql_fetch_array($query);				
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
		$query=mysql_query("SELECT * FROM $group WHERE `id` ='$id'");
		$user_data = mysql_fetch_array($query);	
		echo $user_data['LastName'];
	}
	
	function delet($name,$id){
		$result = mysql_query ("DELETE FROM $name WHERE id='$id'");
		header("Location: /student.php");
	}
	
	function edit($name,$id){
		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Otchestvo = $_POST['Otchestvo'];
		$NumberGroup = $_POST['NumberGroup']; 
		$Specialnost = $_POST['Specialnost'];
		$BirthDate = $_POST['BirthDate'];
		$Phone = $_POST['Phone'];
		$Propiska = $_POST['Propiska']; 
		$Obshaga = $_POST['Obshaga'];
		$Progivaet = $_POST['Progivaet'];
		$GroupHealth = $_POST['GroupHealth'];
		$Invalidnost = $_POST['Invalidnost']; 
		$KDN = $_POST['KDN']; 
		$Class = $_POST['Class'];
		$SrBallAt = $_POST['SrBallAt'];
		$Rabota = $_POST['Rabota'];
		$Hobbi = $_POST['Hobbi'];
		$Family = $_POST['Family'];
		$Obespechenie = $_POST['Obespechenie'];	
		$Maloobespech = $_POST['Maloobespech'];	
		$Mnogodet = $_POST['Mnogodet'];	
		$Socialrisk = $_POST['Socialrisk'];	
		$FIOFather = $_POST['FIOFather'];
		$FPensioner = $_POST['FPensioner'];
		$FRabota = $_POST['FRabota'];
		$FMestoR = $_POST['FMestoR'];
		$FPhoner = $_POST['FPhoner'];
		$FAdres = $_POST['FAdres'];	
		$FIOMother = $_POST['FIOMother'];
		$MPensioner = $_POST['MPensioner'];
		$MRabota = $_POST['MRabota'];
		$MMestoR = $_POST['MMestoR'];
		$MPhoner = $_POST['MPhoner'];
		$MAdres = $_POST['MAdres'];			
		$FIOOpekun = $_POST['FIOOpekun'];
		$OPensioner = $_POST['OPensioner'];
		$ORabota = $_POST['ORabota'];
		$OMestoR = $_POST['OMestoR'];
		$OPhoner = $_POST['OPhoner'];
		$OAdres = $_POST['OAdres'];	
		$result = mysql_query ("UPDATE $name SET FirstName='$FirstName', LastName='$LastName', Otchestvo='$Otchestvo', NumberGroup='$NumberGroup'
			, Specialnost='$Specialnost', BirthDate='$BirthDate', Phone='$Phone', Propiska='$Propiska', Obshaga='$Obshaga', Progivaet='$Progivaet'
			, GroupHealth='$GroupHealth', Invalidnost='$Invalidnost', KDN='$KDN', Class='$Class', SrBallAt='$SrBallAt', Rabota='$Rabota'
			, Hobbi='$Hobbi', Family='$Family', Obespechenie='$Obespechenie', Maloobespech='$Maloobespech', Mnogodet='$Mnogodet', Socialrisk='$Socialrisk', FIOFather='$FIOFather', FPensioner='$FPensioner', FRabota='$FRabota'
			, FMestoR='$FMestoR', FPhoner='$FPhoner', FAdres='$FAdres', FIOMother='$FIOMother', MPensioner='$MPensioner', MRabota='$MRabota'
			, MMestoR='$MMestoR', MPhoner='$MPhoner', MAdres='$MAdres', FIOOpekun='$FIOOpekun', OPensioner='$OPensioner', ORabota='$ORabota'
			, OMestoR='$OMestoR', OPhoner='$OPhoner', OAdres='$OAdres' WHERE id='$id'");
		header("Location: /student.php");
	}
	
	function create_bd($name){
		mysql_query("CREATE TABLE $name	(
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
	
	function add_person($name){
		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Otchestvo = $_POST['Otchestvo'];
		$NumberGroup = $_POST['NumberGroup']; 
		$Specialnost = $_POST['Specialnost'];
		$BirthDate = $_POST['BirthDate'];
		$Phone = $_POST['Phone'];
		$Propiska = $_POST['Propiska']; 
		$Obshaga = $_POST['Obshaga'];
		$Progivaet = $_POST['Progivaet'];
		$GroupHealth = $_POST['GroupHealth'];
		$Invalidnost = $_POST['Invalidnost']; 
		$KDN = $_POST['KDN']; 
		$Class = $_POST['Class'];
		$SrBallAt = $_POST['SrBallAt'];
		$Rabota = $_POST['Rabota'];
		$Hobbi = $_POST['Hobbi'];
		$Family = $_POST['Family'];
		$Obespechenie = $_POST['Obespechenie'];	
		$Maloobespech = $_POST['Maloobespech'];	
		$Mnogodet = $_POST['Mnogodet'];	
		$Socialrisk = $_POST['Socialrisk'];			
		$FIOFather = $_POST['FIOFather'];
		$FPensioner = $_POST['FPensioner'];
		$FRabota = $_POST['FRabota'];
		$FMestoR = $_POST['FMestoR'];
		$FPhoner = $_POST['FPhoner'];
		$FAdres = $_POST['FAdres'];	
		$FIOMother = $_POST['FIOMother'];
		$MPensioner = $_POST['MPensioner'];
		$MRabota = $_POST['MRabota'];
		$MMestoR = $_POST['MMestoR'];
		$MPhoner = $_POST['MPhoner'];
		$MAdres = $_POST['MAdres'];			
		$FIOOpekun = $_POST['FIOOpekun'];
		$OPensioner = $_POST['OPensioner'];
		$ORabota = $_POST['ORabota'];
		$OMestoR = $_POST['OMestoR'];
		$OPhoner = $_POST['OPhoner'];
		$OAdres = $_POST['OAdres'];	
		$result = mysql_query("INSERT INTO $name (FirstName, LastName, Otchestvo, NumberGroup, Specialnost, BirthDate, Phone, Propiska, Obshaga, 
		Progivaet, GroupHealth, Invalidnost, KDN, Class, SrBallAt, Rabota, Hobbi, Family, Obespechenie, Maloobespech, Mnogodet, Socialrisk, FIOFather, FPensioner, FRabota, FMestoR, FPhoner, FAdres,
		FIOMother, MPensioner, MRabota, MMestoR, MPhoner, MAdres, FIOOpekun, OPensioner, ORabota, OMestoR, OPhoner, OAdres) 
		VALUES ('$FirstName', '$LastName', '$Otchestvo', '$NumberGroup', '$Specialnost', '$BirthDate', '$Phone', '$Propiska', '$Obshaga', '$Progivaet',
		'$GroupHealth', '$Invalidnost', '$KDN', '$Class', '$SrBallAt', '$Rabota', '$Hobbi', '$Family', '$Obespechenie', '$Maloobespech', '$Mnogodet', '$Socialrisk', '$FIOFather', '$FPensioner', '$FRabota', 
		'$FMestoR',	'$FPhoner', '$FAdres', '$FIOMother', '$MPensioner', '$MRabota', '$MMestoR',	'$MPhoner', '$MAdres', '$FIOOpekun', '$OPensioner',
		'$ORabota', '$OMestoR',	'$OPhoner', '$OAdres')");
		//Если запрос пройдет успешно то в переменную result вернется true
		if($result == 'true') {
			echo "Ваши данные успешно добавлены";
		} else {
			echo "Ваши данные не добавлены";
		}
	}
	
	function reg($login, $pass, $priv, $group, $year){
		$pass = md5($pass);
		$result = mysql_query("INSERT INTO users (user, pass, priv, grup, year)
		VALUES ('$login', '$pass', '$priv', '$group', '$year')");
		$ob = $group.'_'.$year;
		$result = mysql_query("INSERT INTO config (groups, years, obshee)
		VALUES ('$group', '$year', '$ob')");
	}
?>