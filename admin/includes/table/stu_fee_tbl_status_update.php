<?php
     require'../db.php';
	 
	 
	 	$class_id=$_POST['class_id'];
   		$sec_name=$_POST['sec_id'];
	 	$roll=$_POST['roll'];
		$branch_id=$_POST['branch_id'];
		
		
    $sec_qry="select id from std_class_section_config where class_id='$class_id' and branch_id='$branch_id' and section_name='$sec_name'";
	$res=mysql_query($sec_qry);
	$row=mysql_fetch_array($res);	
	$sec_id	=$row[0];
	  
	echo  $ins_sql="update std_fee_details set generation_status='ini_confirm' where class_id='$class_id' and section_id='$sec_id' and roll='$roll' and branch_id='$branch_id'";
	
	$result=mysql_query($ins_sql);
		
		if($result)
		{
		echo "<p class=\"msg done\"> Update successfully !!!</p>";
		}
		else
		{
		 echo "Error";
		
		}


?>