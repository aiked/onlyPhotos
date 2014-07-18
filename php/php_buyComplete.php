<?php 
		include '../php/php_connect.php';
		session_start();
		$totalquan = 0;
		$r = mysql_fetch_array(mysql_query ("SELECT acc_bal FROM customer WHERE username='".$_SESSION['username']."'"));
		if( ($_POST['total']>$r['acc_bal']) )
		{ header( 'Location: ../pages/page_cart.php?errTOT=yes'); }
		else
		{
			$i=0;
			$str = "";
			$total_price = $_POST['total'];
			$username = $_SESSION['username'];
			$totalquan = $_POST['quantityTotal'];
			$date = date('Y-m-d H:i:s');
			
			echo $totalquan; 
			$trans = mysql_query("INSERT INTO transactions (customer,date,amount,quantity) VALUES ('$username', '$date', '$total_price', '$totalquan')");
			$trans_id = mysql_insert_id();
			
			foreach($_POST as $key => $value)
			{
			   $str_quan = 'quantity'.$i;
			   if ($key ==$str_quan)
				{
					foreach($_SESSION['cart'] as $p)
					{ 
						$str_sub = 'subTotal'.$i;
						$str_quan = 'quantity'.$i;
						$result = mysql_query("SELECT id,photographer,stock FROM photos WHERE filename='".$p[0]."'");
						$row = mysql_fetch_array($result);
						
						$photo_num = $row['id'];
						$price = $_POST[$str_sub];
						$quan = $_POST[$str_quan];
						
						
						if( ($row['stock'] < $quan) )
								{ header( 'Location: ../pages/page_cart.php?errSTOCK=yes'); }
						
						mysql_query("INSERT INTO complete_transactions (customer,photo_id,trans_id,photo_amount,photo_quan) VALUES ('$username','$photo_num','".$trans_id."','$price','$quan')");

						mysql_query("UPDATE photographer SET balance  = balance +".$quan."
								WHERE username = '".$row['photographer']."'");
						mysql_query("UPDATE photos SET popularity =  popularity +".$quan."
								WHERE id = '".$row['id']."'");
						++$i;
					}
				}				
			}	
			mysql_query("UPDATE customer SET acc_bal = acc_bal -".$_POST['total']."
							WHERE username = '".$_SESSION['username']."'");
			unset($_SESSION['cart']);
			header( 'Location: ../pages/page_prfCustomer.php');
		}
	
?>  