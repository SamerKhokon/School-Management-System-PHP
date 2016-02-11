<?php
		include('db.php');
		$employeeid   = $_POST['employeeid'];
		$empname      = $_POST['empname'];
		$category     = $_POST['category'];
		$basic_salary = $_POST['basic_salary'];
		$medical      = $_POST['medical'];
		$house_renthouse_rent= $_POST['house_rent'];
		$emp_other           = $_POST['emp_other'];
		$branchid            = $_POST['branchid'];
		$date = date('Y-m-d');
			
		
		$str = mysql_query("select count(*),name from `tbl_emp_salary_sturcture` where empid=$employeeid");
		$res = mysql_fetch_row($str);
		
		if($res[0]==0) {		
			$str  = "INSERT INTO `school`.`tbl_emp_salary_sturcture`(`empid`, 
			`name`,`category`,`basic`,`medical`,`house_rent`,`others`,`branchid`,`update_date`)
			VALUES($employeeid,'$empname','$category',$basic_salary,$medical,$house_renthouse_rent,$emp_other, $branchid, '$date')";
			
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