<?php
	include '../php/php_connect.php';
	if	( 	isset($_POST['LoginUsr'])&&isset($_POST['LoginPwd'])&&
			!empty($_POST['LoginUsr'])&&!empty($_POST['LoginPwd']) )
	{
		$username = $_POST['LoginUsr'];
		$password = $_POST['LoginPwd'];
	
		$result = mysql_query("SELECT username FROM CUSTOMER 
								WHERE username = '$username'
								AND password = '$password'", $con); 
		if ( mysql_num_rows( $result ) == 0 ) 		
		{	header( 'Location: ../pages/page_login.php?err=yes'); }		
		else
		{
			session_start();
			$_SESSION[ 'username' ] = $username;
			header( 'Location: ../pages/page_prfCustomer.php');
		}
	}
	else
	{ header( 'Location: ../pages/page_login.php?err=yes'); }
?>