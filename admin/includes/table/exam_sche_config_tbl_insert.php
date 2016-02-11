<?php
     require'../db.php';
	 
	 $class_name   =$_POST['classname'];
	 $exam_name    =$_POST['exam_name'];
	 $period       =$_POST['period'];
	 $sub_name     =$_POST['sub_name'];
	 $date_from    =$_POST['date_from'];
	 $class_hour_s =$_POST['class_hour_s'];
	 $class_min_s  =$_POST['class_min_s']; 
	 $class_hour_e =$_POST['class_hour_e'];
	 $class_min_e  =$_POST['class_min_e'];
	
	 $branch_id=$_POST['branch_id'];
	
	
	
	$time_start=$class_hour_s.":".$class_min_s;
	$time_end=$class_hour_e.":".$class_min_e;
	
	  
	$cls_id=mysql_query("select id from std_class_config where class_name='$class_name'");
	$row=mysql_fetch_array($cls_id);
	$class_id=$row['id'];
	
	
	$s_id=mysql_query("select id from std_subject_config where subject_name='$sub_name'"); 
	$row2=mysql_fetch_array($s_id);
	$subj_id=$row2['id'];
	
	
	$sel="select count(*) as chk from std_exam_schedule where class_id='$class_id' and subject_id='$subj_id' and branch_id='$branch_id' and exam_name='$exam_name'";
$res1=mysql_query($sel);
$row1=mysql_fetch_array($res1);

if($row1['chk']<1)

{ 
	
	 
	  
  $ins_sql="insert into std_exam_schedule set class_id='$class_id',class_name='$class_name',exam_name='$exam_name',period='$period',subject_id='$subj_id',subject_name='$sub_name',exam_date='$date_from',exam_start_time='$time_start',exam_end_time='$time_end',branch_id='$branch_id'";
		$r=mysql_query($ins_sql);
		
		
		if($r)
		{
		
		echo "<p class=\"msg done\">Your data hasbeen entered successfully !!!</p>";
		}
		else
		
		{
		
		 echo "error";
		}
		
	}
	else
	{
	  echo "this subject is fixed in that due date";
	
	}	
	


    



?>