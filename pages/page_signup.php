<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>prj360:signup</title>
        <link type="text/css" href="../styles.css" rel="stylesheet" media="screen" />
    </head>
    <body>
    
		<div id="container">
			
			<?php include '../pages/page_navigation.php' ?>
                           
            <div id="context">
            
            <?php 
				if		(isset($_GET['errMIS'])) { echo "<div class='error'>fields are missing.</div>"; } 
				else if	(isset($_GET['errUSR'])) { echo "<div class='error'>username already used.</div>"; }
				else if	(isset($_GET['errADR'])) { echo "<div class='error'>address not valid.</div>"; }
				else if	(isset($_GET['errCRD'])) { echo "<div class='error'>credit card number not valid.</div>"; }
				else if	(isset($_GET['errBAL'])) { echo "<div class='error'>credit card balance not valid.</div>"; }
				else if	(isset($_GET['errEML'])) { echo "<div class='error'>email not valid.</div>"; }  
			?>
            
            <form action="../php/php_signup.php" method="post">
			<table align="center">
				<tr> <td>Username</td> 			<td> <input type="text" id="SignUsr" name="SignUsr" /> </td> </tr>
				<tr> <td>Password</td> 			<td> <input type="password" id="SignPwd" name="SignPwd" /></td> </tr>
				<tr> <td>Email</td> 			<td> <input type="text" id="SignEmail" name="SignEmail" /> </td> </tr>
				<tr> <td>First name</td> 	<td> <input type="text" id="SignFis" name="SignFis" /></td> <td>last name</td><td> <input type="text" id="SignLst" name="SignLst" /></td> </tr>
				<tr> <td>address name</td> 	<td> <input type="text" id="AddrName" name="AddrName" /></td><td>address #</td> <td> <input type="text" id="AddrNum" name="AddrNum" /></td> </tr>
				<tr> <td>Credit Card #</td> 	<td> <input type="text" id="SignCredit" name="SignCredit" /> </td> </tr>
				<tr> <td>Credit card type</td> 	<td colspan="4">  <input type="radio" name="CreditType" value="visa"> VISA
													 <input type="radio" name="CreditType" value="master card"> MASTER CARD
													 <input type="radio" name="CreditType" value="amecican express"> AMERICAN EXPRESS </td> </tr>
				 <tr> <td>Credit Card balance</td> <td><input type="text" name="CreditBal" id="CreditBal"></td></tr>
				<tr> <td colspan="4" align="center"><input type="submit" value="sign up" /></td> </tr>
			</table>
		</form>
            </div>
            
            <?php include '../pages/page_footer.php' ?>
		</div>
        
    </body>
</html>