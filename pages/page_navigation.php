<?php 
	if(!session_start()){ session_start(); }
	header( 'Content-Type: text/html; charset=utf-8' );
?>
<div id="navigation" align="center">
	<h1>Welcome to @onlyPhotos  <?php if(isset($_SESSION['username'])) 
								{ 
									echo $_SESSION['username']."</h1>"; 
									echo "<a class='navLink' href='../pages/page_prfCustomer.php'>home</a>";
									echo "<a class='navLink' href='../pages/page_viewPhotos.php'>view all photos</a>";
									echo "<a class='navLink' href='../pages/page_viewPhGraphers.php'>view all photographers</a>";
									echo "<a class='navLink' href='../pages/page_search.php'>search photos</a>";
									echo "<a class='navLink' href='../pages/page_cart.php'>shopping cart</a>";
									echo "<a class='navLink' href='../php/php_logout.php'>logout</a>";
								
								} 
								else
								{
									echo "</h1>";
									echo "<a class='navLink' href='/project360/index.php'>home</a>";
									echo "<a class='navLink' href='/project360/pages/page_signup.php'>sign up</a>";
								}
								?> 
</div>