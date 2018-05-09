<?php
	setcookie("curator", "", time() - 3600);
	setcookie("admin", "", time() - 3600);
	header("Location: index.php");
?>