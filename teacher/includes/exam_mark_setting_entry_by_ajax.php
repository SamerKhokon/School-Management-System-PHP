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
			$year 				   = trim($_POST["year_id"]);
			
			function get_db_total_mark($class_id,$branchid){
			$total_db_mark_str = "SELECT OB_total,SB_total,CT_total FROM `tbl_class_exam_mark_distribution`
			WHERE class_id=$class_id and branch_id=$branchid";
			$total_db_mark_sql = mysql_query($total_db_mark_str);
			$total_db_mark_res = mysql_fetch_row($total_db_mark_sql);
			$ob_db = $total_db_mark_res[0];
			$sb_db = $total_db_mark_res[1];
			$ct_db = $total_db_mark_res[2];
			return $ob_db + $sb_db +$ct_db;
			}
			
			$get_total = $subjective_mark+$objective_mark+$ct_mark;
			$db_total  = get_db_total_mark($class_id,$branchid);
				
			$final_result = ($get_total*100)/$db_total;
			$ur_grade = get_grade($final_result);
			$point    = get_point($ur_grade);
			
			
			
            $chk_str = "select count(*) from std_class_exam_mark_setting where stu_id=$roll_id and class_id=$class_id and sub_id='$subject_id' and period=$term_id";
			$chk_qry = mysql_query($chk_str);
			$rs =  mysql_fetch_row($chk_qry);
			
			if($rs[0] == 0 )
			{					
			$insert_query = "INSERT INTO `school`.`std_class_exam_mark_setting` (`class_id`, `class_sec`, `stu_id`, 
			`sub_id`, `subjective_mark`,`objective_mark`, `ct_mark`,`total_mark`,`grade`,`point`, `year`, `period`, `branch_id`)
			VALUES($class_id,'$section_id',$roll_id,$subject_id,$subjective_mark,$objective_mark,$ct_mark,$final_result,'$ur_grade',$point,
			'$year', $term_id, $branchid)";
					
					mysql_query($insert_query);			
					if(mysql_affected_rows()>0)
					 echo 'Exam mark saved Successfully!';
					 else
					 echo 'Unable to save exam mark!';			 
			 }else{
					echo "Data already exist!";
			 }
			 
        function get_grade($mark) {
		  if($mark >=80 && $mark <= 100)
          return "A+";
          else if($mark >=75 && $mark <= 79)		  
		  return "A";
          else if($mark >=70 && $mark <= 74)		  
		  return "A-";
          else if($mark >=65 && $mark <= 69)		  
		  return "B+";		  
          else if($mark >=60 && $mark <= 64)		  
		  return "B";		  
          else if($mark >=55 && $mark <= 59)		  
		  return "B-";		  
          else if($mark >=50 && $mark <= 54)		  
		  return "C+";		  
          else if($mark >=45 && $mark <= 49)		  
		  return "C";		  
          else if($mark >=40 && $mark <= 44)		  
		  return "C-";		  
          else if($mark >=35 && $mark <= 39)		  
		  return "D";		  
          else if($mark >=0 && $mark <= 34)		  
		  return "F";		  
		}  	
        function get_point($grade) {
		  if($grade =="A+")
          return 5.00;
          else if($grade == "A")		  
		  return 4.50;
          else if($grade == "A-")		  
		  return 4.00;
          else if($grade == "B+")		  
		  return 3.50;		  
          else if($grade == "B")		  
		  return 3.25;		  
          else if($grade == "B-")		  
		  return 3.00;		  
          else if($grade == "C+")		  
		  return 2.50;		  
          else if($grade == "C")		  
		  return 2.25;		  
          else if($grade == "C-")		  
		  return 2.00;		  
          else if($grade == "D")		  
		  return 1.00;		  
          else if($grade == "F")		  
		  return 0.00;		  
		}  			
?>