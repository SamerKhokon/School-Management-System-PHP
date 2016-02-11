<?php  	include('../db.php');

	$referer_name = trim($_POST['referer_name']);
	$referer_no   = trim($_POST['referer_no']);
		
	
	
	$str = "INSERT INTO `tbl_refferer_info` 
			(`ref_name`, `contact_no`, `creation_date`)
			VALUES('$referer_name', '$referer_no', NOW())";
			
	mysql_query($str);
    echo "Data saved successfully!";	
?>