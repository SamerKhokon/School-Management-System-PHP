<?php   require'../db.php';	 	 

	$class_id      = trim($_POST['class_name']);
    $sec_name      = trim($_POST['section_name']);
	$teacher_id    = trim($_POST['teacher_id']);
	$sub_id        = trim($_POST['sub_id']);
	$total_student = trim($_POST['total_stu']);
	$branchid      = trim($_POST['branchid']);	
	$section_system = trim($_POST['section_system']);

    $cls = mysql_query("select class_name from std_class_config where id=$class_id and branch_id=$branchid");
	$res = mysql_fetch_array($cls);
	$class_name=$res['class_name'];
	 
	$tecid=mysql_query("select teacher_name from std_teacher_info where id=$class_id and branch_id=$branchid");
	$re=mysql_fetch_array($tecid);
	$teacher_name=$re['teacher_name'];
	 
	$subid=mysql_query("select subject_name from std_subject_config where id=$sub_id and branch_id=$branchid");
	$r=mysql_fetch_array($subid);
	$subject_name=$r['subject_name'];	
	
	$sel  = "select count(*) as chk from std_class_section_config where class_id='$class_id' and section_name='$sec_name' and branch_id='$branchid'";
	$res1 = mysql_query($sel);
	$row1 = mysql_fetch_array($res1);
	
	if($row1['chk']<1)	
	{ 	
		//$ins_sql = "insert into std_class_section_config set class_id='$class_id',class_name='$class_name',section_name='$sec_name',class_teacher_id='$teacher_id',  class_teacher_name='$teacher_name',subject_id='$sub_id',subject_name='$subject_name',no_of_student='$total_student',branch_id='$branchid'";			

		$ins_sql = "insert into std_class_section_config(class_id,class_name,section_name,class_teacher_id,class_teacher_name,subject_id,subject_name,no_of_student,branch_id,section_system) 
		values($class_id,'$class_name','$sec_name',$teacher_id,'$teacher_name',$sub_id,'$subject_name',$total_student,$branchid,'$section_system')";		
		$result  = mysql_query($ins_sql);
		if($result)	
		{
		  echo "Your data hasbeen entered successfully !!!";
		}		
	}else{
	   echo "Data is already exist!!!";
	}
?>