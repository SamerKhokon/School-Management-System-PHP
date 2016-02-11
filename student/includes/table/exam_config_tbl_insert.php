<?php
     require'../db.php';
	 
	 
	
   		 $exam_name=$_POST['exam_name'];
	 	 $period=$_POST['period'];
		 $prefix=$_POST['prefix'];

	    $branchid=$_POST['branchid'];
	  
	
	    	   
 $sel="select count(*) as chk from std_exam_config where exam_name='$exam_name'  and period='$period' and Prefix='$prefix' ";
$res1=mysql_query($sel);
 $row1=mysql_fetch_array($res1);

if($row1['chk']<1)

{ 	
	 
	  
	  $ins_sql="insert into std_exam_config set exam_name='$exam_name',period='$period',Prefix='$prefix' ";
  	  mysql_query($ins_sql);
		echo "<p class=\"msg done\">Your data hasbeen entered successfully !!!</p>";
		
	}
	else
	{
	
	 echo "This exam is exist,try again";
	}	
		
	


    



?>