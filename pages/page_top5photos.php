<?php include '../php/php_connect.php'; ?>
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
			 <table>
			 <?php 
					$result = mysql_query
						("SELECT * FROM photos WHERE popularity!=0 ORDER BY popularity DESC LIMIT 5", $con);
					$side=0;
					
					while($r = mysql_fetch_array($result))
					{
						if(!count($r)) { echo "<h3>there are not top5 photos yet.</h3>"; }
						if(($side<3))
						{ echo "<div class='ShowPhotosLeft'>"; $side++; }
						else
						{echo "<div class='ShowPhotosRight'>"; $side=0; }
						echo "<img class='ShowPhotosImg' src='../images".$r['filename']."' alt='".$r['filename']."' width='180' height='140'>";
						echo "<br><a class='ShowPhotosLnk' href='./page_viewMore.php?img=".$r['filename']."'>view more</a>";
						echo "<p>popularity ".$r['popularity'];
						echo "</div>";
					}
				
			   ?>
			  </table>
			</div>
			<?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>