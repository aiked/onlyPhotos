<?php include '../php/php_connect.php'; ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:photographers</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
                           
            <div id="context" class="allPhGraphers">
            	<h2>a list of all the photographers</h2>
            	<?php
					$result = mysql_query("SELECT username,name_fis,name_lst FROM photographer",$con);
					$side=0;
					while($row=mysql_fetch_array($result))
					{ echo "<a class='ShowPhotosLnk' href='./page_viewPhGrapher.php?usr=".$row['username']."'>".$row['name_fis']." ".$row['name_lst']."</a><br>"; }
				?>
            </div>
            
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>