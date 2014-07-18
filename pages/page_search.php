<?php 
include '../php/php_connect.php'; 
$photographers = mysql_query("SELECT username,name_fis,name_lst FROM photographer",$con);

$sql_search = "SELECT filename,price FROM photos";
$sql_category = "";
$sql_attr = "";
$sql_photographer= "";
$q_cmp="";
$criteria = array();

foreach($_POST as $nm => $vl)
{
	$input = explode('_',$nm);
	//Category
	if ( (isset($vl))&&($vl=="yes"))
	{ ($sql_category =="")?($sql_category=$sql_category."type='".$input[1]."'"):($sql_category=$sql_category." OR type='".$input[1]."'"); }
	//Photographers
	else if ( (isset($vl))&&($nm=="phGrapher")&&!empty($vl))
	{ $sql_photographer = "( photographer = '".$vl."' )"; }	
	//Attributes-resolution
	else if ((isset($vl))&&(!empty($vl))&&($input[0]=="res"))
	{($sql_attr =="")?($sql_attr=$sql_attr."resolution='".$vl."'"):($sql_attr=$sql_attr." AND resolution='".$vl."'"); }
	else if ((isset($vl))&&(!empty($vl))&&($input[0]=="colour"))
	{($sql_attr =="")?($sql_attr=$sql_attr."colour='".$vl."'"):($sql_attr=$sql_attr." AND colour='".$vl."'"); }
	//Attributes
	else if( (isset($vl))&&(!empty($vl))&&(sizeof($input)>1)&&(($input[1]=="Min")||($input[1]=="Max")) )
	{
		if($input[1]=="Min") //Minimum
		{ ( $sql_attr=="")?($sql_attr=$sql_attr.$input[0]." > ".$vl." " ):($sql_attr=$sql_attr."AND ".$input[0]." > ".$vl." "); }
		else // Maximum
		{ ( $sql_attr=="")?($sql_attr=$sql_attr.$input[0]." < ".$vl." " ):($sql_attr=$sql_attr."AND ".$input[0]." < ".$vl." "); }
	}
}

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

if( ($sql_category!="")||($sql_attr!="")||($sql_photographer!="")||($q_cmp!="") )
{ $sql_search = $sql_search." WHERE "; }

if(($sql_category!="")) { $sql_category = "( ".$sql_category." )"; array_push($criteria,$sql_category);  }
if(($sql_attr!="")) { $sql_attr = "( ".$sql_attr." )"; array_push($criteria,$sql_attr);  }
if(($sql_photographer!="")) { array_push($criteria,$sql_photographer); }
if(($q_cmp!="")) { array_push($criteria,$q_cmp); }

for ( $i=0;$i<count($criteria);++$i )
{
	if ($i==0) { $sql_search = $sql_search.$criteria[$i]; }
	else { $sql_search = $sql_search." AND ".$criteria[$i]; }
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:search</title>
		<link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
		<script type="text/javascript" src="../library.js"></script>
		<script>
			function init()
			{ displayDate('minDay','minMonth','minYear');displayDate('maxDay','maxMonth','maxYear'); }
		</script>
    </head>
    <body onload="init()">
    
		<div id="container">
			
            <?php include '../pages/page_navigation.php' ?>
                              
            <div id="context">
				<div class="seachAttr">
					<form action="../pages/page_search.php" method="post">
					
					<table class="searchLeft">
					<th>search by category:</th>
					<tr> <td><input type="checkbox" name="tp.landscapes" value="yes">landscapes</td></tr>
					<tr><td><input type="checkbox" name="tp.subjects" value="yes">subjects</td> </tr>
					<tr> <td><input type="checkbox" name="tp.portrait" value="yes">portrait</td></tr>
					<tr><td><input type="checkbox" name="tp.special" value="yes">special</td> </tr>
					<tr> <td><input type="checkbox" name="tp.travel" value="yes">travel</td></tr>
					<tr><td><input type="checkbox" name="tp.nature" value="yes">nature</td> </tr>
					
					</table>
					<table class="searchRight">
					<th colspan="5" align="left">search by other options:</th>
						<tr><td>by photographer</td>
						<td colspan="4" class="cartTable"> <select name="phGrapher"> 
						<?php 
							echo "<option value=''></option>";
							while($row=mysql_fetch_array($photographers)) 
							{ echo "<option value='".$row['username']."'>".$row['name_fis']." ".$row['name_lst']."</option>"; } 
						?>
						</select></td>
						<tr><td>resolution</td>
							<td colspan="4"><input type="radio" name="res.img" value="small">small
											<input type="radio" name="res.img" value="medium">medium
											<input type="radio" name="res.img" value="large">large</td></tr>
						<tr><td>colour</td>
							<td colspan="4"><input type="radio" name="colour.img" value="colourful">coloured
											<input type="radio" name="colour.img" value="black">monochrome
											</td></tr>
						<tr><td class="srhNames">speed</td><td>min</td><td><input size="5" type="text" name="speed.Min"></td><td>max</td><td><input size="5" type="text" name="speed.Max"></td></tr>
						<tr><td class="srhNames">aperture</td><td>min</td><td><input size="5" type="text" name="aperture.Min"></td><td>max</td><td><input size="5" type="text" name="aperture.Max"></td></tr>
						<tr><td class="srhNames">price</td><td>min</td><td><input size="5" type="text" name="price.Min"></td><td>max</td><td><input size="5" type="text" name="price.Max"></td></tr>
						<tr><td class="srhNames">stock</td><td>min</td><td><input size="5" type="text" name="stock.Min"></td><td>max</td><td><input size="5" type="text" name="stock.Max"></td></tr>
						<tr><td colspan="5" align="center"><input type="submit" value="search" /></td></tr>
					</table>
					
					<table align="center">
					   		<th colspan="12">search date</th>
							<tr> <td  style="text-align:center;"><b>from:</b></td>  </tr>
							<tr><td><select name='minDay' id='minDay'></select><select name='minMonth' id='minMonth'></select><select name='minYear' id='minYear'></select></td></tr>
							<tr><td style="text-align:center;"><b>to:</b></td></tr>
							<tr><td><select name='maxDay' id='maxDay'></select><select name='maxMonth' id='maxMonth'></select><select name='maxYear' id='maxYear'></select></td></tr>
					<?php 
					?>
					</table>
					
					</form>
				</div>
				
				<div class="searchResult">
				<?php 		
				if (($result = mysql_query($sql_search)))
				{
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
				}
				?>
				
				</div>
            </div>
            
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>
<?

?>