<?php 
	include '/php/php_connect.php';	
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:index</title>
        <link type="text/css" href="styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '/pages/page_navigation.php' ?>
                           
            <div id="context">
            	<p id="welcome_p"> Welcome @onlyPhotos. <br> please  <a class="indexLnk" href="./pages/page_login.php">login</a> to continue. <br>
                	Not a member? <a class="indexLnk" href="./pages/page_signup.php">sign up now!</a> </p>
            </div>
            
             <?php include './pages/page_footer.php' ?>
		</div>
        
    </body>
</html>