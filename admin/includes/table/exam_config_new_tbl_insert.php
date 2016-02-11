<?php session_start();
	require'../db.php';
	$exam_name=$_POST['exam_name'];
	$period_ids=$_POST['period_ids'];
	$academic_year = date('Y');
	$branch_id = $_SESSION['LOGIN_BRANCH'];	
	$sel="select count(*) as chk from std_exam_config_new where academic_year=$academic_year and exam_name='$exam_name'  and period_ids='$period_ids' and branch_id=$branch_id";
	$res1=mysql_query($sel);
	$row1=mysql_fetch_array($res1);
	if($row1['chk']<1)
	{ 	
		$ins_sql="insert into std_exam_config_new set academic_year=$academic_year, exam_name='$exam_name', period_ids='$period_ids',entry_date=now(), flag=1, branch_id=$branch_id";
		mysql_query($ins_sql);
		echo "Your Data Has Been Entered Successfully !!!";
		
	}
	else
	{
		echo "This exam is exist,try again";
	}	
?>