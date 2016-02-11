<?php	require_once('../db.php');		

		$class_id   = trim($_POST["class_id"]);
		$section_id = trim($_POST["section_id"]);
		$std_roll   = trim($_POST["std_roll"]);

        $str = "SELECT stu_name FROM `std_class_student_info` WHERE class_id=$class_id AND sec_id=$section_id AND class_roll=$std_roll";		
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
        echo $res[0];
?>