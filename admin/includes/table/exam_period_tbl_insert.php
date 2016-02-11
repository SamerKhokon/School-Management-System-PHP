<?php
	require'../db.php';
		/*data:'&period='+period+'&start_hour='+start_hour+'&start_min='+start_min+'&end_hour='+end_hour+'&end_min='+end_min+'&break_flag='+break_flag+'&branchid='+branchid,*/ 
	 
	$period=trim($_POST['period']);
	$start_hour=$_POST['start_hour'];
	$start_min=$_POST['start_min'];
	$end_hour=$_POST['end_hour'];
	$end_min= $_POST['end_min'];
	//$branch_id=$_POST['branchid'];
  
	$start_time=$start_hour.":".$start_min.":00";
	$end_time=$end_hour.":".$end_min.":00";
	   
	   
	$sel="select count(*) as chk from std_exam_period where period='$period' and start_time='$start_time' and end_time='$end_time' and flag=1";
	$res1=mysql_query($sel);
	$row1=mysql_fetch_array($res1);
	
	if($row1['chk']<1)
	
	{ 
	
		//$ins_sql="insert into std_class_period set class_name='$class_name',no_of_student='$student_capacity',daily_class=$daily_class,class_start_time='$start_time',branch_id='$branchid'";
		$ins_sql="insert into std_exam_period(period, start_time, end_time, entry_date, flag) values('$period', '$start_time', '$end_time', now(), 1)";
		$res=mysql_query($ins_sql);
			
		if($res)
		{
			//echo "<p class=\"msg done\">Your data hasbeen entered successfully !!!</p>";
			echo "Your data has been entered successfully !!!";
		}
		else
		{
			//echo "<p class=\"msg error\">Please enter valid information.</p>";
			echo "Please enter valid information.";
		}
	}
	else
	{
		echo "This data is exists";
	}		
	/*if($row1['chk']<1)
	{     		
		$ins_sql="SELECT id FROM std_class_period where period='$period' and branch_id='$branch_id'";
		$ins_sql2=mysql_query($ins_sql);
		$res=mysql_fetch_array($ins_sql2);
		//echo "hello1";
		echo $g_id=$res['id'];
		class_fee_tbl_gene($g_id,$branchid);
	
	}*/

/*function class_fee_tbl_gene($g_id,$branchid)
{
	$sel2="select id from tbl_class_feehead where branch_id='$branchid' ";
	$res2=mysql_query($sel2);
	
	while($row2=mysql_fetch_array($res2))
	{
		$r=$row2['id'];
		
		$sel3=mysql_query("insert into tbl_class_fee_info(class_id,fee_head_id,amount,branch_id) values('$g_id','$r','0000','$branch_id')");
	
	}	  
	
}*/
 ?>
