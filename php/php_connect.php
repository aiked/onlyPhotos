<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
		die ('error: connect as root in localhost' . mysql_error());
	
	if (!mysql_select_db("project360", $con))
	{
		if (mysql_query("CREATE DATABASE project360", $con))
		{
			mysql_select_db("project360", $con);
			include 'php_createdb_tables.php';	
			include 'import_photographers.php';
			include 'import_photos.php';
		}
		else
		{ echo "\nError creating database!" .mysql_error(); }
		
	}
?>
			

	