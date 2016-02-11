<?php
     require'../db.php';
	
    $class_id    = trim($_POST['class_id']);	
    $sub_code =trim($_POST['sub_code']);
	$sub_name =trim($_POST['subname']);
	$sub_mark  =trim($_POST['sub_mark']);
	$ct_mark     =trim($_POST['ct_mark']);
	$ob_mark    =trim($_POST['ob_mark']);
	$practical_mark =trim($_POST['practical_mark']);
	
	$full_mark=$sub_mark+$ct_mark+$ob_mark+$practical_mark;  
	$branchid=trim($_POST['branchid']);
	  
	$sel="select count(*) as chk from std_subject_config where subject_name='$sub_name' and subject_code='$sub_code' and branch_id='$branchid'";
	$res1=mysql_query($sel);
	$row1=mysql_fetch_array($res1);

	if($row1['chk'] < 1 )
	{ 
        //$ins_sql="insert into std_subject_config set subject_code='$sub_code',subject_name='$sub_name',sub_mark='$sub_mark',ct_mark='$ct_mark',st_mark='$st_mark',final_mark='$full_mark',branch_id='$branchid'";
		$ins_sql="INSERT INTO `school`.`std_subject_config`(`class_id`,`subject_code`,`subject_name`,`sub_mark`,`ct_mark`,`ob_mark`,`practical_mark`,`final_mark`,`branch_id`)
		VALUES($class_id,'$sub_code','$sub_name',$sub_mark,$ct_mark,$ob_mark,$practical_mark,$full_mark,$branchid)";
		
		$result=mysql_query($ins_sql);
		
		if($result)
		{
		echo "Your data hasbeen entered successfully !!!";
		}
		else
		{
		 echo "Error";
		
		}
	}
    else  {
		     echo "this value is exist";
		   
	 }
?>