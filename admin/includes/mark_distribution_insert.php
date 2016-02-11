<?php  include("../db.php");

	$class_name = trim($_POST['class_name']);
	$sb         = trim($_POST['sb']);
	$ob         = trim($_POST['ob']);
	$ct         = trim($_POST['ct']);
	$branchid   = trim($_POST['branchid']);			
					
   
     $str = "select count(*) from tbl_class_exam_mark_distribution where class_id=$class_name";
     $stm = mysql_query($str);
	 $res = mysql_fetch_row($stm);
   
   
	if($res[0]==0 || $res[0]==""){
		$query = "INSERT INTO `school`.`tbl_class_exam_mark_distribution` 
		(`class_id`,`OB_total`,`SB_total`,`CT_total`,`branch_id`)
		VALUES($class_name,$ob,$sb,$ct,$branchid)";
		
		mysql_query($query);
		echo "Data saved successfully!";	
    }else{
	   echo "Data already exist!";
	}	
?>