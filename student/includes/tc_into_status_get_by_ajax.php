<?php
		require_once("../db.php");
			$class_id        = trim($_POST['class_name']);
			$section         = trim($_POST['section']);					
			$class_roll      = trim($_POST['std_roll']);
			$std_id           = trim($_POST['std_id']);	
			$branch_id     = trim($_POST['branch_id']);

		if($class_id!="" && $section!="" && $stdid!="" && $branch_id!=""){
			echo get_st_status($class_id,$section,$stdid,$branch_id);
		}
		
		function get_st_status($class_id,$section,$stdid,$branch_id) {
			echo $str =   "select st_status from std_profile where section='$section' and adm_class=$class_id and stu_id='$stdid' and branch_id=$branch_id";
			$sql = mysql_query($str);
			$res = mysql_fetch_row($sql);
			return $res[0];
		}


?>