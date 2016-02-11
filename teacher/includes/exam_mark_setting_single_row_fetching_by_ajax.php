<?php	include("../db.php");			
          
		    global $subjects_option;
		  
			$id    =  trim($_POST["id"]);			
			$str   = "SELECT id,class_id,class_sec,stu_id,sub_id,subjective_mark,objective_mark,ct_mark,YEAR FROM `std_class_exam_mark_setting` WHERE id=$id";
			
			$sql   = mysql_query($str);
			$res  = mysql_fetch_row($sql);			
			
			$class_id         = $res[1] ;
			$section          = $res[2];
			$stu_roll          = $res[3];
			$subject_code = $res[4];
			$subjective      = $res[5];
			$objective       = $res[6];
			$ct                 = $res[7];
			$year             = $res[8];	
			
			
			
			$sts = "SELECT subject_name FROM `std_subject_config` WHERE class_id=$class_id AND subject_code='$subject_code'";
			$strs = mysql_query($sts);
			$ress = mysql_fetch_row($strs);
			$subject_name =$ress[0];
			
			
			$sub_str = "SELECT subject_code,subject_name FROM `std_subject_config` WHERE class_id=$class_id";
			$sub_sql = mysql_query($sub_str);
			while( $r = mysql_fetch_array($sub_sql) ) {
			    if($subject_name == $r[1]) {
					$subjects_option .= "<option  value='". $r[0]."' selected>".$r[1]."</option>";
				 }else{
					$subjects_option .= "<option  value='". $r[0]."' >".$r[1]."</option>";				 
				 }
			}
			
			
			echo $class_id."|".$section."|".$stu_roll."|".$subject_code."|".$subject_name."|".$subjective."|".$objective."|".$ct."|".$year."|".$subjects_option;		
?>