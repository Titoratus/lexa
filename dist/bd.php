<?php
	mysql_connect("localhost","root", "") or die(mysql_error());
	mysql_select_db("lich_bd") or die("Could not select database");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET NAMES UTF8");
	$load= mysqli_connect("localhost","root", "", "lich_bd");
?>