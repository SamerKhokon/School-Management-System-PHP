<?php  require_once("../db.php");


		$stu_id = trim($_POST["stu_id"]);
		$str = "SELECT class_id,class_sec FROM std_class_info WHERE stu_id='$stu_id'";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		$class_id = $res[0];
		$class_sec = $res[1];
		echo $class_id."|".$class_sec;
?>