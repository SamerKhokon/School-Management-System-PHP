<?php
	include ('../db.php');
	$fnction_name = $_GET['fn_name'];
	$parm         = $_GET['parm'];

	if ($fnction_name=='std_fee_generator_form_section_id'){
		std_fee_generator_form_section_id($parm);
	}
	if ($fnction_name=='std_fee_generator_form_student_roll'){  
		std_fee_generator_form_student_roll($parm);
	}
	if ($fnction_name=='std_fee_generator_form_amount_id') {
			std_fee_generator_form_amount_id($parm);
	}
	function std_fee_generator_form_section_id( $parm ){
		$parm = explode("-" , $parm);
		$class_id  = $parm[0];
		$branch_id = $parm[1];
		$qry="select id,section_name from std_class_section_config where class_id='$class_id' and branch_id='$branch_id'";
		$result = mysql_query($qry);
		while ($row = mysql_fetch_array($result)){
			echo "<option value=\"$row[0]\">$row[1]</option>";
		}
	}

	function std_fee_generator_form_student_roll( $parm ) {
			$parm = explode("-",$parm);
			echo $class_id  = $parm[0];
			echo $sec_id    = $parm[1];
			echo $branch_id = $parm[2];
			echo $qry = "select class_roll from std_class_student_info where class_id='$class_id' and sec_id='$sec_id' and branch_id='$branch_id' ";
			$result = mysql_query($qry);
			while ($row = mysql_fetch_array($result)){
				echo "<option value=\"$row[0]\">$row[0]</option>";
			}
	}
	function std_fee_generator_form_amount_id($parm) {
			$parm = explode("-",$parm);
			$class_id  = $parm[0];
			$branch_id = $parm[1];
			$qry2 = "select amount from tbl_class_fee_info,tbl_class_feehead where tbl_class_fee_info.fee_head_id=tbl_class_feehead.id and class_id='$class_id' and tbl_class_feehead.fee_head='absence'";
			$qry3 = mysql_query($qry2);
			while($row3 = mysql_fetch_array($qry3))	{
				echo $row3[0]."Tk";
			}  
	}
?>