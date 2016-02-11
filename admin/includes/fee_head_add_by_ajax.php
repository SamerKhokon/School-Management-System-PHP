<?php   require_once('db.php');

		$class_name = trim($_POST['class_name']);
		$fee_name   = trim($_POST['fee_name']);
		$fee_amount = trim($_POST['fee_amount']);
		$branch_id  = trim($_POST['branch_id']);
			
			
		$dupli_str = "select count(*) from tbl_class_fee_info where class_id=$class_name and fee_head_id=$fee_name";	
		$dupli_stm = mysql_query($dupli_str);
		
		$dupli_res = mysql_fetch_row($dupli_stm);
		
		if($dupli_res[0]==0 || $dupli_res[0]=="") {
		
		$add = "INSERT INTO `school`.`tbl_class_fee_info`(`class_id`,`fee_head_id`,`amount`,`branch_id`)
			VALUES('$class_name','$fee_name','$fee_amount',$branch_id)";
		mysql_query($add);	
		echo "Data saved successfully!";	
		}else{
		  echo "Data already exist!";
		}
?>