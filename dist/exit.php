<?php
	session_start();
	$_SESSION['login'] = null;
	$_SESSION['Table'] = null;
	$_SESSION['group'] = null;
	$_SESSION['priv'] = null;
	$_SESSION['kurs'] = null;
	session_destroy();
	header("Location: index.php");
?>