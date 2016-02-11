<?php  			 require_once("../db.php");

					//tc_info_get_by_ajax.php
					$class_id        = trim($_POST['class_name']);
					$section         = trim($_POST['section']);					
					$class_roll      = trim($_POST['std_roll']);
					$std_id           = trim($_POST['std_id']);	
					$branch_id     = trim($_POST['branch_id']);
					
					
					function get_std_id($class_id,$class_roll,$section,$branch_id) 
					{
						$str = "SELECT stu_id FROM std_class_info WHERE class_id=$class_id  AND class_sec='$section' AND class_roll=$class_roll and branch_id=$branch_id";
						$sql = mysql_query($str);
						$res = mysql_fetch_row($sql);
						return $res[0];
					}					
					function get_class_roll($class_id,$section,$std_id,$branch_id) 
					{
						$str = "SELECT class_roll FROM std_class_info WHERE class_id=$class_id  AND class_sec='$section' AND stu_id='$std_id' and branch_id=$branch_id";
						$sql = mysql_query($str);
						$res = mysql_fetch_row($sql);
						return $res[0];					
					}
					
					function get_st_status($class_id,$section,$stdid,$branch_id) {
					    $str =   "select st_status from std_profile where section='$section' and adm_class=$class_id and stu_id='$stdid' and branch_id=$branch_id";
						$sql = mysql_query($str);
						$res = mysql_fetch_row($sql);
						return $res[0];
					}
					
					if($class_id !="" && $class_roll!="" && $section !="" && $branch_id!="") 
					{					
						$stdid = get_std_id($class_id,$class_roll,$section,$branch_id) ;
						$status = get_st_status($class_id,$section,$stdid,$branch_id); 
						echo $stdid.','.$status;
					}
					else if($class_id !="" && $std_id !="" && $section !="" && $branch_id!="") 
					{
						$classroll = get_class_roll($class_id,$section,$std_id,$branch_id) ;
						$status = get_st_status($class_id,$section,$std_id,$branch_id); 
						echo $classroll.','.$status;
					}else{
					    echo 0;
					}					
?>