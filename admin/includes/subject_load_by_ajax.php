<?php
		require_once("db.php");
		$class_name = trim($_POST['class_id']);
		$branchid = trim($_POST['branchid']); 
		echo $str = "select id,subject_name from std_subject_config  where class_id=$class_name and branch_id=$branchid";
		$qry = mysql_query($str); 
        //echo "<option value=''>select any subject</option>";		
		while ($row = mysql_fetch_array($qry))		
		{
			echo "<option value=\"$row[0]\">$row[1]</option>";
		}
?>