<?php 
	session_start();
	session_destroy();
	setcookie('email', $email, time()-10, '/');
	header('location: home.php');
?>