<?php	include('db.php');			
		$stu_name		     = trim($_POST['stu_name']);
		$age			     = trim($_POST['age']);
		$sex			     = trim($_POST['sex']);				
		            
		$birthday            = trim($_POST['birthday']);
		$parse               = explode("-",$birthday);
		$dob                 = $parse[2].'-'.$parse[1].'-'.$parse[0];		
		
		$adm_date      		 = trim($_POST['admission_date']);
		$adm_date_parse 	 = explode("-",$adm_date);
		$admission_date 	 = $adm_date_parse[2].'-'.$adm_date_parse[1].'-'.$adm_date_parse[0];		
		
		$class_name		     = trim($_POST['class_name']);
		$section_name	     = trim($_POST['section_name']);	
		$group_name		     = trim($_POST['group_name']);
		$payslip_no		     = trim($_POST['payslip_no']);
		$h_tel			     = trim($_POST['h_tel']);
		
		//$pre_address	     = $_POST['pre_address'];			
		$par_address	     = trim($_POST['par_address']);
		$emer_name1		     = trim($_POST['emer_name1']);
		$emer_mobile1	     = trim($_POST['emer_mobile1']);
		$emer_name2		     = trim($_POST['emer_name2']);
		$emer_mobile2	     = trim($_POST['emer_mobile2']);
		$email			     = trim($_POST['emer_email']);

		$father_name		 = trim($_POST['father_name']);
		$father_rank		 = trim($_POST['father_rank']);
		$father_wrk_address  = trim($_POST['father_wrk_address']);
		$father_income	     = trim($_POST['father_income']);
		$father_wrk_phone    = trim($_POST['father_wrk_phone']);
		$father_cell_phone   = trim($_POST['father_cell_phone']);

		$mother_name	     = trim($_POST['mother_name']);
		$mother_rank	     = trim($_POST['mother_rank']);
		$mother_wrk_phone    = trim($_POST['mother_wrk_phone']);
		$mother_wrk_address  = trim($_POST['mother_wrk_address']);		
		$mother_income	     = trim($_POST['mother_income']);
		$mother_cell_phone   = trim($_POST['mother_cell_phone']);

		$pre_school_name	 = trim($_POST['pre_school_name']);
		$pre_school_add		 = trim($_POST['pre_school_add']);
		$pre_class			 = trim($_POST['pre_class']);
		$pre_class_roll		 = trim($_POST['pre_class_roll']);
		$pre_class_result    = trim($_POST['pre_class_result']);
		$branchid		     = trim($_POST['branchid']);									
		$stu_id 			 = date('Y').$class_name.$section_name; 	
		$year   			 = date('Y');	
		
		$stuid_str  = "SELECT COUNT(*) FROM std_class_info WHERE class_id=$class_name AND class_sec='$section_name'";
		$stuid_sql  = mysql_query($stuid_str);
		$stuid_res  = mysql_fetch_row($stuid_sql);
		$stuid_cnt  = (int)$stuid_res[0]+1;		
		$recent_stu_id = $year.$class_name.$stuid_cnt;
		
		$sql = mysql_query("select class_name from std_class_config where id=$class_name");
		$rs  = mysql_fetch_row($sql);
		$className = $rs[0];
		
		$web_user_password = $recent_stu_id.$section_name.$age;
				
		// current class roll finding 
		$max_classroll_str = "select max(class_roll) from std_class_info where class_id=$class_name and branch_id=$branchid and year='$year' and class_sec='$section_name'";
		$max_classroll_sql = mysql_query($max_classroll_str); 
		$max_classroll_res = mysql_fetch_row($max_classroll_sql);
		$max_classroll = $max_classroll_res[0];
		if($max_classroll==0 || $max_classroll =="") {
			$max_classroll = 1;
		}else {
			$max_classroll = $max_classroll_res[0]+1;
		}		
		
		
		// student web profile data adding
		$insert_std_web_profile = "insert into web_std_profile(`stu_id`,`password`,`name`,`father_name`,`mother_name`, 
		`par_address`,`home_phone`,`emer_name1`,`emer_mobile1`,`emer_name2`,`emer_mobile2`,`mail_add`,`sex`, 
		`age`,`adm_date`,`dob`,`adm_class`,`adm_group`,`section`,`father_income`,`mother_income`,`father_profession`, 
		`mother_profession`,`father_work_phone`,`mother_work_phone`,`priv_schoole_name`,`priv_school_add`,`priv_school_class`,
		`priv_school_class_roll`,`priv_school_result`,`branch_id`) 	values('$recent_stu_id','$web_user_password','$stu_name','$father_name','$mother_name','$par_address','$father_cell_phone',
		'$emer_name1','$emer_mobile1','$emer_name2','$emer_mobile2','$email','$sex',$age,'$admission_date','$dob','$className','$group_name',
		'$section_name','$father_income','$mother_income','$father_rank','$mother_rank','$father_wrk_phone','$mother_wrk_phone',
		'$pre_school_name','$pre_school_add','$pre_class','$pre_class_roll','$pre_class_result',$branchid)";		
		
		mysql_query($insert_std_web_profile);
		
				
		
		// data insert into profile table		
		$insrt_sql = "INSERT INTO `school`.`std_profile`(`stu_id`,`name`,`father_name`,`mother_name`,`par_address`, 
		`home_phone`,`emer_name1`,`emer_mobile1`,`emer_name2`,`emer_mobile2`,`mail_add`, 
		`sex`,`age`,`adm_date`,`dob`,`adm_class`,`adm_class_roll`,`adm_group`,`section`,`father_income`,`mother_income`,`father_profession`,`mother_profession`, 
		`father_qualification`,`mother_qualification`,`father_work_phone`,`mother_work_phone`,`admission_fee`,`priv_schoole_name`,`priv_school_add`,`priv_school_class`,
		`priv_school_class_roll`,`priv_school_remarks`, `priv_school_result`,`present_class`, `present_class_roll`, `st_status`,`branch_id`)	
		VALUES('$recent_stu_id','$stu_name','$father_name','$mother_name','$par_address', '$h_tel','$emer_name1','$emer_mobile1','$emer_name2','$emer_mobile2','$email','$sex','$age','$adm_date','$dob','$class_name','custom', '$group_name','$section_name','$father_income','$mother_income','$father_rank','$mother_rank','custom','custom', 
		'$father_wrk_phone','$mother_wrk_phone','custom','$pre_school_name','$pre_school_add', '$pre_class','$pre_class_roll','custom','$pre_class_result','$className','custom','available','$branchid');";		
   
	    mysql_query($insrt_sql);	
		
		
        $section_id = find_section_id($section_name,$class_name);	
         // std_class_student_info
        $std_student_info_str = "INSERT INTO `school`.`std_class_student_info`(`class_id`,`sec_id`,`class_name`,`class_sec`,`stu_id`,`stu_name`,	`class_roll`, 
		`stuts`,`year`,`branch_id`)
		VALUES($class_name,$section_id,'$className','$section_name','$recent_stu_id','$stu_name',$max_classroll,'Admitted','$year',$branchid)";
        mysql_query($std_student_info_str);
		
		
		//data insert into std_class_info table
		$class_info_add = "INSERT INTO `school`.`std_class_info`
		(`class_id`,`class_name`,`class_sec`,`stu_id`,`stu_name`,`class_roll`,`year`,`branch_id`) 
		VALUES($class_name,'$className','$section_name',$recent_stu_id,'$stu_name',$max_classroll,'$year',$branchid)";	
		mysql_query($class_info_add);	
		
		echo 'Data submitted successfully!';
		
		
		
		function find_section_id($sec,$class_id) {
		    $str = "SELECT id FROM `std_class_section_config` WHERE section_name='$sec' AND class_id=$class_id";
			$sq =  mysql_query($str);
			$r = mysql_fetch_row($sq);
			return $r[0];
		}
?>