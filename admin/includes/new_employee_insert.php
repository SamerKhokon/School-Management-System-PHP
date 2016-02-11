<?php
		include('../db.php');
		//$employeeid   = trim($_POST['employeeid']);
		$empname      = trim($_POST['empname']);
		$category     = trim($_POST['category']);
		$basic_salary = trim($_POST['basic_salary']);
		$medical      = trim($_POST['medical']);
		$house_renthouse_rent= trim($_POST['house_rent']);
		$emp_other           = trim($_POST['emp_other']);
		$branchid            = trim($_POST['branchid']);
		$mobile              = trim($_POST['mobile']);
		$address              = trim($_POST['address']);
		$join_date = trim($_POST['join_date']);
		$date = date('Y-m-d');
		
		
		$str = mysql_query("select count(*),name from `tbl_emp_salary_sturcture` where name='$empname'");
		$res = mysql_fetch_row($str);
		
		if($res[0]==0) 
		{		
			$str  = "INSERT INTO `tbl_emp_salary_sturcture`(`name`,`category`,`basic`,`medical`,`house_rent`,`others`,`branchid`,`update_date`,`join_date`,`address`,`mobileno`)
			VALUES('$empname','$category',$basic_salary,$medical,$house_renthouse_rent,$emp_other, $branchid, '$date', '$join_date','$address','$mobile')";
			
			$r = mysql_query($str);			
			if($r){
			  echo "Data Saved Successfully!";
			}else{
			  echo "error!";
			}
		}else{
			echo 'This employeeid already exist with name '.$res[1];
		}
?>