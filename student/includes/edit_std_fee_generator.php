<?php
		include ('db.php');
		$btn_value = $_POST['btn_value'];  
		
if ($btn_value=='fixed_fee'){
      $field     = $_POST['field'];
	  $class_id  = $_POST['class_id'];
	  $sec_id    = $_POST['sec_id'];
  	  $month     = $_POST['month'];
	  $year      = $_POST['year'];
 	  $branch_id = $_POST['branch_id'];
      $pay_date  = $_POST['pay_date'];
      $cnt       = $_POST['cnt'];
	
	  $pay_month = $month."-".$year;	  
	  $del_class = "delete from std_fee_details where class_id='$class_id' and section_id='$sec_id' and month='$pay_month' and category='fixed' and branch_id='$branch_id'";
      $del_qry   = mysql_query($del_class);	  
	  
	  
	/* tution fees and tution fee title */  
	  //$field = substr($field, 1);
		$field = explode(",",$field);
		for( $j = 0 ; $j<$cnt ; $j++) {
			  $sq1 = "select amount from tbl_class_fee_info,tbl_class_feehead where class_id='$class_id' and
					 tbl_class_feehead.id=tbl_class_fee_info.fee_head_id and tbl_class_fee_info.branch_id='$branch_id' and
					 tbl_class_feehead.fee_head='".$field[$j]."'";
			  
					$sq2 = mysql_query($sq1);
					$ro  = mysql_fetch_array($sq2);
					$field2[$j] = $ro['amount'];
		} 		 
		// print_r($field2);
		 
	    $class_std="select stu_id,class_roll,stu_name,class_name,class_sec from std_class_student_info where class_id=$class_id and sec_id=$sec_id and branch_id=$branch_id";
	    $class_std_result=mysql_query($class_std);
	
	    while ($row_class_std=mysql_fetch_array($class_std_result)){
            $stu_id   = $row_class_std[0];
			$std_roll = $row_class_std[1];
			$std_name = $row_class_std[2];
			$std_class_name = $row_class_std[3];
			$std_class_sec  = $row_class_std[4];
			
            //echo "<tr><td>$stu_id</td><td>$std_roll</td>
		//<td>$std_name</td><td>$std_class_name</td><td>$std_class_sec</td></tr>";			
  	
			 for($i=0;$i< count($field);$i++)	{
  	            $ins = "insert into std_fee_details(class_id,section_id,class_name,std_id,roll,std_name,fee_head_name,amount,category,month,payment_date,branch_id,generation_status,collection_status) ";
				$ins .= "values($class_id,$sec_id,'$std_class_name','$stu_id',$std_roll,'$std_name','".$field[$i]."','".$field2[$i]."','fixed','$pay_month','$pay_date',$branch_id,'initiate','unpaid')";
				$ins2=mysql_query($ins);						   
			} 
	    }
		echo 'Data Saved Successfully';
}

elseif($btn_value=='btn_abs_day') {
	  $std_roll    = $_POST['std_roll'];
	  $std_abs_day = $_POST['std_abs_day'];
	  $class_id    = $_POST['class_id'];
	  $sec_id      = $_POST['sec_id'];
	  $month       = $_POST['month'];
	  $year        = $_POST['year'];
	  $branch_id   = $_POST['branch_id'];
	  $pay_date    = $_POST['pay_date'];	  
	  $pay_month   = $month."-".$year;
	  
	$del_class = "delete from std_fee_details where class_id='$class_id' and section_id='$sec_id' and month='$pay_month' and fee_head_name='absence' and branch_id='$branch_id' and roll='$std_roll' ";
    $del_qry   = mysql_query($del_class);		
	
	$class_std = "select stu_id,class_name,stu_name from std_class_student_info where class_id='$class_id' and sec_id='$sec_id' and branch_id='$branch_id' and class_roll=$std_roll limit 1";
	$class_std_result = mysql_query($class_std);
	$class_std_rows = mysql_fetch_array($class_std_result);					
	$stu_id         = $class_std_rows[0];	
	$std_class_name = $class_std_rows[1];
    $std_name       = $class_std_rows[2];
	
    $fee_qry    = "select amount from tbl_class_fee_info where class_id='$class_id' and branch_id='$branch_id' and fee_head_id in(select id from tbl_class_feehead where fee_head='absence') ";
	$fee_result = mysql_query($fee_qry);				
    $fee_rows   = mysql_fetch_array($fee_result);					
 	$abs_amount = $fee_rows[0];				
		
	$fee_amount = $std_abs_day * $abs_amount;
	//echo $stu_id  .	$std_class_name . $std_name .$abs_amount.$fee_amount;
	
	$ins="insert into std_fee_details(class_id,section_id,class_name,std_id,roll,std_name,fee_head_name,amount,category,month,payment_date,branch_id,generation_status,collection_status) values('$class_id','$sec_id','$std_class_name','$stu_id','$std_roll','$std_name','absence','$fee_amount','abs','$pay_month','$pay_date','$branch_id','initiate','unpaid')";						  
	//echo $ins;
	
	$ins2=mysql_query($ins);
	echo 'Data Saved Successfully';
}
 
