<?php include '../php/php_connect.php'; 
	
	$r= mysql_fetch_array(mysql_query("SELECT * FROM photographer WHERE username='".$_GET['usr']."'",$con));

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:photographer</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
                           
            <div id="context" class="phGrapher">
            	<table align="center">
                <tr> <td>name</td> <td><?php echo $r['name_fis']." ".$r['name_lst'];?></td> </tr>
                <tr> <td>email</td> <td><?php echo $r['email']; ?></td> </tr>
                <tr> <td>birthday</td> <td><?php echo $r['born']; ?></td> </tr>
                <tr> <td>nationality</td> <td><?php echo $r['nation']; ?></td> </tr>
                <tr> <td>address</td> <td><?php echo $r['addr_nam']." ".$r['addr_num'];?></td> </tr>
                <tr> <td>sold copies</td> <td><?php echo $r['balance']; ?></td> </tr>
                </table>
                
                <h3><?php echo $r['name_fis']." ".$r['name_lst'];?> is affected by:</h3>
                <?php
					$aff = mysql_query("SELECT ph_affection FROM photographer_affections WHERE username='".$_GET['usr']."'",$con);
					while ($ar=mysql_fetch_array($aff))
					{
						$tmp = mysql_fetch_array(mysql_query("SELECT username,name_fis,name_lst FROM photographer WHERE username='".$ar['ph_affection']."'",$con));	
						echo "<a class='ShowPhotosLnk' href='./page_viewPhGrapher.php?usr=".$tmp['username']."'>".$tmp['name_fis']." ".$tmp['name_lst']."</a><br>";
					}
					echo "<h3>his photographs on the site:</h3>";
					$result = mysql_query("SELECT filename,price FROM photos WHERE photographer='".$_GET['usr']."'",$con);
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