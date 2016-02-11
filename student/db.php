<?php
//for local	
	$user="root";
	$pass="";
	$host="localhost";
//for server
/*	$user="rukon";
	$pass="rukon";
	$host="120.50.4.93";*/

	$con = mysql_connect($host,$user,$pass) or die("Mysql server connection failed.");
	
	mysql_select_db("school",$con) or die("Mysql Database missing.");
?>