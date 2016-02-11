<?php require_once('../db.php');


			$student_id   =trim($_POST["student_id"]);
			$student_name =trim($_POST["student_name"]);
			$class_id	  =trim($_POST["class_id"]);
			$class   	  =trim($_POST["classs"]);
			$amount		  =trim($_POST["amount"]);
			$secid		  =trim($_POST["secid"]);			
			$sec		  =trim($_POST["sec"]);
			$month		  =trim($_POST["month"]);
			$branch		  =trim($_POST["branch"]);

			
			$chk = "select count(*) from std_fee_details where checker_status='checked' and std_id='$student_id' and class_id=$class_id and section_id=$secid and month='$month' and branch_id=$branch";
		    $chk_str = mysql_query($chk);	
			$chk_res = mysql_fetch_row($chk_str);
			if($chk_res[0]==0) {
			
				$update = "update std_fee_details set checker_status='checked' where std_id='$student_id' and class_id=$class_id and section_id=$secid and month='$month' and branch_id=$branch";
				if(mysql_query($update))  {
				 echo 'Authenticated successfully';
				}else{
				 echo 'Error';
				}
			}else
			{
			   echo 'Already authenticated';
			}
?>