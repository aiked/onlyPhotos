<?php
	include '../php/php_connect.php';	

	if	( isset($_POST['SignUsr'])&&isset($_POST['SignPwd'])&&isset($_POST['SignFis'])&&isset($_POST['SignLst'])&&
		isset($_POST['SignEmail'])&&isset($_POST['AddrName'])&&isset($_POST['SignPwd'])&&isset($_POST['SignFis'])&&
		isset($_POST['SignLst'])&&isset($_POST['SignEmail'])&&isset($_POST['AddrName'])&&isset($_POST['AddrNum'])&&
		isset($_POST['SignCredit'])&&isset($_POST['CreditType'])&&isset($_POST['CreditBal'])&&
		!empty($_POST['SignUsr'])&&!empty($_POST['SignPwd'])&&!empty($_POST['SignFis'])&&!empty($_POST['SignLst'])&&
		!empty($_POST['SignEmail'])&&!empty($_POST['AddrName'])&&!empty($_POST['SignPwd'])&&!empty($_POST['SignFis'])&&
		!empty($_POST['SignLst'])&&!empty($_POST['SignEmail'])&&!empty($_POST['AddrName'])&&!empty($_POST['AddrNum'])&&
		!empty($_POST['SignCredit'])&&!empty($_POST['CreditType'])&&!empty($_POST['CreditBal'])
		)
	{
		$username = $_POST['SignUsr'];
		$password = $_POST['SignPwd'];
		$name_fis = $_POST['SignFis'];
		$name_lst = $_POST['SignLst'];
		$email    = $_POST['SignEmail'];
		$addr_nam = $_POST['AddrName'];
		$addr_num = $_POST['AddrNum'];
		$acc_num  = $_POST['SignCredit'];
		$acc_type = $_POST['CreditType'];	 
		$acc_bal =  $_POST['CreditBal'];
		
		//Address number is not numeric
		if( !filter_var($addr_num, FILTER_VALIDATE_INT) )
		{ header( 'Location: ../pages/page_signup.php?errADR=yes'); }
		//Card number  is not numeric
		else if( !is_numeric($acc_num) )
		{ header( 'Location: ../pages/page_signup.php?errCRD=yes'); }
		else if( (!filter_var($acc_bal, FILTER_VALIDATE_FLOAT))&&($acc_bal>0) )
		{ header( 'Location: ../pages/page_signup.php?errBAL=yes'); }
		//Email is not valid
		else if( !filter_var($email,FILTER_VALIDATE_EMAIL) )
		{ header( 'Location: ../pages/page_signup.php?errEML=yes'); }
		//Username already in use
		else if(mysql_query("SELECT username FROM CUSTOMER WHERE username=".$username, $con))
		{ header( 'Location: ../pages/page_signup.php?errUSR=yes'); }
		// Input is valid. You can input it to database.
		else 
		{
		 	$insert_cust = "INSERT INTO customer	(username,password,email,name_fis,name_lst,addr_nam,addr_num,acc_num,acc_type,acc_bal )
										 VALUES 	('$username','$password','$email','$name_fis','$name_lst','$addr_nam','$addr_num','$acc_num','$acc_type',$acc_bal)";
			mysql_query($insert_cust, $con);
			
			//Manage session
			session_start();
			$_SESSION[ 'username' ] = $username;
			header( 'Location: ../pages/page_prfCustomer.php');
		}	
	}
	else
	{ header( 'Location: ../pages/page_signup.php?errMIS=yes'); }
?>