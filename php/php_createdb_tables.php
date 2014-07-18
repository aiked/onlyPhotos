<?php
	date_default_timezone_set('Europe/Athens');
	
	$sql_customer = "CREATE TABLE customer( 	
										username varchar(15) NOT NULL,
										password varchar(15) NOT NULL,  
										email    varchar(25) NOT NULL,
										name_fis varchar(15) NOT NULL,
										name_lst varchar(15) NOT NULL,
										addr_nam varchar(15) NOT NULL,
										addr_num smallint NOT NULL,
										acc_num  varchar(18) NOT NULL,
										acc_type varchar(16) NOT NULL,
										acc_bal int NOT NULL,
										PRIMARY KEY(username) 
									)";	
													
	$sql_cust_affections = "CREATE TABLE cust_interests(
										id 		 	 smallint NOT NULL AUTO_INCREMENT,
										username 	 varchar(15) NOT NULL,
										interest 	varchar(15) NOT NULL,
										PRIMARY KEY(id),
										FOREIGN KEY (username) REFERENCES customer(username)
									)";
									
	$sql_photographer =  "CREATE TABLE photographer(
										username varchar(15) NOT NULL, 
										email    varchar(25) NOT NULL,
										name_fis varchar(15) NOT NULL,
										name_lst varchar(15) NOT NULL,
										born     DATE	 NOT NULL,
										nation   varchar(15) NOT NULL,
										addr_nam varchar(15) NOT NULL,
										addr_num smallint NOT NULL,
										balance int NOT NULL,
										PRIMARY KEY(username) 
									)";
									
	 $sql_ph_affections = "CREATE TABLE photographer_affections(
										id 		 	 smallint NOT NULL AUTO_INCREMENT,
										username 	 varchar(15) NOT NULL,
										ph_affection varchar(15) NOT NULL,
										PRIMARY KEY(id),
										FOREIGN KEY (username) REFERENCES photographer(username)
									)";
									
	$sql_photos =  "CREATE TABLE photos(
										id int NOT NULL AUTO_INCREMENT,
										photographer varchar(15) NOT NULL,
										filename varchar(25) NOT NULL,
										type varchar(12) NOT NULL,
										resolution varchar(10) NOT NULL, 
										speed    SMALLINT NOT NULL,
										aperture SMALLINT NOT NULL,
										colour   VARCHAR(9) NOT NULL,
										stock INT NOT NULL,
										price INT NOT NULL,
										popularity int NOT NULL,
										date DATE NOT NULL,
										PRIMARY KEY (id),
										FOREIGN KEY (photographer) REFERENCES photographer(username),
										CHECK (stock>0)
									)";
									
	$sql_landscapes = "CREATE TABLE landscapes(
										id int NOT NULL,
										info VARCHAR(20) NOT NULL,
										PRIMARY KEY(id),
										FOREIGN KEY (id) REFERENCES photos(id)
									)";
	$sql_nature = "CREATE TABLE nature(
										id int NOT NULL,
										info VARCHAR(20) NOT NULL,
										PRIMARY KEY(id),
										FOREIGN KEY (id) REFERENCES photos(id)
									)";
	$sql_subject = "CREATE TABLE subject(
										id int NOT NULL,
										info VARCHAR(20) NOT NULL,
										PRIMARY KEY(id),
										FOREIGN KEY (id) REFERENCES photos(id)
									)";
	$sql_portrait = "CREATE TABLE portrait(
										id int NOT NULL,
										info VARCHAR(20) NOT NULL,
										PRIMARY KEY(id),
										FOREIGN KEY (id) REFERENCES photos(id)
									)";
	$sql_travel = "CREATE TABLE travel(
										id int NOT NULL,
										info VARCHAR(20) NOT NULL,
										PRIMARY KEY(id),
										FOREIGN KEY (id) REFERENCES photos(id)
									)";
	$sql_special = "CREATE TABLE special(
										id int NOT NULL,
										info VARCHAR(20) NOT NULL,
										PRIMARY KEY(id),
										FOREIGN KEY (id) REFERENCES photos(id)
									)";				
		$sql_transactions = "CREATE TABLE transactions (
										id 	int 		NOT NULL AUTO_INCREMENT,
										customer varchar(15) NOT NULL,
										date 			DATETIME NOT NULL,
										amount  		int NOT NULL,
										quantity		int NOT NULL,
										PRIMARY KEY (id),
										FOREIGN KEY (customer) REFERENCES customer(username)
									)";									

	$sql_comp_transactions = "CREATE TABLE complete_transactions (
										id 	int 		NOT NULL AUTO_INCREMENT,
										customer 		varchar(15) NOT NULL,
										photo_id 		int 	NOT NULL,
										trans_id 		int NOT NULL,
										photo_amount  	int NOT NULL,
										photo_quan		int NOT NULL,
										PRIMARY KEY (id),
										FOREIGN KEY (photo_id) REFERENCES photos(id),
										FOREIGN KEY (trans_id) REFERENCES transactions(id),
										FOREIGN KEY (customer) REFERENCES customer(username)
									)";
										


	 mysql_query($sql_customer, $con);	
	 mysql_query($sql_cust_affections, $con);
	 mysql_query($sql_photographer, $con);
	 mysql_query($sql_ph_affections, $con);
	 mysql_query($sql_photos, $con);
	 
	 	// trans_id 		int NOT NULL,
										// photo_id 		int NOT NULL,
										// customer varchar(15) NOT NULL,
										// photo_price 	int NOT NULL,
										// photo_quan		int NOT NULL,
										// FOREIGN KEY (photo_id) REFERENCES photos(id),
										// FOREIGN KEY (customer) REFERENCES customer(username),
										// FOREIGN KEY (trans_id) REFERENCES transactions(id)
	 mysql_query($sql_landscapes, $con);
	 mysql_query($sql_nature, $con);
	 mysql_query($sql_special, $con);
	 mysql_query($sql_portrait, $con);
	 mysql_query($sql_subject, $con);
	 mysql_query($sql_travel, $con);
	 
	 mysql_query($sql_transactions, $con);
	 mysql_query($sql_comp_transactions, $con);	
	 	
	 
?>