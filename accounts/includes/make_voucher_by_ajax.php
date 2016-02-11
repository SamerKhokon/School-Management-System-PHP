	<?php require_once("../db.php");
		$yearmonth  = $_POST["yearmonth"];
		$class_id   = $_POST["class_id"];
		$branchid   = $_POST["branchid"];
		$prse = explode("-",$yearmonth);
		$month = $prse[0];
		$year  = $prse[1];		
		$month_date = $year.'-'.date('m',strtotime($month)).'-01';
		
		$checker_str = "SELECT COUNT(checker_status) FROM std_fee_details WHERE checker_status='checked' and class_id=$class_id 
			and branch_id=$branchid and month_date='$month_date' and month='$yearmonth'";
        $checker_sql = mysql_query($checker_str); 	
		$checker_res = mysql_fetch_row($checker_sql);		
		$counter = $checker_res[0];
		
		$voucher_summery_str = "select count(*) from std_voucher_summery 
		where branch_id=$branchid and month_date='$month_date' and month='$yearmonth' and class_id=$class_id";
        $voucher_summery_sql =mysql_query($voucher_summery_str);		
		$voucher_summery_res = mysql_fetch_row($voucher_summery_sql);
		
		if($counter > 0 && $voucher_summery_res[0]==0) 
		{			
			$prs 	 = explode("-",$yearmonth);
			$years   = $prs[1];	
			$fee_str = "SELECT *,SUM(amount) as 'sum' FROM std_fee_details WHERE MONTH='$yearmonth' and month_date='$month_date' AND class_id=$class_id AND branch_id=$branchid GROUP BY std_id";	
			$str     = mysql_query($fee_str);
			
			while($res = mysql_fetch_array($str))  
			{
			
			    /******************************************* 
			    // voucher/ payslipp portion start
				**********************************************/				
				$voucher_id        = voucher_id_generate();
				$std_id            = $res['std_id'];  
				$payment_status    = 'due';
				$payment_date      = $res['payment_date'];
				$bill_month        = $res['month'];						
				$branch_id         = $res['branch_id'];  
				$total_amount      = $res['sum'];
				$duplicate_counter = slipno_duplicacy_checker($std_id ,$payment_date);							
				
				
				$std_name        = $res['std_name'];
				$class_id        = $res['class_id'];
				$class_name      = $res['class_name'];
				$sectionid       = $res['section_id'];
				$class_roll      = $res['roll'];
				$amount          = $res['amount'];
				$pay_date        = '';
				$pay_month       = $res[8];
				$pay_status      = 'due';					
				$ur_section_name = find_section($sectionid , $class_id);
								
				
				if($duplicate_counter == 0 )  
				{								   
					$insert = "INSERT INTO `school`.`std_voucher_summery` (`voucher_id`,`std_id`,`class_id`,`month`,`year`,`month_date`,`total_amnt`,`payment_stat`, 
					`payment_date`,`branch_id`)	VALUES('$voucher_id','$std_id',$class_id,'$bill_month','$years','$month_date',$total_amount,'$payment_status', 
					'$payment_date',$branch_id);"; 				
					
					mysql_query($insert);			
				
				    $in_str = "INSERT INTO `school`.`std_fee_collection`(`std_id`,`std_name`,`class_id`,`class_name`,`section`,`class_roll`, 
						`amount`,`month`,`month_date`,`pay_date`,`status`,`branch_id`)	VALUES('$std_id','$std_name',$class_id,'$class_name','$ur_section_name', 
						$class_roll,$total_amount,'$yearmonth','$month_date','','$pay_status',$branch_id);";
						mysql_query($in_str);
				
				}
			}
			echo 'Successfully generated payslip!!!';
		}else if($counter==0 && $voucher_summery_res[0]==0){
		   echo "After checker authentication you can generate payslip!";
		}else if($counter>0 && $voucher_summery_res[0]>0){
		   echo "Already generated payslip of month $yearmonth!";
		}	
		
		
	function find_section_section_id($section_name,$class_id) 
	{
	   $str = "SELECT id FROM `std_class_section_config` WHERE section_name='$section_name' and class_id=$class_id";
	   $sql = mysql_query($str);
	   $res = mysql_fetch_row($sql);
	   return $res[0];
	}
	
	function find_section($section_id,$class_id) 
	{
	   $str = "SELECT section_name FROM `std_class_section_config` WHERE id=$section_id and class_id=$class_id";
	   $sql = mysql_query($str);
	   $res = mysql_fetch_row($sql);
	   return $res[0];
	}
	
	//utility function 
	function three_digit_random_number() 
	{
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$string = '';
		for ($i = 0; $i < 3; $i++)
		{
			$pos = rand(0, strlen($chars)-1);
			$string .= $chars{$pos};
		}		
		return  $string;
	}

	function voucher_id_generate() 
	{
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$string = '';
		for ($i = 0; $i <= 2; $i++)
		{
			$pos = rand(0, strlen($chars)-1);
			$string .= $chars{$pos};
		}			
	   return date('Ymdhis').$string;
	}

	function slipno_duplicacy_checker($std_id , $payment_date)   
	{
	   $str = mysql_query("select count(*) from std_voucher_summery where std_id='$std_id' and payment_date='$payment_date'");
	   $rs = mysql_fetch_row($str);
	   if($rs[0]=="" || $rs[0]==0)
		return 0;
	   else
		return $rs[0];
	}

	function no_of_voucher(){
	   $str = "SELECT COUNT(*) FROM `std_voucher_summery`";
	   $sql = mysql_query($str);
	   $res = mysql_fetch_row($sql);
	   if($res[0]=='')
	   return 1;
	   else 
	   return $res[0];
	}
	
	?>