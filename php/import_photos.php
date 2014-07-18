<?php

	for ($i=1;$i<=3;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('juan','/landscape/land_img".$i.".jpg','landscapes','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1062065681,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO landscapes (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	}
	for ($i=1;$i<=4;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('john','/nature/nat_img".$i.".jpg','nature','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1025434681,126203451))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO nature (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	}
	for ($i=8;$i<=10;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('juan','/special/spec_img".$i.".jpg','special','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(111200081,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO special (id,info) VALUES ('".mysql_insert_id()."','".pick_award()."')",$con);
	}
	for ($i=5;$i<=9;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('michael','/nature/nat_img".$i.".jpg','nature','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1110255681,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO nature (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	}
	for ($i=4;$i<=7;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('ramon','/landscape/land_img".$i.".jpg','landscapes','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1231345681,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO landscapes (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	}
	for ($i=5;$i<=7;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('giannis','/special/spec_img".$i.".jpg','special','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1152855681,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO special (id,info) VALUES ('".mysql_insert_id()."','".pick_award()."')",$con);
	}
	for ($i=8;$i<=10;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('rouggas','/landscape/land_img".$i.".jpg','landscapes','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(11234534581,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO landscapes (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	}
	for ($i=1;$i<=4;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('rouggas','/special/spec_img".$i.".jpg','special','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(115281234,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO special (id,info) VALUES ('".mysql_insert_id()."','".pick_award()."')",$con);
	}
	for ($i=1;$i<=4;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('mariw','/portrait/port_img".$i.".jpg','portrait','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1125534681,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO portrait (id,info) VALUES ('".mysql_insert_id()."','".pick_model()."')",$con);
	}
	for ($i=5;$i<=10;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('panagiou','/portrait/port_img".$i.".jpg','portrait','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1112654681,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO portrait (id,info) VALUES ('".mysql_insert_id()."','".pick_model()."')",$con);
	}

	for ($i=5;$i<=8;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('ludovik','/subject/sub_img".$i.".jpg','subject','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1113245681,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO subject (id,info) VALUES ('".mysql_insert_id()."','".pick_award()."')",$con);
	}
	for ($i=1;$i<=9;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('carlos','/travel/travel_img".$i.".jpg','travel','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1112832481,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO travel (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	}

	for ($i=1;$i<=4;++$i)
	{
		$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('cornelius','/subject/sub_img".$i.".jpg','subject','".create_size()."','".rand(10,100)."','".rand(10,100)."','colourful','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1134458781,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO subject (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	}
	
	$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('cornelius','/black/black_img1.jpg','portrait','".create_size()."','".rand(10,100)."','".rand(10,100)."','black','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1134458781,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO portrait (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
		
	$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('ludovik','/black/black_img2.jpg','landscapes','".create_size()."','".rand(10,100)."','".rand(10,100)."','black','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1134458781,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO landscapes (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('ludovik','/black/black_img3.jpg','nature','".create_size()."','".rand(10,100)."','".rand(10,100)."','black','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1134458781,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO nature (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	
	$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('ramon','/black/black_img4.jpg','travel','".create_size()."','".rand(10,100)."','".rand(10,100)."','black','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1134458781,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO travel (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
	
	$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('juan','/black/black_img5.jpg','subject','".create_size()."','".rand(10,100)."','".rand(10,100)."','black','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1134458781,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO subject (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);
		
	$q="INSERT INTO photos (photographer,filename,type,resolution,speed,aperture,colour,stock,price,date)
					VALUES('rouggas','/black/black_img6.jpg','special','".create_size()."','".rand(10,100)."','".rand(10,100)."','black','".rand(10,100)."','".rand(1,20)."','".date("Y-m-d", rand(1134458781,1262065681))."')";
		mysql_query($q,$con);
		mysql_query("INSERT INTO special (id,info) VALUES ('".mysql_insert_id()."','".pick_country()."')",$con);

?>