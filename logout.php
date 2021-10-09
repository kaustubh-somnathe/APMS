<?php 
	session_start();
	session_destroy();
	setcookie('id', null);
	header("location: login.php");
 ?>