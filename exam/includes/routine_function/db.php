<?php
//for local	
	$user="root";
	$pass="";
	$host="localhost";
//for server
/*	$user="rukon";
	$pass="rukon";
	$host="120.50.4.93";*/

	mysql_connect($host,$user,$pass) or die("Mysql server connection failed.");
	
	mysql_select_db("school") or die("Mysql Database missing.");
?>