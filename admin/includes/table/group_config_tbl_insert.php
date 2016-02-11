<?php
     require'../db.php';
	 
	 
	 echo 	$group_name=$_POST['group_name'];
   	 echo	$class_id=$_POST['class_name'];
	 echo	$sec_id=$_POST['sec_name'];
   	 echo	$branchid=$_POST['branchid'];




		
		$sql="insert into std_group_info (group_name,class_id,section_id,branch_id) values('$group_name','$class_id','$sec_id','$branchid')";
		
	echo $res=mysql_query($sql);
		
		if($res)
		{
		
		echo "<p class=\"msg done\">Your data hasbeen entered successfully !!!</p>";
		}
		else
		{
		 echo "error";
		}

?>