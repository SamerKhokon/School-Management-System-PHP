<?php   include("../db.php");
        session_start();
		$branchid = $_SESSION["LOGIN_BRANCH"];
		
	
		$class_id = trim($_POST["class_id"]);
		$sub_code = trim($_POST["sub_code"]);
		$mark     = trim($_POST["mark"]);
		$tag_name = trim($_POST["tag_name"]); 
		
		
		if(!isset($sub_code)) {
		   $first_sub_code_str = "SELECT subject_code FROM `std_subject_config` WHERE class_id=$class_id ORDER BY subject_code ASC LIMIT 1";
		   $first_sub_code_sql = mysql_query($first_sub_code_str);
		   $first_sub_code_res = mysql_fetch_row($first_sub_code_sql);
		   $first_sub_code = $first_sub_code_res[0];
		   $query = "subject_code='$first_sub_code'";
		}else if($sub_code == "null") {
		    $first_sub_code_str = "SELECT subject_code FROM `std_subject_config` WHERE class_id=$class_id ORDER BY subject_code ASC LIMIT 1";
		   $first_sub_code_sql = mysql_query($first_sub_code_str);
		   $first_sub_code_res = mysql_fetch_row($first_sub_code_sql);
		   $first_sub_code = $first_sub_code_res[0];
		   $query = "subject_code='$first_sub_code'";
		}else{
		  $query = "subject_code='$sub_code'";		  
		}
		
		$str =  "SELECT sub_mark,ob_mark,ct_mark,practical_mark FROM `std_subject_config` WHERE class_id=$class_id
		AND $query AND branch_id=$branchid";
		
		
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		$sb = $res[0];
		$ob = $res[1];
		$ct = $res[2];
		$pt = $res[3];

        if($tag_name=="sb") {
		   if($mark>$sb) {
		     echo "Subjective mark must be <= ".$sb;
		   }else{
		     echo "";
		   }
		}		
        else if($tag_name=="ob") {
		   if($mark>$ob) {
		     echo "objective mark must be <= ".$ob;
		   }else{
		     echo "";
		   }
		}				
        else if($tag_name=="ct") {
		   if($mark>$ct) {
		     echo "Class test mark must be <= ".$ct;
		   }else{
		     echo "";
		   }
		}				
        else if($tag_name=="pt") {
		   if($mark>$pt) {
		     echo "Practical mark must be <= ".$pt;
		   }else{
		     echo "";
		   }
		}						
?>