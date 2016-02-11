<?php  require_once("../db.php");

		$stu_id = trim($_POST["stu_id"]);
		$str = "SELECT stu_name,class_name,class_sec,class_roll,ovr_roll FROM std_class_info WHERE stu_id='$stu_id'";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		$stu_name = $res[0];
		$class = $res[1];
		$class_sec = $res[2];
		$sec_roll = $res[3];
		$class_roll = $res[4];
		
		
		
		$q = "select count(*) from web_std_profile where stu_id='$stu_id'";
		$s = mysql_query($q);
		$r = mysql_fetch_row($s);	
		$c = $r[0];
		
		echo $stu_name."|".$class."|".$class_sec."|".$sec_roll."|".$class_roll."|".$c;
?>