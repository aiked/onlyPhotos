<?php include '../php/php_connect.php'; ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:viewMore</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
                           
            <div id="context">
            	<?php $r =  mysql_fetch_array(mysql_query("SELECT * FROM photos WHERE filename='".$_GET['img']."'",$con)); 
					  $info = mysql_fetch_array(mysql_query("SELECT * FROM ".$r['type']." WHERE id='".$r['id']."'",$con));		?>
				<div class="viewMoreLeft">
					<img src='../images/<?php echo $r['filename']; ?>' width='400' height='300'>
				</div>
				<div class="viewMoreLeft">
					<h2>photo info.</h2>
					<table>
					<tr> <td>photographer</td> <td><?php echo $r['photographer']; ?></td> </tr>
					<tr> <td>type</td> <td><?php echo $r['type']; ?></td> </tr>
                    <?php 	if($r['type']=="landscapes"||$r['type']=="nature"||$r['type']=="travel") { echo "<tr> <td>country</td> <td>".$info['info']."</td> </tr>";}
							else if($r['type']=="subject"||$r['type']=="special") { echo "<tr> <td>award</td> <td>".$info['info']."</td> </tr>";}
							else if($r['type']=="portrait") { echo "<tr> <td>model's name</td> <td>".$info['info']."</td> </tr>";}
					?>
					<tr> <td>resolution</td> <td><?php echo $r['resolution']; ?></td> </tr>
					<tr> <td>speed</td> <td><?php echo $r['speed']; ?></td> </tr>
					<tr> <td>aperture</td> <td><?php echo $r['aperture']; ?>F</td> </tr>
					<tr> <td> type</td> <td><?php echo $r['colour']; ?></td> </tr>
					<tr> <td>stock</td> <td><?php echo $r['stock']; ?></td> </tr>
					<tr> <td>price</td> <td><?php echo $r['price']; ?> euro</td> </tr>
					<tr> <td colspan="2" align="center"><a class="ShowPhotosLnk" href="./page_cart.php?add=<?php echo $r['filename']; ?>&prc=<?php echo $r['price']; ?>">add to cart</a></td>  </tr>
					</table>
				</div>
            </div>
            
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>