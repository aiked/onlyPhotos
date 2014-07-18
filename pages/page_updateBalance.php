<?php 	include '../php/php_connect.php'; ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:prfCustomer</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
            <?php $r = mysql_fetch_array( mysql_query("SELECT acc_bal FROM customer WHERE username='".$_SESSION['username']."'",$con)); ?>     
            <div id="context">
            	<?php 
				if		(isset($_GET['NOTDONE'])) { echo "<div class='error'>update not successfull</div>"; } 
				else if	(isset($_GET['DONE'])) { echo "<div class='error'>update successfull</div>"; }
				?>
                <form action="../php/php_updateBalance.php" method="post">
                <table align="center">
                <tr><td>your current credit card balance</td><td align="right"> <?php echo $r['acc_bal']; ?> &#8364 </td></tr>
                <tr><td>your new credit card balance</td><td><input type="text" name="newBalance" size=5/>&#8364 </td></tr>
                <tr><td></td><td><input type="submit" value="update"/></td></tr>
                </table>
                </form>
            </div>
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>