<?php 	include '../php/php_connect.php'; ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:cart</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
		<script type="text/javascript" src="../library.js"></script>
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
            <?php 
				 if	(isset($_GET['errTOT'])) { echo "<div class='error'>insufficient balance.</div>"; } 
				 else if 	(isset($_GET['errSTOCK'])) { echo "<div class='error'>not enough available stock.</div>"; } 
				 else if(isset($_GET['remove'])) {unset($_SESSION['cart']);}
				 
					$r= mysql_fetch_array(mysql_query("SELECT acc_num,acc_bal FROM customer WHERE username='".$_SESSION['username']."'",$con));
				
					if(!isset($_SESSION['cart'])){ $_SESSION['cart'] = array(); }
					if(isset($_GET['add'])&&!empty($_GET['add'])&&isset($_GET['prc'])&&!empty($_GET['prc']))
					{
						
						$found = false;
						foreach($_SESSION['cart'] as $p){ if($p[0]==$_GET['add']){ $found = true; } }
						if(!$found){ array_push($_SESSION['cart'],array($_GET['add'],$_GET['prc'])); }
						
					}
					else if (isset($_GET['rem'])&&!empty($_GET['rem']))
					{
						$key=-1; $i=0;
						foreach($_SESSION['cart'] as $p)
						{ 
							if($p[0]==$_GET['rem']){ $key = $i; } 
							++$i;
						}
						if($key!=-1)
						{ 	if(count($_SESSION['cart'])==1) { unset($_SESSION['cart']);}
							else { unset($_SESSION['cart'][$key]); } }
					}
				
			?>
			
            <div id="context">
				<?php
					if(!isset($_SESSION['cart'])||!count($_SESSION['cart'])){ echo "<h3>there is nothing in the shopping cart.</h3>"; } 
					else 
					{
						echo "<form name='input' action='../php/php_buyComplete.php' method='post'><table class='cartTable' align='center'>";
						echo "<th>photo</th><th>price</th><th colspan='2'>quantity</th>";
						$i=0;
						foreach($_SESSION['cart'] as $p)
						{
							echo "<tr><td><img src='../images/".$p[0]."' width='70' height='70'></td><td>".$p[1]." &#8364</td>
							<td><input type='text' id='quantity".$i."' name='quantity".$i."' size=4 onchange='calcSubTotal(".$i.",".$p[1].")'></td>
							<td><input type='text' id='subTotal".$i."' name='subTotal".$i."' size=4 readonly></td>
							<td><a class='ShowPhotosLnk' href='./page_cart.php?rem=".$p[0]."'>remove from cart</a></td>
							</tr>";
							++$i;
						}
						echo "<tr><td colspan='2' align='left' >total:</td><td colspan='2'><input type='text' name='total' id='total' size=6 value='0' readonly>&#8364</td></tr>";
						echo "<tr><td colspan='3' align='left' >your credit card:</td><td>".$r['acc_num']."</td></tr>";
						echo "<tr><td colspan='3' align='left' >your balance:</td><td>".$r['acc_bal']." &#8364</td></tr>";
						echo"</table><input type='submit' readonlyvalue='Submit'>";
						echo"<input type='hidden' name='quantityTotal' id='quantityTotal' value='0'></form>";
					}
				?>
				
						
            </div>
            
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>