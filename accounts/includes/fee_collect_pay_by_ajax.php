<?php	require_once("../db.php");

	$month_year = trim($_POST["month_year"]);
	$stu_id     = trim($_POST["stu_id"]);								
	$branchid   = trim($_POST["branchid"]);

	$parse = explode("-",$month_year);
	$month = $parse[0];
	$year = $parse[1];
	
	$month_date = $year."-".date('m',strtotime($month))."-01";  
	

	$where = " WHERE 1=1 and month='$month_year' and month_date='$month_date' and std_id='$stu_id' and branch_id=$branchid";
	$strs = "SELECT * FROM std_fee_details".$where;
	
	$total = 0;	
	$sql = mysql_query($strs);		
	while ($rs=mysql_fetch_array($sql))
	{
	   $slno              = $rs['id'];
	   $class_id          = $rs['class_id']; 
	   $class_name        = $rs['class_name']; 
	   $std_id            = $rs['std_id']; 
	   $roll              = $rs['roll'];
	   $section_id        = $rs['section_id'];
	   $section           = get_section_name($class_id,$rs['section_id']);
	   $std_name          = $rs['std_name']; 
	   $fee_head_name     = $rs['fee_head_name']; 
	   $category          = $rs['category']; 
	   $amount            = $rs['amount'];
	   $month             = $rs['month'];
	   $collection_status = $rs['collection_status'];
	   $total   += $amount;			
	} 
     $pay_date = date('Y-m-d');
	 
	$chk_str = "SELECT COUNT(*) FROM `school`.`std_fee_collection` 
	WHERE std_id='$std_id' AND class_id=$class_id AND month='$month_year' and month_date='$month_date' and status='paid'";
	
	$chk_sql = mysql_query($chk_str);	
	$chk_res = mysql_fetch_row($chk_sql);
	
		
	if( $chk_res[0]==0 || $chk_res[0]=="" )
	{	
		$update_fee_details = "update `std_fee_details` set collection_status='paid' where class_id=$class_id and std_id='$stu_id' and month='$month_year' and month_date='$month_date' and branch_id=$branchid";
		mysql_query($update_fee_details);		
		
		$update_voucher_summery = "update `std_voucher_summery` set payment_stat='paid' where std_id='$stu_id' and month_date='$month_date' and month='$month_year'";
		mysql_query($update_voucher_summery);		
		
		$update_collection_table = "update std_fee_collection set status='paid' where std_id='$stu_id' and class_id=$class_id and month_date='$month_date' and month='$month_year' and branch_id=$branchid";
		mysql_query($update_collection_table);		
		echo 'Data saved successfully!';
    }
	else
	{
	   echo 'Fee already paid of Student ID'. $stu_id;
	}	
	
	function get_section_name($class_id,$section_id) 
    {
		$str ="SELECT section_name FROM `std_class_section_config` WHERE class_id=$class_id AND id=$section_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return $res[0];	
	}
?>