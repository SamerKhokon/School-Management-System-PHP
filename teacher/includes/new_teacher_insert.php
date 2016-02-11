<?php    require'db.php';	 
	 $name       = $_POST['name'];
	 $code_no    = $_POST['code_no'];
	 $age        = $_POST['age'];
	 $sex        = $_POST['sex'];
	 $nation     = $_POST['nation'];
	 $dob 		 = $_POST['dob'];
	 $phone  	 = $_POST['phone']; 
	 $mobile 	 = $_POST['mobile'];
	 $email  	 = $_POST['email'];
	
	 $marital	 = $_POST['marital'];
	
	 $other 	= $_POST['other'];
	 $pre_add   = $_POST['pre_add']; 
	 $par_add 	= $_POST['par_add'];
	 $quality   = $_POST['quality'];
	
	 $group 	= $_POST['group'];
	 $subject   = $_POST['subject']; 
	 $experi 	= $_POST['experi'];
	
	 $status	= $_POST['status'];	
	 $branch_id = $_POST['branchid'];
	 
	
	/* //$teacherid    = $_POST['teacherid'];
	 $basic_salary = $_POST['basic_salary'];
	 $medical      = $_POST['medical'];  
	 $house_rent   = $_POST['house_rent'];
	 $others       = $_POST['others']; */
	 
	 //$teacherid ,$basic_salary, $medical , $others ;
	
    $ins_sql="insert into std_teacher_info(`teacher_name`,`Telephone`,`mobile`,	`email`,`Last_education`,`married`,`sex`,`subject`,`group`,`job_experience`,`branch_id`,`teacher_code`,`nationality`,`birth_date`,`age`,`present_add`,`permenent_add`,
	`present_status`) values('$name','$phone','$mobile','$email','$quality','$marital','$sex','$subject','$group','$experi',$branch_id,'$code_no','$nation','$dob',$age,'$pre_add','$par_add','$status')";
		
	$r= mysql_query($ins_sql);
	
	/*
	  //employee_salary_structure table data
	$date = date('Y-m-d');	
	$instr = "INSERT INTO `school`.`tbl_emp_salary_sturcture`(`empid`, 
	`name`,`category`,`basic`,`medical`,`house_rent`,`others`,`branchid`,`update_date`)
	VALUES('$code_no','$name','Teacher',$basic_salary,$medical,$house_rent,$others,'$branch_id','$date')";
	mysql_query($instr);
	*/
	
			 		
	if($r){		
		echo "<p class=\"msg done\">Your data hasbeen entered successfully !!!</p>";
	}else{		
		 echo "error";
	}	
?>