<?php
			include ('db.php');
			$oper                     = $_POST['oper'];
			$id                         = $_POST['id'];
			$exam_fee              = $_POST['exam_fee'];
			$developement_fee  = $_POST['developement_fee'];
			$monthly_fee           = $_POST['monthly_fee'];
			$hostel_fee              = $_POST['hostel_fee'];
			$tution_fee               = $_POST['tution_fee'];
			$leb_fee                   = $_POST['leb_fee'];
			$branchid                 = $_POST['branchid'];

			if( $oper == 'edit' )  {
				$sql="update std_class_config set exam_fee=$exam_fee,developement_fee=$developement_fee,monthly_fee=$monthly_fee,hostel_fee=$hostel_fee,tution_fee=$tution_fee,leb_fee=$leb_fee where id=$id";
				mysql_query($sql);
			}
?>