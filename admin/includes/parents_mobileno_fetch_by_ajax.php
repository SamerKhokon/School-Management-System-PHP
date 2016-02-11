<?php	require_once("../db.php");
	   $class_id = trim($_POST['class_id']);
	   $str = "SELECT father_work_phone FROM std_profile WHERE adm_class=$class_id";
	   $sql = mysql_query($str);
	   $mob = "";
	   while($rs = mysql_fetch_array($sql)) {
	      $mob .= $rs[0].',';
	   }
	   echo substr($mob,0,strlen($mob)-1);
?>