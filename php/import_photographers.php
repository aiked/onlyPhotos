<?php

	//Functions
	
	function create_size()
	{
		$size[0]="small";$size[1]="medium";$size[2]="large";
		return $size[rand(0,2)];
	}
	function pick_country() 
	{ 
		$countries[0]="Greece";$countries[1]="United Kingdom";$countries[2]="Italy";$countries[3]="China";$countries[4]="USA";$countries[5]="Kongo";
		return $countries[rand(0,5)]; 
	}
	function pick_model() { $model[0]="Katina";$model[1]="Meropi";$model[2]="Axladia"; return $model[rand(0,2)]; }
	function pick_award() { $award[0]="Turing";$award[1]="Nobel";$award[2]="Oscar"; return $award[rand(0,2)]; }
	
	function crt_addrNam()
	{	$addr[0]="Ikarou";$addr[1]="Boulevard";$addr[2]="1st street";$addr[3]="Bloom"; return $addr[rand(0,3)]; }
			
	$usr[0]="juan";$usr[1]="john";$usr[2]="michael";$usr[3]="ramon";$usr[4]="giannis";$usr[5]="rouggas";
	$usr[6]="mariw";$usr[7]="panagiou";$usr[8]="cornelius";$usr[9]="carlos";$usr[10]="ludovik";
									
	for($j=0;$j<11;++$j)
	{
		$q="INSERT INTO photographer (username,email,name_fis,name_lst,born,nation,addr_nam,addr_num,balance)
					VALUES ('".$usr[$j]."','".$usr[$j]."@onlyphotos.com','".$usr[$j]."','".$usr[$j]."ito','".date("Y-m-d", rand(12800681 + $j*15,772065681-$j*10))."','".pick_country()."','".crt_addrNam()."','".rand(1,40)."',0)";
		mysql_query($q,$con);
		
		$affnum=rand(1,4);
		for($i=0;$i<$affnum;) 
		{
			$affection = $usr[rand(0,10)];
			if( (!mysql_num_rows(mysql_query("SELECT * FROM photographer_affections WHERE username='".$usr[$j]."' AND ph_affection='".$affection."'",$con)))&&($usr[$j]!=$affection) )
			{mysql_query("INSERT INTO photographer_affections (username,ph_affection) VALUES ('".$usr[$j]."','".$affection."')",$con); ++$i; }
		}
	}
		
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
											
	mysql_query("INSERT INTO customer (username,password,email,name_fis,name_lst,addr_nam,addr_num,acc_num,acc_type,acc_bal)
							VALUES('admin','1234','admin@onlyphotos.com','Ramon','Rouggas','island','2','1234123412341234','visa','10000')",$con);
?>