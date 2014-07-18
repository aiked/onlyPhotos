<?php include '../php/php_connect.php'; ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:buyComplete</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
			
             <?php 
					
					$r = mysql_fetch_array(mysql_query ("SELECT acc_bal FROM customer WHERE username='".$_SESSION['username']."'"));
					
					if( ($_POST['total']>$r['acc_bal']) )
						{ header( 'Location: ../pages/page_cart.php?errTOT=yes'); }
						
					else
					{
						$i=0;
						$str = "";
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
									
									
									$photo_num = $row['id'];$username = $_SESSION['username'];$price = $_POST[$str_sub];$quan = $_POST[$str_quan];
									
									$date = date('Y-m-d');
									$time = date ('h:i:s');
									
									if( ($row['stock'] < $quan) )
											{ header( 'Location: ../pages/page_cart.php?errSTOCK=yes'); }
											
									$trans = mysql_query("INSERT INTO transactions (photo_id, customer,date,amount,quantity) 
											VALUES ('$photo_num', '$username', '$date','$time', '$price', '$quan')");
									
									
									
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
					
					}
				
			?>              
            <div id="context">
				<a class='ShowPhotosLnk' href='../pages/page_cart.php?remove=yes'>back to cart</a>";
            </div>
            
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>