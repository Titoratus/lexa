<?php
	mysql_connect("localhost","root", "") or die(mysql_error());
	mysql_select_db("lich_bd") or die("Could not select database");
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query("SET NAMES 'utf8");
	$load= mysqli_connect("localhost","root", "", "lich_bd");
?>