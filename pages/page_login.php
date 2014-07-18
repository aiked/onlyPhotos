<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:login</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
                           
            <div id="context" align="center">
            
            	 <?php if(isset($_GET['err'])) { echo "<div class='error'>invalid username or password.</div>"; } ?>
				
            	<form action="../php/php_login.php" method="post">
            	<table align="center">
                <tr><td>username</td><td><input type="text" name="LoginUsr" id="LoginUsr"></td></tr>
                <tr><td>password</td><td><input type="password" name="LoginPwd" id="LoginPwd"></td></tr>
                <tr><td colspan="2" style="text-align:center"><input type="submit" value="login" /></td></tr>
                </table>
                </form>
            </div>
            
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>