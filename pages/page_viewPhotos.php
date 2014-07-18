<?php include '../php/php_connect.php'; ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:allphotos</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
                           
            <div id="context">
            	<?php
					$result = mysql_query("SELECT filename,price FROM photos",$con);
					$side=0;
					while($row=mysql_fetch_array($result))
					{
						if(($side<3))
						{ echo "<div class='ShowPhotosLeft'>"; $side++; }
						else
						{echo "<div class='ShowPhotosRight'>"; $side=0; }
						echo "<img class='ShowPhotosImg' src='../images".$row['filename']."' alt='".$row['filename']."' width='180' height='140'>";
						echo "<br><a class='ShowPhotosLnk' href='./page_viewMore.php?img=".$row['filename']."'>view more</a>";
						echo "<a class='ShowPhotosLnk' href='./page_cart.php?add=".$row['filename']."&prc=".$row['price']."'>buy now</a>";
						echo "</div>";
					}
				?>
            </div>
            
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>