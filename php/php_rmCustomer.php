<?php
	include '../php/php_connect.php';
	session_start();
	
	$username = $_SESSION['username'];
	echo  $username;
	if(mysql_query("DELETE FROM customer WHERE username='".$username."'", $con))
	{
		unset($_SESSION['username']);
		session_destroy(); 
	}
	header( 'Location: ../index.php'); 
?>