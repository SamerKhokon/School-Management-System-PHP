<?php   include('db.php');				
	$st_class = trim($_POST['class']);
	$st_roll  = trim($_POST['roll']);
	$st_month = trim($_POST['month']);					
	
	if($st_roll=="" && $st_class=="" && $st_month=="" ) {
		$sql = "SELECT 	`id`,`class_id`,`section_id`,`class_name`,`std_id`, 
		`roll`,`std_name`,`fee_head_name`,`category`,`amount`,`month`, 
		`payment_date`,`group_id`,`branch_id`,`generation_status`,`collection_status`
		 FROM `school`.`std_fee_details`";
	}else if($st_roll!="" && $st_class=="" && $st_month=="" ) {
		$sql = "SELECT 	`id`,`class_id`,`section_id`,`class_name`,`std_id`, 
		`roll`,`std_name`,`fee_head_name`,`category`,`amount`,`month`, 
		`payment_date`,`group_id`,`branch_id`,`generation_status`,`collection_status`
		 FROM `school`.`std_fee_details` where roll=$st_roll";	
	}else if($st_roll=="" && $st_class!="" && $st_month=="") {
		$sql = "SELECT `id`,`class_id`,`section_id`,`class_name`,`std_id`, 
		`roll`,`std_name`,`fee_head_name`,`category`,`amount`,`month`, 
		`payment_date`,`group_id`,`branch_id`,`generation_status`,`collection_status`
		 FROM `school`.`std_fee_details` where class_name='$st_class'";		
	}else if($st_roll=="" && $st_class!="" && $st_month==""){
		$sql = "SELECT 	`id`,`class_id`,`section_id`,`class_name`,`std_id`, 
		`roll`,`std_name`,`fee_head_name`,`category`,`amount`,`month`, 
		`payment_date`,`group_id`,`branch_id`,`generation_status`,`collection_status`
		 FROM `school`.`std_fee_details` where class_name='$st_class'";			    
	}	
?>