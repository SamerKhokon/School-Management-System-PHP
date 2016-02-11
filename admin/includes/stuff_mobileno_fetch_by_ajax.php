<?php	require_once("../db.php");
	   $stuff_type = trim($_POST['stuff_type']);
	   if($stuff_type=="Teacher") 
	   {
	      $str = "SELECT mobile FROM std_teacher_info";
	   }
	   else if($stuff_type == "Employee") 
	   {
	      $str = "SELECT mobile FROM std_teacher_info";
	   }
	   
	   $sql = mysql_query($str);
	   $mob = "";
	   while($rs = mysql_fetch_array($sql)) {
	      $mob .= $rs[0].',';
	   }
	   echo substr($mob,0,strlen($mob)-1);
?>