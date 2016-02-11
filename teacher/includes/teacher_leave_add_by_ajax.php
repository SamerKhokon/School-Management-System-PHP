<?php   include("../db.php");

	$teacher_id 	  = trim($_POST["teacher_id"]);
	$leave_name   	  = trim($_POST["leave_type"]);
	$leave_from   	  = trim($_POST["leave_from"]);
	$leave_to   	  = trim($_POST["leave_to"]);
	$no_of_days_leave = trim($_POST["no_of_days_leave"]);
	$branch_id 		  = trim($_POST["branch_id"]);
	
	$leave_from	= date("Y-m-d" ,strtotime($leave_from));
	$leave_to 	= date("Y-m-d" ,strtotime($leave_to));	
	$for_month 	= date("Y-m-01",strtotime($leave_from));
	
	$str = "INSERT INTO `tbl_teacher_leave_info`(`teacher_id`,`date_from`,`date_to`,`for_month`,`no_of_days`,`branch_id`)	
	VALUES($teacher_id,'$leave_from','$leave_to','$for_month',$no_of_days_leave, $branch_id)";
	
	$sql = mysql_query($str);	
	if($sql)
		echo "Data Saved successfully";
	else
		echo "Error";	
?>