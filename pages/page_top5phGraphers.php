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
			 <table align="center">
			 <?php 
					$result = mysql_query
						("SELECT * FROM photographer WHERE balance!=0 ORDER BY balance DESC LIMIT 5", $con);
					echo "<th>name</th><th>sold copies</th>";
					while($r = mysql_fetch_array($result))
					{
						echo "<tr><td><a class='ShowPhotosLnk' href='./page_viewPhGrapher.php?usr=".$r['username']."'>".$r['name_fis']." ".$r['name_lst']."</a></td>
								<td class='top5Graphers' >".$r['balance']."</td></tr>";
					}
			   ?>
			  </table>
			</div>
			<?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>