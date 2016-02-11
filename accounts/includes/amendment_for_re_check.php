<?php 	require_once("../db.php");

		$std_id      = trim($_POST["std_id"]);
		$month_date = trim($_POST["month_date"]);		
        
		
		$update = "update std_fee_details set checker_status='unchecked' where std_id='$std_id' and month_date='$month_date'";
		mysql_query($update);
		echo "Data saved successfully";
?>