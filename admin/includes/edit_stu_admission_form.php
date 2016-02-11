<?php	include('../db.php');

	     error_reporting(0);
		$stu_name			= trim($_POST['stu_name']);
		$age				= trim($_POST['age']);
		$sex				= trim($_POST['sex']);			
		$dob   				= trim($_POST['birthday']);				
		$adm_date  	    	= trim($_POST['adm_date']);
		$class_name		    = trim($_POST['class_name']);
		$section_name	    = trim($_POST['section_name']);	
		$group_name		    = trim($_POST['group_name']);
		$payslip_no		    = trim($_POST['payslip_no']);
		$h_tel			    = trim($_POST['h_tel']);		
		
		$par_address	    = trim($_POST['par_address']);
		$emer_name1		    = trim($_POST['emer_name1']);
		$emer_mobile1	    = trim($_POST['emer_mobile1']);
		$emer_name2		    = trim($_POST['emer_name2']);
		$emer_mobile2	    = trim($_POST['emer_mobile2']);
		$email			    = trim($_POST['emer_email']);

		$father_name		= trim($_POST['father_name']);
		$father_rank		= trim($_POST['father_rank']);
		$father_wrk_address = trim($_POST['father_wrk_address']);
		$father_income	    = trim($_POST['father_income']);
		$father_wrk_phone   = trim($_POST['father_wrk_phone']);
		$father_cell_phone  = trim($_POST['father_cell_phone']);

		$mother_name	    = trim($_POST['mother_name']);
		$mother_rank	    = trim($_POST['mother_rank']);
		$mother_wrk_phone   = trim($_POST['mother_wrk_phone']);
		$mother_wrk_address = trim($_POST['mother_wrk_address']);		
		$mother_income	    = trim($_POST['mother_income']);
		$mother_cell_phone  = trim($_POST['mother_cell_phone']);

		$pre_school_name	= trim($_POST['pre_school_name']);
		$pre_school_add		= trim($_POST['pre_school_add']);
		$pre_class			= trim($_POST['pre_class']);
		$pre_class_roll		= trim($_POST['pre_class_roll']);
		$pre_class_result   = trim($_POST['pre_class_result']);
		$branchid		    = trim($_POST['branchid']);						
			
    $stu_id = date('Y').$class_name.$section_name; 	
	$year = date('Y');	
	
	$stuid_str= "SELECT COUNT(*) FROM std_class_info WHERE class_id=$class_name AND class_sec='$section_name'";
	$stuid_sql = mysql_query($stuid_str);
	$stuid_res = mysql_fetch_row($stuid_sql);
	$stuid_cnt = (int)$stuid_res[0]+1;
	
	$recent_stu_id = $year.$class_name.$stuid_cnt;
	
	$sql = mysql_query("select class_name from std_class_config where id=$class_name");
	$rs  = mysql_fetch_row($sql);
	$className = $rs[0];
	
    $insrt_sql = 
	"INSERT INTO `school`.`std_profile`(`stu_id`,`name`,`father_name`,`mother_name`,`par_address`, 
	`home_phone`,`emer_name1`,`emer_mobile1`,`emer_name2`,`emer_mobile2`,`mail_add`, 
	`sex`,`age`,`adm_date`,`dob`,`adm_class`,`adm_class_roll`,`adm_group`, 
	`section`,`father_income`,`mother_income`,`father_profession`,`mother_profession`, 
	`father_qualification`,`mother_qualification`,`father_work_phone`,`mother_work_phone`, 
	`admission_fee`,`priv_schoole_name`,`priv_school_add`,`priv_school_class`,
	`priv_school_class_roll`,`priv_school_remarks`, 
	`priv_school_result`,`present_class`, `present_class_roll`, 
	`st_status`,`branch_id`)
	VALUES('$recent_stu_id','$stu_name','$father_name','$mother_name','$par_address', 
	'$h_tel','$emer_name1','$emer_mobile1','$emer_name2','$emer_mobile2', 
	'$email','$sex','$age','$adm_date','$dob','$class_name','custom', 
	'$group_name','$section_name','$father_income','$mother_income', 
	'$father_rank','$mother_rank','custom','custom', 
	'$father_wrk_phone','$mother_wrk_phone','custom','$pre_school_name','$pre_school_add', 
	'$pre_class','$pre_class_roll','custom','$pre_class_result','$className','custom', 
	'custom','$branchid');";
	 
	
	 mysql_query($insrt_sql);
	
	$class_info_add = "INSERT INTO `school`.`std_class_info`
	(`class_id`,`class_name`,`class_sec`,`stu_id`,`stu_name`,`year`,`branch_id`) 
	VALUES($class_name,'$className','$section_name',$recent_stu_id,'$stu_name','$year',$branchid)";
	
	mysql_query($class_info_add);
	echo 'Data saves successfully!!!';

?>