elseif(  $btn_value == 'btn_other' )  {
      $std_roll    = $_POST['std_roll'];
      $class_id    = $_POST['class_id'];
	  $sec_id      = $_POST['sec_id'];
  	  $sec_id      = $_POST['sec_id'];
   	  $month       = $_POST['month'];
	  $year        = $_POST['year'];
 	  $branch_id   = $_POST['branch_id'];
      $pay_date    = $_POST['pay_date'];
      $head_name   = $_POST['head_name'];
      $head_amount = $_POST['head_amount'];
      $head_cate   = "other";  
      $pay_month   = $month."-".$year;
	
	$del_class = "delete from std_fee_details where class_id='$class_id' and section_id='$sec_id' and month='$pay_month' and fee_head_name='$head_name' and branch_id='$branch_id'  and roll='$std_roll'";
    $del_qry   = mysql_query($del_class);	
		
	$class_std = "select stu_id,class_name,stu_name from std_class_student_info where class_id='$class_id' and sec_id='$sec_id' and branch_id='$branch_id' and class_roll=$std_roll limit 1";
	$class_std_result = mysql_query($class_std);
	$class_std_rows   = mysql_fetch_array($class_std_result);					
	$stu_id         = $class_std_rows[0];	
	$std_class_name = $class_std_rows[1];
    $std_name       = $class_std_rows[2];
	//echo $stu_id.$std_class_name.$std_name;
						  
    $ins="insert into std_fee_details(class_id,section_id,class_name,std_id,roll,std_name,fee_head_name,amount,category,month,payment_date,branch_id,generation_status,collection_status) values('$class_id','$sec_id','$std_class_name','$stu_id','$std_roll','$std_name','$head_name','$head_amount','$head_cate','$pay_month','$pay_date','$branch_id','initiate','unpaid')";
	//echo $ins;
	$ins=mysql_query($ins);
	echo 'Data Saved Successfully';
}


/**  final task **/
// voucherid exist or not


else if ( $btn_value == 'Generate Payslip') {          //'gen_pay_slip' )   {	
	$yearmonth  = $_POST["yearmonth"];
	$class_id   = $_POST["class_id"];
	$sec_id     = $_POST["sec_id"];
	$branchid   = $_POST["branchid"];		
	
	$fee_str = "SELECT *,SUM(amount) as 'sum' FROM std_fee_details WHERE MONTH='$yearmonth' AND class_id=$class_id AND section_id=$sec_id AND branch_id=$branchid GROUP BY std_name";
	$str = mysql_query($fee_str);
	while($res = mysql_fetch_array($str))  {
		$voucher_id     = date('Ymdhis',time()).rand(10,1000);
		$std_id         = $res['std_id'];  
		$payment_status = 'Due';
		$payment_date   = $res['payment_date'];
		
		$date_parse = explode("-",$payment_date);
		$d = $date_parse[0];
		$m = $date_parse[1];
		$y = $date_parse[2];
		$new_payment_date = $y."-".$m."-".$d;
		
		$branch_id      = $res['branch_id'];  
		$total_amount   = $res['sum'];
		$duplicate_counter = slipno_duplicacy_checker($voucher_id);
		if($duplicate_counter==0) {
		   $new_voucher_id = $voucher_id.$stid;
		   $insert = "INSERT INTO `school`.`std_voucher_summery` 
			(`voucher_id`,`std_id`,`total_amnt`,`payment_stat`, 
			`payment_date`,`branch_id`)	VALUES($new_voucher_id,$std_id,$total_amount,'$payment_status', 
			'$new_payment_date',$branch_id);"; 
           mysql_query($insert);			
		}
	}
}

function slipno_duplicacy_checker($voucher_id)   {
   $str = mysql_query("select count(*) from std_voucher_summery where voucher_id=$voucher_id");
   $rs = mysql_fetch_row($str);
   return $rs[0];
}

















/*
	$sel_fee_info = "select std_id from std_fee_info where date like '$yearmonth%' and class_id=$class_id and sec_id=$sec_id and branch_id=$branchid group by std_id";
	//mysql_query("insert into test (value) values('$sel_fee_info')");					
	$result_fee_info = mysql_query($sel_fee_info);
	
	while($row_fee_info = mysql_fetch_array($result_fee_info)){
		//mysql_query("insert into test (value) values('sumanb')");					
		$stu_id = $row_fee_info['std_id'];
		//mysql_query("insert into test (value) values('$stu_id')");					
		
		$slip_id = date('Ymdhis',time()).rand(10,1000);
		$update_sql = "update std_fee_info set voucher_id=$slip_id where std_id=$stu_id and date like '$yearmonth%' and class_id=$class_id and sec_id=$sec_id and branch_id=$branchid ";
		mysql_query($update_sql);
	}*/

?>