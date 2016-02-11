<?php
     require'../db.php';
	 
	 
	 	$sub_name=$_POST['subname'];
   		$sub_mark=$_POST['sub_mark'];
	 	$ct_mark=$_POST['ct_mark'];
		$st_mark=$_POST['st_mark'];
		$full_mark=$sub_mark+$ct_mark+$st_mark;
	  
	    $branchid=$_POST['branchid'];
	  
	$sel="select count(*) as chk from std_subject_config where subject_name='$sub_name' and branch_id='$branchid'";
$res1=mysql_query($sel);
$row1=mysql_fetch_array($res1);

if($row1['chk']<1)

{ 
	 
	  
	  $ins_sql="insert into std_subject_config set subject_name='$sub_name',sub_mark='$sub_mark',ct_mark='$ct_mark',st_mark='$st_mark',final_mark='$full_mark',branch_id='$branchid' ";
		$result=mysql_query($ins_sql);
		
		if($result)
		{
		echo "<p class=\"msg done\">Your data hasbeen entered successfully !!!</p>";
		}
		else
		{
		 echo "Error";
		
		}
}

           else
		   {
		     echo "this value is exist";
		   
		   }

?>