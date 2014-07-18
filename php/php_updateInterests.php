<?php
	include '../php/php_connect.php';
	session_start();
	//landscapes
	if	(isset($_POST['landscapes'])&&($_POST['landscapes']=='yes'))
	{
		$q_fl = "SELECT id FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='landscapes'";	
		if (!mysql_num_rows( mysql_query($q_fl,$con)))
		{
			$q_il= "INSERT INTO cust_interests (username,interest)
							VALUES('".$_SESSION['username']."','landscapes')";
			mysql_query($q_il,$con);
		}
	}
	else
	{
		$q_dl = "DELETE FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='landscapes'";
		mysql_query($q_dl,$con);
	}
	//subjects
	if	(isset($_POST['subjects'])&&($_POST['subjects']=='yes'))
	{
		$q_fl = "SELECT id FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='subjects'";	
		if (!mysql_num_rows( mysql_query($q_fl,$con)))
		{
			$q_il= "INSERT INTO cust_interests (username,interest)
							VALUES('".$_SESSION['username']."','subjects')";
			mysql_query($q_il,$con);
		}
	}
	else
	{
		$q_dl = "DELETE FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='subjects'";
		mysql_query($q_dl,$con);
	}
	//portrait
	if	(isset($_POST['portrait'])&&($_POST['portrait']=='yes'))
	{
		$q_fl = "SELECT id FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='portrait'";	
		if (!mysql_num_rows( mysql_query($q_fl,$con)))
		{
			$q_il= "INSERT INTO cust_interests (username,interest)
							VALUES('".$_SESSION['username']."','portrait')";
			mysql_query($q_il,$con);
		}
	}
	else
	{
		$q_dl = "DELETE FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='portrait'";
		mysql_query($q_dl,$con);
	}
	//special
	if	(isset($_POST['special'])&&($_POST['special']=='yes'))
	{
		$q_fl = "SELECT id FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='special'";	
		if (!mysql_num_rows( mysql_query($q_fl,$con)))
		{
			$q_il= "INSERT INTO cust_interests (username,interest)
							VALUES('".$_SESSION['username']."','special')";
			mysql_query($q_il,$con);
		}
	}
	else
	{
		$q_dl = "DELETE FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='special'";
		mysql_query($q_dl,$con);
	}
	//nature
	if	(isset($_POST['nature'])&&($_POST['nature']=='yes'))
	{
		$q_fl = "SELECT id FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='nature'";	
		if (!mysql_num_rows( mysql_query($q_fl,$con)))
		{
			$q_il= "INSERT INTO cust_interests (username,interest)
							VALUES('".$_SESSION['username']."','nature')";
			mysql_query($q_il,$con);
		}
	}
	else
	{
		$q_dl = "DELETE FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='nature'";
		mysql_query($q_dl,$con);
	}
	//travel
	if	(isset($_POST['travel'])&&($_POST['travel']=='yes'))
	{
		$q_fl = "SELECT id FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='travel'";	
		if (!mysql_num_rows( mysql_query($q_fl,$con)))
		{
			$q_il= "INSERT INTO cust_interests (username,interest)
							VALUES('".$_SESSION['username']."','travel')";
			mysql_query($q_il,$con);
		}
	}
	else
	{
		$q_dl = "DELETE FROM cust_interests 
				WHERE username='".$_SESSION['username']."' AND
				interest='travel'";
		mysql_query($q_dl,$con);
	}
	
	header( 'Location: ../pages/page_showInterests.php');
?>