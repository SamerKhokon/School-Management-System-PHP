<?php  include("../db.php");
			$branchid 		    = trim($_POST['branchid']);
			$term_id 			    = trim($_POST['term_id']);
			$class_id 			    = trim($_POST['class_id']);
			$section_id           = trim($_POST['section_id']);
			$roll_id                 = trim($_POST['roll_id']);
			$subject_id           = trim($_POST['subect_id']);
			$subjective_mark  = trim($_POST['subjective_mark']);
			$objective_mark    = trim($_POST['objective_mark']);
			$ct_mark              = trim($_POST['ct_mark']);
			
			$year = date('Y');
					
			$insert_query = "INSERT INTO `school`.`std_class_exam_mark_setting` (`class_id`, `class_sec`, `stu_id`, 
									 `sub_id`, `subjective_mark`,`objective_mark`, `ct_mark`, `year`, `period`, `branch_id`)
									 VALUES($class_id,'$section_id',$roll_id,$subject_id,$subjective_mark,$objective_mark,$ct_mark, '$year', $term_id, $branchid)";
			
			mysql_query($insert_query);			
			if(mysql_affected_rows()>0)
			 echo 'Exam mark saved Successfully!';
			 else
			 echo 'Unable to save exam mark!';
?>