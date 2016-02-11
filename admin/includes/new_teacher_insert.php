<?php    require'../db.php';

	 
	 $name         = trim($_POST['name']);
	 $code_no      = trim($_POST['code_no']);
	 $age          = trim($_POST['age']);
	 $sex          = trim($_POST['sex']);
	 $nation       = trim($_POST['nation']);
	 $dob 		   = trim($_POST['dob']);
	 $marital	   = trim($_POST['marital']);
	 
	 $joining_date = trim($_POST['joining_date']);	 
	 $phone  	   = trim($_POST['phone']); 
	 $mobile 	   = trim($_POST['mobile']);
	 $email  	   = trim($_POST['email']);
	
	 $other 	   = trim($_POST['other']);
	 $pre_add      = trim($_POST['pre_add']); 
	 $par_add 	   = trim($_POST['par_add']);
	 $quality      = trim($_POST['quality']);
	
	 $group 	   = trim($_POST['group']);
	 $subject      = trim($_POST['subject']); 
	 $experi 	   = trim($_POST['experi']);
	
	 $status	   = trim($_POST['status']);	
	 $branch_id    = trim($_POST['branchid']);
	 $teacher_short_name = trim($_POST['short_name']);
	
     $ins_sql="insert into std_teacher_info(`teacher_name`,`Telephone`,`mobile`,	`email`,`Last_education`,`married`,`sex`,`subject`,`group`,`job_experience`,`branch_id`,`teacher_code`,`nationality`,`birth_date`,`age`,`present_add`,`permenent_add`,
	 `present_status`,`joining_date`,`teacher_short_name`) values('$name','$phone','$mobile','$email','$quality','$marital','$sex','$subject','$group','$experi',$branch_id,'$code_no','$nation','$dob',$age,'$pre_add','$par_add','$status','$joining_date','$teacher_short_name')";
		
	
	$r= mysql_query($ins_sql);	
			 		
	if($r)
	{		
		echo "Data saved successfully !!!";
	}
	else
	{		
		 echo "Error";
	}	
?>