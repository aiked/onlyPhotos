<?php
	session_start();
	include '../php/php_connect.php';	
	if( (isset($_POST['newBalance']))&&(!empty($_POST['newBalance']))&&(is_numeric($_POST['newBalance']))&&($_POST['newBalance']>0) )
	{
		mysql_query("UPDATE customer SET acc_bal ='".$_POST['newBalance']."' WHERE username='".$_SESSION['username']."'",$con);
		header( 'Location: ../pages/page_updateBalance.php?DONE=yes');
	}
	else
	{
		header( 'Location: ../pages/page_updateBalance.php?NOTDONE=yes');
	}