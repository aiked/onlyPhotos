
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:prfCustomer</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
                           
            <div id="context">
            	<a class='ShowPhotosLnk' href='../php/php_rmCustomer.php'>delete account</a>
                <a class='ShowPhotosLnk' href='../pages/page_showInterests.php'>update interests</a>
                <a class='ShowPhotosLnk' href='../pages/page_customerTrans.php'>show latest transactions</a>
                <a class='ShowPhotosLnk' href='../pages/page_updateBalance.php'>update your balance</a>
                <?php 	include '../php/php_connect.php'; 
						$r= mysql_fetch_array(mysql_query("SELECT * FROM customer WHERE username='".$_SESSION['username']."'",$con));
				?>
                <table align="center">
                <th colspan="2">your informations</th>
                <tr> <td>name</td> <td class="top5Graphers"><?php echo $r['name_fis']." ".$r['name_lst'];?></td> </tr>
                <tr> <td>email</td> <td class="top5Graphers"><?php echo $r['email']; ?></td> </tr>
                <tr> <td>address</td> <td class="top5Graphers"><?php echo $r['addr_nam']." ".$r['addr_num'];?></td> </tr>
                <tr> <td>credit card number</td> <td class="top5Graphers"><?php echo $r['acc_num']; ?></td> </tr>
                <tr> <td>credit card type</td> <td class="top5Graphers"><?php echo $r['acc_type']; ?></td> </tr>
                <tr> <td>credit card balance</td> <td class="top5Graphers"><?php echo $r['acc_bal']; ?> &#8364</td> </tr>
                </table>
            </div>
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>