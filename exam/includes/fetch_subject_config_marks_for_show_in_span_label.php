<?php include("../db.php");
		session_start();

		 $class_id  =trim($_POST["class_id"]);
		 $sub_code  =trim($_POST["sub_code"]);
		 $branch_id =$_SESSION["LOGIN_BRANCH"];
		if(!isset($sub_code)) {
		   $first_sub_code_str = "SELECT subject_code FROM `std_subject_config` WHERE class_id=$class_id ORDER BY subject_code ASC LIMIT 1";
		   $first_sub_code_sql = mysql_query($first_sub_code_str);
		   $first_sub_code_res = mysql_fetch_row($first_sub_code_sql);
		   $first_sub_code = $first_sub_code_res[0];
		   $where = "WHERE class_id=$class_id AND subject_code='$first_sub_code' AND branch_id=$branch_id";
		}else if($sub_code == "null") {
		    $first_sub_code_str = "SELECT subject_code FROM `std_subject_config` WHERE class_id=$class_id ORDER BY subject_code ASC LIMIT 1";
		   $first_sub_code_sql = mysql_query($first_sub_code_str);
		   $first_sub_code_res = mysql_fetch_row($first_sub_code_sql);
		   $first_sub_code = $first_sub_code_res[0];
		   $where = "WHERE class_id=$class_id AND subject_code='$first_sub_code' AND branch_id=$branch_id";
		}else{
		  $where = "WHERE class_id=$class_id AND subject_code='$sub_code' AND branch_id=$branch_id";
		  
		}
		
		$str = "SELECT sub_mark,ct_mark,ob_mark,practical_mark
		FROM `std_subject_config` $where";
	
		
			
		$res = mysql_query($str);
		$result = mysql_fetch_row($res);		
		$sb = $result[0]; 
		$ob = $result[1];
		$ct = $result[2];
		$pt = $result[3];
		echo $sb.",".$ob.",".$ct.",".$pt;
?>