<?php   include("../db.php");

       $class_id    =trim($_POST["class_id"]);
	   $term_id     =trim($_POST["term_id"]);
	   $year_id     =trim($_POST["year_id"]);
	   $branchid   =trim($_POST["branchid"]);

       $st = "SELECT stu_id,class_id,period,YEAR,branch_id,class_sec,SUM(POINT) FROM `std_class_exam_mark_setting`
 WHERE YEAR='$year_id' AND class_id=$class_id AND period=$term_id AND branch_id=$branchid 
 GROUP BY stu_id";

       $sq = mysql_query($st);
	   while($rs = mysql_fetch_array($sq) ) 
	    {
	           $stuid = $rs[0];
			   $classid = $rs[1];
			   $period = $rs[2];
			   $year    = $rs[3];
			   $branch_id  = $rs[4];
			   $tot_sub = get_subject_counter($class_id);
			   $class_sec = $rs[5];
			   $total_point = $rs[6];
			   $cgpa = $total_point/$tot_sub;
			   $ur_grade = get_my_grade($cgpa);
			   
			   $chk = row_exist_check($stuid,$year,$classid,$period,$branch_id);
			   
			   if($chk =="" || $chk==0) {
			     $add_str = "INSERT INTO `school`.`std_final_result_after_process`(`stu_id`,`class_id`,`class_sec`,`period`,`cgpa`, `grade`,`year`, `branch_id`)
				 VALUES('$stuid',$classid,'$class_sec',$period, $cgpa,'$ur_grade','$year',$branch_id)";
			      mysql_query($add_str);
			   }
			   
			   
			   echo $stuid."  ".$cgpa."  ".$ur_grade."<br/>";
			   
			   
			   
			   
			   
	    }
		


		/*************
		 all functions
		**************/
		
		function row_exist_check($stu_id,$year,$classid,$period,$branch_id) {
		   $str = "SELECT COUNT(*) FROM `std_final_result_after_process` WHERE  stu_id='$stu_id' and YEAR='$year' AND 
		   class_id=$classid  AND period=$period AND branch_id=$branch_id";
		   $sql = mysql_query($str);
		   $res = mysql_fetch_row($sql);
		   return $res[0];
		}
		
		
		function get_student_name($stdid) {
		  $str = "select name from std_profile where stu_id='$stdid'";
		  $sql = mysql_query($str);
		  $res= mysql_fetch_row($sql);
		  return $res[0];
		}
		
		function get_class_name($class_id) {
		   $str = "select class_name from std_class_config where id=$class_id";
		   $sql = mysql_query($str);
		   $res = mysql_fetch_row($sql);
		   return $res[0];
		}
		
        function get_subject_counter($class_id) {		
			$str    = "SELECT COUNT(*) FROM std_subject_config WHERE class_id=$class_id AND branch_id=1";    
			$querys = mysql_query($str);
			$res    = mysql_fetch_row($querys);
			return $res[0];						
        }  
		
		function get_my_grade($point) {
		     if($point >= 5.00)  {
			   return "A+";
			 }else if($point>= 4.50 && $point < 5.00) {
			   return "A";
			 }else if($point>= 4.00 && $point < 4.50) {
			   return "A-";
			 }else if($point>= 3.50 && $point < 4.00) {
			   return "B+";
			 }else if($point>= 3.25 && $point < 3.50) {
			   return "B";
			 }else if($point>= 3.00 && $point < 3.25) {
			   return "B-";
			 }else if($point>= 2.50 && $point < 3.00) {
			   return "C+";
			 }else if($point>= 2.25 && $point < 2.50) {
			   return "C";
			 }else if($point>= 2.00 && $point < 2.25) {
			   return "C-";
			 }else if($point>= 1.00 && $point < 2.00) {
			   return "D";
			 }else if($point>= 0 && $point < 1.00) {
			   return "F";
			 }
		}
		
		
		//result_process_by_ajax.php
?> 