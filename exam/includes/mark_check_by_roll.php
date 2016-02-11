<?php session_start();
	 include("../db.php");
				
	 $roll       = trim($_POST["roll_id"]); 
	 $class_id   = trim($_POST["class_id"]);
	 $subject_id = trim($_POST["subject_id"]);
	 $branchid   = trim($_POST["branchid"]);				 
	 
	 $chk_str= "select count(*)  from std_class_exam_mark_setting where stu_id=$roll and sub_id='$subject_id' and class_id=$class_id and branch_id=$branchid";
	 $chk_res = mysql_query($chk_str);
	 $chk_cnt = mysql_fetch_row($chk_res);
	 $chk_count = $chk_cnt[0];
	
	 if($chk_count > 0) 
	 {
		 $str = "select subjective_mark,objective_mark,ct_mark,pt_mark,year,period from std_class_exam_mark_setting where stu_id='$roll' and sub_id='$subject_id' and class_id=$class_id and branch_id=$branchid";				 
		 $sql =  mysql_query($str);
		 $res =  mysql_fetch_row($sql);	
		 
		 $sb_mark = $res[0];
		 $ob_mark = $res[1]; 
		 $ct_mark = $res[2];
		 $pt_mark = $res[3];					 
		 $year    = $res[4];
		 $period  = $res[5];
		 
		 echo $sb_mark."|".$ob_mark."|".$ct_mark."|".$pt_mark."|".$year."|".$period;
		 
	}else{			
		echo 0;				 
	}
?>