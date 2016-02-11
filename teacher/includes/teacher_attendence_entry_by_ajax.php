<?php	require_once("../db.php");

         $teacher_id    = trim($_POST["teacher_id"]);
		 $total_open    = trim($_POST["total_open"]);
		 $total_attend  = trim($_POST["total_attend"]);
		 $total_absense = trim($_POST["total_absense"]);
		 $month_id      = trim($_POST["month_id"]);
		 $branch_id     = trim($_POST["branch_id"]);		 
		 
		 $parse      = explode("-",$month_id);
		 $month      = $parse[0];
		 $year       = $parse[1];
		 $month_date = $year.'-'.date('m',strtotime($month)).'-01';
		 
		 if(duplicacy_check($month_date,$teacher_id,$branch_id)==0)
		 {
		    $str = "INSERT INTO `school`.`tbl_teacher_attendance_info` 
							(`teacher_id`,`month`,`total_open`,`total_attend`, 
							`total_absent`,`branch_id`)
							VALUES($teacher_id,'$month_date',$total_open, 
							$total_attend,$total_absense,$branch_id)";
			mysql_query($str);
			echo "Data saved successfully!";
		 }
		 else{
		   echo "Data already exist";
		 }
		 
		 
		 function duplicacy_check($month_date,$teacher_id,$branch_id){
		   $str = "SELECT COUNT(*) FROM `tbl_teacher_attendance_info`
			WHERE `month`='$month_date' AND teacher_id=$teacher_id AND branch_id=$branch_id";
			$sql =  mysql_query($str);
			$res = mysql_fetch_row($sql);
			if($res[0]=='')
			return 0;
			else
			return $res[0];
		 }
?>