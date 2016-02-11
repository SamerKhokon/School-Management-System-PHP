<?php   include("../db.php");

		$leave_name = trim($_POST["leave_name"]);
		$no_of_days = trim($_POST["no_of_days"]);
		$branch     = trim($_POST["branch_id"]);
		
		$str = "INSERT INTO `school`.`tbl_leaves` (`leave_name`, `no_of_leave`, 	`branch_id`	)
		VALUES('$leave_name', $no_of_days, $branch	);";
		
		$sql = mysql_query($str);
		if($sql)
			echo "Data Saved successfully";
		else
			echo "Error";

?>