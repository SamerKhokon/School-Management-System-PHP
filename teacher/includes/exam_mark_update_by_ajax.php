<?php  include("../db.php");
           $slno                     = trim($_POST["slno"]);
		   $class_id              = trim($_POST["class_id"]);
		   $section_id           = trim($_POST["section_id"]);
		   $subject_id           = trim($_POST["subject_id"]);
		   $subjective_mark = trim($_POST["subjective_mark"]);
		   $objective_mark  = trim($_POST["objective_mark"]);
		   $ct_mark              = trim($_POST["ct_mark"]);
		   $year_id               = trim($_POST["year_id"]);
		   $stu_roll               = trim($_POST["roll"]);
		   $branchid             = trim($_POST["branchid"]);
		   
		     $sub_str = "select subject_name from std_subject_config where subject_code='$subject_id'";
		     $sub_sql = mysql_query($sub_str);
		      $sub_res = mysql_fetch_row($sub_sql);
			  $sub_name =$sub_res[0];
		   
		   
		    echo $update_str = "UPDATE `school`.`std_class_exam_mark_setting` 
														SET
														`class_id` = $class_id , 
														`class_sec` = '$section_id' , 
														`stu_id` = '$stu_roll' , 
														`sub_id` = '$subject_id' , 
														`subjective_mark` = $subjective_mark , 
														`objective_mark` = $objective_mark , 
														`ct_mark` = $ct_mark , 
														`year` = '$year_id' , 
														WHERE
														`id` = $slno" ;
									
            mysql_query($update_str);									            			
?>