<?php	require'../db.php';	 
	 	$class_name       = trim($_POST['class_name']);
   		$student_capacity = trim($_POST['student_capacity']);
	 	$daily_class      = trim($_POST['daily_class']);
		$class_hour       = trim($_POST['class_hour']);
		$class_min        = trim($_POST['class_min']);	  
	    $branchid		  = trim($_POST['branchid']);	
		$section_system	  = trim($_POST['section_system']);	
	    $start_time		  = $class_hour.":".$class_min;	   
	   
	   
	    if($section_system=="") {
		  $section_system = "E";
		}else{
		  $section_system = $section_system;
		}
	   
		$sel="select count(*) as chk from std_class_config where class_name='$class_name' and branch_id='$branchid'";
		$res1=mysql_query($sel);
		$row1=mysql_fetch_array($res1);

		if($row1['chk']<1)
		{ 

			//$ins_sql="insert into std_class_config set class_name='$class_name',no_of_student='$student_capacity',daily_class=$daily_class,class_start_time='$start_time',branch_id='$branchid'";
			
			$ins_sql="insert into std_class_config(class_name,no_of_student,daily_class,class_start_time,branch_id,section_system)	values('$class_name','$student_capacity',$daily_class,'$start_time',$branchid,'$section_system')";			
			$res=mysql_query($ins_sql);			
			if($res){
				echo "Your data hasbeen entered successfully !!!";		
			}else{
				echo "Please enter valid information.";
			}
		}else{
			echo "This data is exists";
		}		
		if($row1['chk']<1)
		{	     		
			$ins_sql  = "SELECT id FROM std_class_config where class_name='$class_name' and branch_id='$branchid'";    
			$ins_sql2 = mysql_query($ins_sql);
			$res = mysql_fetch_array($ins_sql2);
			$g_id    = $res['id'];
			class_fee_tbl_gene($g_id,$branchid);
		}
?>

<?php
    function class_fee_tbl_gene($g_id,$branchid)
	{
		$sel2 = "select id from tbl_class_feehead where branch_id='$branchid' ";
		$res2 = mysql_query($sel2);      
		while($row2 = mysql_fetch_array($res2))
	    {
			$r = $row2['id'];			
			$sel3 = mysql_query("insert into tbl_class_fee_info(class_id,fee_head_id,amount,branch_id) values('$g_id','$r','0000','$branchid')");			 
		}	  	  
	}
 ?>