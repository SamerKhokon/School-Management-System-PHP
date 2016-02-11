<?php  require_once('../db.php');

		$class_id         = trim($_POST["class_id"]);
		$section           = trim($_POST['section']);							
		$stu_id     		= trim($_POST["std_id"]);
		$class_roll       = trim($_POST['class_roll']);					
		$active_date    = trim($_POST["tc_date"]);
		$reason	        = trim($_POST["reason"]);
		$remarks		    = trim($_POST["remarks"]);
		$prev_status    = trim($_POST["prev_status"]);
		$branch_id       = trim($_POST["branch_id"]);		
				
		$parse_date = explode("-",$active_date);
		$date            = $parse_date[0];
		$month          = $parse_date[1];
		$year            = $parse_date[2];
		$new_active_date  =  $year.'-'.$month.'-'.$date;
		
		//tc information data insert
		 $insert = "insert into std_tc_info(std_id,class_id,section,class_roll,tc_date,reason,remarks,branch_id) 
		values('$stu_id',$class_id,'$section',$class_roll,'$new_active_date','$reason','$remarks',$branch_id)";
        mysql_query($insert);		
		
		
		//update st profile status
		$update = "update std_profile set st_status='unavailable' where std_id='$stu_id' and adm_class=$class_id and section='$section' and branch_id=$branch_id";
		mysql_query($update);
		
		echo 'Data saved successfully';
?>