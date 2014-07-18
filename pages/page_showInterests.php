<?php
	include '../php/php_connect.php';
?>	
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:showInterests</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
                           
            <div id="context">
				<form action="../php/php_updateInterests.php" method="post">
				<table align="center">
				<th>you can choose the following photo interests:</th>
				<tr><td><input type="checkbox" name="landscapes" value="yes" <?php if(mysql_num_rows(mysql_query("SELECT id FROM cust_interests WHERE username='".$_SESSION['username']."' AND interest='landscapes'",$con))){echo " checked";}?>>landscapes</td>
				<td><input type="checkbox" name="subjects" value="yes" <?php if(mysql_num_rows(mysql_query("SELECT id FROM cust_interests WHERE username='".$_SESSION['username']."' AND interest='subjects'",$con))){echo " checked";}?>>subjects</td></tr>
				<tr><td><input type="checkbox" name="portrait" value="yes" <?php if(mysql_num_rows(mysql_query("SELECT id FROM cust_interests WHERE username='".$_SESSION['username']."' AND interest='portrait'",$con))){echo " checked";}?>>portrait</td>
				<td><input type="checkbox" name="special" value="yes" <?php if(mysql_num_rows(mysql_query("SELECT id FROM cust_interests WHERE username='".$_SESSION['username']."' AND interest='special'",$con))){echo " checked";}?>>special</td></tr>
				<tr><td><input type="checkbox" name="nature" value="yes" <?php if(mysql_num_rows(mysql_query("SELECT id FROM cust_interests WHERE username='".$_SESSION['username']."' AND interest='nature'",$con))){echo " checked";}?>>nature</td>
				<td><input type="checkbox" name="travel" value="yes" <?php if(mysql_num_rows(mysql_query("SELECT id FROM cust_interests WHERE username='".$_SESSION['username']."' AND interest='travel'",$con))){echo " checked";}?>>travel</td></tr>
				<tr><td colspan="2" style="text-align:center"><input type="submit" value="update" /></td></tr>
				</table>
				</form>
            </div>
            
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>