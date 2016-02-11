<?php	require_once("../db.php");

         $student_id    = trim($_POST["stu_id"]);
		 $class_id      = trim($_POST["class_id"]);
		 $section_name    = trim($_POST["section_id"]);
		 $total_open    = trim($_POST["total_open"]);
		 $total_attend  = trim($_POST["total_attend"]);
		 $total_absense = trim($_POST["total_absense"]);
		 $month_id      = trim($_POST["month_id"]);
		 $branch_id     = trim($_POST["branch_id"]);		 
		 
		 $parse      = explode("-",$month_id);
		 $month      = $parse[0];
		 $year       = $parse[1];
		 $month_date = $year.'-'.date('m',strtotime($month)).'-01';
		 
		 if(duplicacy_check($month_date,$class_id,$student_id,$section_name,$branch_id)==0)
		 {
		    $str = "INSERT INTO `school`.`std_attendence_info`(`stu_id`,`class_id`,`section`,`total_attend`,`total_absent`,`total_open_day`,`month`,`branch_id`)
			VALUES('$student_id',$class_id,'$section_name',$total_attend,$total_absense,$total_open,'$month_date',$branch_id)";
			mysql_query($str);
			echo "Data saved successfully!";
		 }
		 else{
		   echo "Data already exist";
		 }
		 
		 
		 function duplicacy_check($month_date,$class_id,$student_id,$section_name,$branch_id){
		   $str = "SELECT COUNT(*) FROM `std_attendence_info` WHERE stu_id='$student_id' AND section='$section_name' AND class_id=$class_id AND branch_id=$branch_id";
			$sql =  mysql_query($str);
			$res = mysql_fetch_row($sql);
			if($res[0]=='')
			return 0;
			else
			return $res[0];
		 }
?>