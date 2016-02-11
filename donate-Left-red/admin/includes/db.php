<?php
//for local	
	$user="root";
	$pass="";
	$host="localhost";

	mysql_connect($host,$user,$pass) or die("Mysql server connection failed.");
	
	mysql_select_db("system_db") or die("Mysql Database missing.");
?>