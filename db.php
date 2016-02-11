<?php
//for local	
	$user="root";
	$pass="";
	$host="localhost";

	$con = mysql_connect("localhost","root","") or die("Mysql server connection failed.");	
	mysql_select_db("school",$con) or die("Mysql Database missing.");
?>