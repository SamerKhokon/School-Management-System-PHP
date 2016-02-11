<?php  require_once("db.php");
		
		 $notice_title    =trim($_POST["notice_title"]);
		 $notice_file_name=trim($_POST["notice_file_name"]);
		 $notice_date     =trim($_POST["notice_date"]);
		 $branch_id       =trim($_POST["branch_id"]);
		 
		 $parse_date = explode("-",$notice_date);
		 $date  = $parse_date[0];
		 $month = $parse_date[1];
		 $year  = $parse_date[2];
		 $new_notice_date = $year.'-'.$month.'-'.$date;
		 
		$insert = "INSERT INTO `school`.`tbl_notices`(`title`,`notice_date`,`url`,`branch_id`)
					VALUES('$notice_title','$new_notice_date','$notice_file_name',$branch_id)";
			
		if( mysql_query($insert) )
		{
		   echo 'Data saved successfully!';
		}
		else
		{
		   echo 'Error!';
		}
?>