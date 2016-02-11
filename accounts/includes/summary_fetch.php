<?php
			require_once("../db.php");
				
			$class_id=trim($_POST['class_id']);
			$month_year =trim($_POST['month_year']);
			
			
			$total_paid = total_status_paid($class_id,$month_year,"paid");
			$total_due = total_status_paid($class_id,$month_year,"due");
		    $total = $total_paid + $total_due; 
			
			echo $total_paid."|".$total_due."|".$total;
			
			function total_status_paid($class_id,$month_year,$status){
				$parse =explode("-",$month_year);
				$month_date = $parse[1].'-'.date('m',strtotime($month_year)).'-01';
				$paid_str = "SELECT SUM(amount) FROM `std_fee_collection`
				WHERE class_id=$class_id AND STATUS='$status' and month='$month_year'";
				$paid_sql = mysql_query($paid_str);
				$paid_res = mysql_fetch_row($paid_sql);					if($paid_res[0]=="")
				return 0;
				else
				return $paid_res[0];
			}
			
			
						
?>