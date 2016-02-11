<?php   $con = mysql_connect("localhost" , "root" , "");
		mysql_select_db("school" , $con);		
		
		$result_process_str = "SELECT stu_id,SUM(point) as pnt,class_id,period,sum(total_mark) as sm,grade FROM `std_class_exam_mark_setting` 
		GROUP BY stu_id order by pnt desc";		
        $result_process_str = mysql_query($result_process_str); 
		
        $table = "<table>"; 		
		while( $res = mysql_fetch_array($result_process_str)) 
		{
			$old_stu_id   = $res[0];
			$total_point  = $res[1];
			$class_id     = $res[2];
			$term_id      = $res[3];
			$total_mark   = $res[4];		   
			$grade        = $res[5];			
			$cgpa = $total_point/get_subject_counter($class_id); 
						
			$count_subject          = get_subject_counter($class_id);
			$previous_roll          = get_previous_class_roll($old_stu_id);
			$previous_sec_id        = get_previous_sectionid($old_stu_id);
			$previous_cls_year      = get_previous_year($old_stu_id);			
			$new_class_section_roll = get_new_class_section_roll($class_id , $previous_sec_id , $previous_cls_year);
			$new_class_roll         = get_new_class_roll($class_id , $previous_cls_year);
			$check_flag             = checking_for_exist_or_not($old_stu_id,$previous_cls_year);	
			           
			echo $check_flag."<br/>";	
			
			/***
			     if previously not exist data then insert
			***/
			
            if( $check_flag =="" || $check_flag==0 )   { 					    
				echo $query = "INSERT INTO `school`.`std_mark_promo`(`pre_stu_id`,`total_point`,`pre_class_sec_roll`,`pre_class_roll`,`pre_year`,`pre_section`,`total_mark`,`grade`,`cgpa`)
				VALUES('$old_stu_id',$total_point,$previous_roll,$new_class_roll,'$previous_cls_year','$previous_sec_id',$total_mark,'$grade',$cgpa)";			
				mysql_query($query);			
				echo "<br/>";
			}
			$table .= "<tr><td>$old_stu_id</td><td>$total_point</td><td>$previous_roll</td><td>$previous_sec_id</td>
				<td>$total_point</td><td>$class_id</td><td>$term_id</td><td>$previous_cls_year</td>
				<td>$total_mark</td><td>$new_class_section_roll</td></tr>";			
		}		
		$table .= "</table>";
		echo $table;

		/*************
		 all functions
		**************/
		
        function get_subject_counter($class_id) {		
			$str    = "SELECT COUNT(*) FROM std_subject_config WHERE class_id=$class_id AND branch_id=1";    
			$querys = mysql_query($str);
			$res    = mysql_fetch_row($querys);
			return $res[0];						
        }  
		
		function checking_for_exist_or_not($old_stu_id , $previous_cls_year) {
		    $st = "select count(*) from std_mark_promo where pre_stu_id='$old_stu_id' and pre_year='$previous_cls_year'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_previous_class_roll( $stu_id ) {
		    $st = "select class_roll from std_class_info where stu_id='$stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_previous_sectionid( $stu_id ){
		    $st = "select class_sec from std_class_info where stu_id='$stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_previous_year( $stu_id ) {
		    $st = "select year from std_class_info where stu_id='$stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_new_class_section_roll( $class_id , $section_id , $year ) {
			$st = "SELECT MAX(class_roll) FROM std_class_info WHERE YEAR='$year' AND class_id=$class_id AND class_sec='$section_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_new_class_roll( $class_id , $year ) {
		    $st = "SELECT MAX(class_roll) FROM std_class_info WHERE YEAR='$year' AND class_id=$class_id";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
?>