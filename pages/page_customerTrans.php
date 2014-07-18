<?php include '../php/php_connect.php'; ?>
<?php
	$q_cmp="";
	
	if	(isset($_POST['minDay'])&&isset($_POST['minMonth'])&&isset($_POST['minYear'])&&
		isset($_POST['maxDay'])&&isset($_POST['maxMonth'])&&isset($_POST['maxYear'])&&
		($_POST['minDay']!="")&&($_POST['minMonth']!="")&&($_POST['minYear']!="")&&
		($_POST['maxDay']!="")&&($_POST['maxDay']!="")&&($_POST['maxDay']!="")
		)
	{
		$q_cmp = "( date >= '".$_POST['minYear']."-".$_POST['minMonth']."-".$_POST['minDay']."' 
				AND date <= '".$_POST['maxYear']."-".$_POST['maxMonth']."-".$_POST['maxDay']."' )"; 
	}
	else if (isset($_POST['minDay'])&&isset($_POST['minMonth'])&&isset($_POST['minYear'])&&
			($_POST['minDay']!="")&&($_POST['minMonth']!="")&&($_POST['minYear']!=""))
	{ $q_cmp = "( date >= '".$_POST['minYear']."-".$_POST['minMonth']."-".$_POST['minDay']."' )"; }
	else if (isset($_POST['maxDay'])&&isset($_POST['maxMonth'])&&isset($_POST['maxYear'])&&
			($_POST['maxDay']!="")&&($_POST['maxMonth']!="")&&($_POST['maxYear']!=""))
	{ $q_cmp = "( date <= '".$_POST['maxYear']."-".$_POST['maxMonth']."-".$_POST['maxDay']."' )"; }
	echo $q_cmp;
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:prfCustomer</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
		<script type="text/javascript" src="../library.js"></script>
		<script>
			function init()
			{ displayDate('minDay','minMonth','minYear');displayDate('maxDay','maxMonth','maxYear'); }
		</script>
    </head>
	
    <body onLoad="init()">
		<div id="container">
			  <?php include '../pages/page_navigation.php' ?>
			<div id="context">
			<form action="../pages/page_customerTrans.php" method="post">
				<table align="center">
					   		<th colspan="12">search date</th>
							<tr> <td  style="text-align:center;"><b>from:</b></td><td style="text-align:center;"><b>to:</b></td> </tr>
							<tr>
								<td>
									<select name='minDay' id='minDay'></select><select name='minMonth' id='minMonth'></select><select name='minYear' id='minYear'></select>
								</td>
								<td>
									<select name='maxDay' id='maxDay'></select><select name='maxMonth' id='maxMonth'></select><select name='maxYear' id='maxYear'></select>
								</td>
							</tr>
					<?php 
					?>
				</table>
				<tr><td colspan="5" align="center"><input type="submit" value="search" /></td></tr>
			  </form>
			  
			  <table align="center">
			  <th class='history' >transaction id</th><th class='history'>photo</th><th class='history'>customer</th><th class='history'>date</th>
			  <th class='history'>quantity</th><th class='history'>total in &#8364</th>
			  <?php  
					$total_price=0;
					$total_quan = 0;
					$sql_date = "SELECT DISTINCT  t.*, ct.photo_quan,ct.photo_amount,ct.photo_id FROM transactions t , complete_transactions ct WHERE t.customer = '".$_SESSION['username']."' 
						AND ct.customer = '".$_SESSION['username']."'AND t.id = ct.trans_id ";
					if($q_cmp!=""){ $sql_date = $sql_date." AND ".$q_cmp; } 
					if (($res = mysql_query($sql_date)))
					{
						while($r = mysql_fetch_array($res))
						{
							 $total_price += $r['photo_amount']; $total_quan += $r['photo_quan'];
							 $ph = mysql_fetch_array( mysql_query("SELECT filename FROM photos WHERE id=".$r['photo_id'],$con) );
							 echo "<tr> <td class='history'>".$r['id']."</td> <td class='history'><a href='./page_viewMore.php?img=".$ph['filename']."'><img src='../images/".$ph['filename']."' width='70' height='70'></a></td>";
							 echo "<td class='history'>".$r['customer']."</td> <td class='history'>".$r['date']."</td> <td class='history'>".$r['photo_quan']."</td> <td class='history'>".$r['photo_amount']."</td> </tr>";
						}
					}
			  ?>
			  <tr><td colspan="4" style="text-align:right;"> total </td><td class='history'> <?php  echo $total_quan; ?></td><td class='history'> <?php echo $total_price; ?>&#8364</td> </tr>
			  </table>
			</div>
			<?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>