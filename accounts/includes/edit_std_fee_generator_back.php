<?php
		include ('db.php');
		$btn_value = trim($_POST['btn_value']);  
	


/*********************************
    fixed fee insert for a class
	if exist first delete then 
	again insert	
**********************************/	
		
if ( $btn_value == 'fixed_fee' ) {

		  $field       = trim($_POST['field']);
		  $class_id    = trim($_POST['class_id']);
		  $sec_id      = trim($_POST['sec_id']);
		  $month       = trim($_POST['month']);
		  $year        = trim($_POST['year']);
		  $branch_id   = trim($_POST['branch_id']);
		  $pay_date    = trim($_POST['pay_date']);
		  $cnt         = trim($_POST['cnt']);
		
		    $dateparse = explode("-",$pay_date);
			$dd   = $dateparse[0];
			$mm = $dateparse[1];
		    $yy   = $dateparse[2];
		   $new_paydate = $yy."-".$mm."-".$dd;		
		   $new_paydate = trim($new_paydate);
		
		    $pay_month = $month."-".$year;
		
		//echo "filed:".$field."  classid:".$class_id."  secid:".$sec_id."  month:".$month." year:".$year;
		//echo " branchid:".$branch_id." paydate:".$pay_date."  counter:".$cnt;
		
		
		 $cnt_str = "select count(*) from std_fee_details where class_id='$class_id' and section_id='$sec_id' and month='$pay_month' and category='fixed' and collection_status!='paid' and branch_id='$branch_id'";
         $cnt_sql = mysql_query($cnt_str);		 
		 $cnt_res = mysql_fetch_row($cnt_sql);         $cnt_row = $cnt_res[0];
		   // if previously generated fee thend first delete previous fee	  
		   // and after deletion fee again insert newly fee
		   if($cnt_row>0)
		   {
				echo $del_class = "delete from std_fee_details where class_id='$class_id' and section_id=$sec_id and month='$pay_month' and category='fixed' and branch_id='$branch_id'";
				$del_qry   = mysql_query($del_class);	  
	       }
	  
			$fields = explode(",",$field);
			for( $j = 0 ; $j<$cnt ; $j++) 
			{
				$sq1 = "select amount from tbl_class_fee_info,tbl_class_feehead where class_id='$class_id' and
						 tbl_class_feehead.id=tbl_class_fee_info.fee_head_id and tbl_class_fee_info.branch_id='$branch_id' and
						 tbl_class_feehead.fee_head='".$fields[$j]."'";
				  
				  $sq2 = mysql_query($sq1);
				  $ro  = mysql_fetch_array($sq2);
				  $field2[$j] = $ro['amount'];
			} 
			
			$sec_name = find_section($sec_id,$class_id) ;
			$class_std="select stu_id,class_roll,stu_name,class_name,class_sec from std_class_info where class_id=$class_id and class_sec='$sec_name' and branch_id=$branch_id";
			$class_std_result=mysql_query($class_std);
		
			while ($row_class_std=mysql_fetch_array($class_std_result))
			{
				$stu_id         = $row_class_std[0];
				$std_roll       = $row_class_std[1];
				$std_name       = $row_class_std[2];
				$std_class_name = $row_class_std[3];
				$std_class_sec  = $row_class_std[4];
		
				for($i=0;$i< count($fields);$i++)	
				{
					$ins = "insert into std_fee_details(class_id,section_id,class_name,std_id,roll,std_name,fee_head_name,amount,category,month,payment_date,branch_id,generation_status,checker_status,collection_status) ";
					$ins .= "values($class_id,$sec_id,'$std_class_name','$stu_id',$std_roll,'$std_name','".$fields[$i]."','".$field2[$i]."','fixed','$pay_month','$new_paydate',$branch_id,'initiate','unchecked','unpaid')";
					//echo $ins;
					$ins2=mysql_query($ins);						   
				} 
			}
		echo 	"Data saved successfully......";
}




/**************************************
    individual student fee insert of 
	a class
***************************************/

	elseif( $btn_value == 'btn_abs_day' )  {
		  $std_roll    = $_POST['std_roll'];
		  $std_abs_day = $_POST['std_abs_day'];
		  $class_id    = $_POST['class_id'];
		  $sec_id      = $_POST['sec_id'];
		  $month       = $_POST['month'];
		  $year        = $_POST['year'];
		  $branch_id   = $_POST['branch_id'];
		  $pay_date    = $_POST['pay_date'];	  
		  $pay_month   = $month."-".$year;	 
		

		$chk_str = "select count(*) from std_fee_details where checker_status='checked' and class_id=$class_id and section_id=$sec_id and month='$pay_month' and branch_id=$branch_id and roll=$std_roll";    	
		$chk_sql = mysql_query($chk_str);
		$chk_res = mysql_fetch_row($chk_sql);
		
		$counter_chk = $chk_res[0];
		 
		
		if($counter_chk==0) 
		{ 
			$del_class = "delete from std_fee_details where checker_status='unchecked' and class_id='$class_id' and section_id='$sec_id' and month='$pay_month' and fee_head_name='absence' and branch_id='$branch_id' and roll='$std_roll' ";
			$del_qry   = mysql_query($del_class);		
			
			$class_std = "select stu_id,class_name,stu_name from std_class_student_info where class_id='$class_id' and sec_id='$sec_id' and branch_id='$branch_id' and class_roll=$std_roll limit 1";
			$class_std_result = mysql_query($class_std);
			$class_std_rows  = mysql_fetch_array($class_std_result);					
			$stu_id               = $class_std_rows[0];	
			$std_class_name = $class_std_rows[1];
			$std_name          = $class_std_rows[2];
			
			$fee_qry    = "select amount from tbl_class_fee_info where class_id='$class_id' and branch_id='$branch_id' and fee_head_id in(select id from tbl_class_feehead where fee_head='absence') ";
			$fee_result    = mysql_query($fee_qry);				
			$fee_rows     = mysql_fetch_array($fee_result);					
			$abs_amount = $fee_rows[0];				
				
			$fee_amount = $std_abs_day * $abs_amount;
			//echo $stu_id  .	$std_class_name . $std_name .$abs_amount.$fee_amount;
			
			$ins = "insert into std_fee_details(class_id,section_id,class_name,std_id,roll,std_name,fee_head_name,amount,category,month,payment_date,branch_id,generation_status,collection_status) values('$class_id','$sec_id','$std_class_name','$stu_id','$std_roll','$std_name','absence','$fee_amount','abs','$pay_month','$pay_date','$branch_id','initiate','unpaid')";						  
			//echo $ins;	
			$ins2 = mysql_query($ins);
			echo 'Data saved successfully!';
		}
		else
		{
			echo 'Fee already checked you can`t get selected operation!!!';
		}
	}
	
	/**********************************************
		other fee insert of a class
	***********************************************/
  
	elseif(  $btn_value == 'btn_other' )  {
		  $std_roll          = $_POST['std_roll'];
		  $class_id         = $_POST['class_id'];
		  $sec_id           = $_POST['sec_id'];
		  $sec_id           = $_POST['sec_id'];
		  $month            = $_POST['month'];
		  $year              = $_POST['year'];
		  $branch_id      = $_POST['branch_id'];
		  $pay_date       = $_POST['pay_date'];
		  $head_name    = $_POST['head_name'];
		  $head_amount = $_POST['head_amount'];
		  $head_cate     = "other";  
		  $pay_month    = $month."-".$year;


		 $chk_str = "select count(*) from std_fee_details where checker_status='unchecked' and class_id=$class_id and section_id=$sec_id and month='$pay_month' and branch_id=$branch_id and roll=$std_roll";    	
		 $chk_sql = mysql_query($chk_str);
		 $chk_res = mysql_fetch_row($chk_sql);
		
		 $counter_chk = $chk_res[0];
		   
			if($counter_chk>0) 
			{
		  
				$del_class = "delete from std_fee_details where class_id='$class_id' and section_id='$sec_id' and month='$pay_month' and fee_head_name='$head_name' and branch_id=$branch_id  and roll='$std_roll'";
				$del_qry    = mysql_query($del_class);	
					
				$class_std = "select stu_id,class_name,stu_name from std_class_student_info where class_id=$class_id and sec_id=$sec_id and branch_id=$branch_id and class_roll=$std_roll limit 1";
				$class_std_result = mysql_query($class_std);
				$class_std_rows   = mysql_fetch_array($class_std_result);					
				$stu_id         = $class_std_rows[0];	
				$std_class_name = $class_std_rows[1];
				$std_name       = $class_std_rows[2];
				//echo $stu_id.$std_class_name.$std_name;
									  
				$ins="insert into std_fee_details(class_id,section_id,class_name,std_id,roll,std_name,fee_head_name,amount,category,month,payment_date,branch_id,generation_status,collection_status) values('$class_id','$sec_id','$std_class_name','$stu_id','$std_roll','$std_name','$head_name','$head_amount','$head_cate','$pay_month','$pay_date','$branch_id','initiate','unpaid')";
				//echo $ins;
				$ins=mysql_query($ins);
				echo 'Data saved successfully';
			}else{
				echo 'Fee already checked you can`t get selected operation!!!';
			}
	}


	/***************************************
	   Payslip generate block of a class
	****************************************/
	else if ( $btn_value == 'Generate Payslip' )  
	{          	
		$yearmonth  = $_POST["yearmonth"];
		$class_id   = $_POST["class_id"];
		$sec_id     = $_POST["sec_id"];
		$branchid   = $_POST["branchid"];			
		
		$checker_str = "SELECT COUNT(checker_status) FROM std_fee_details WHERE checker_status!='unchecked' and class_id=$class_id 
		and section_id=$sec_id and branch_id=$branchid and month='$yearmonth'";
        $checker_sql = mysql_query($checker_str); 	
		$checker_res = mysql_fetch_row($checker_sql);
		
		$counter = $checker_res[0];
		if($counter > 0) 
		{	
		
			$prs 	= explode("-",$yearmonth);
			$years  = $prs[1];	
			$fee_str = "SELECT *,SUM(amount) as 'sum' FROM std_fee_details WHERE MONTH='$yearmonth' AND class_id=$class_id AND section_id=$sec_id AND branch_id=$branchid GROUP BY std_id";	
			$str = mysql_query($fee_str);
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
				
				if($duplicate_counter == 0 )  
				{
					$new_voucher_id = $voucher_id.$std_id;					   
					$insert = "INSERT INTO `school`.`std_voucher_summery` (`voucher_id`,`std_id`,`class_id`,`month`,`year`,`total_amnt`,`payment_stat`, 
					`payment_date`,`branch_id`)	VALUES('$new_voucher_id','$std_id',$class_id,'$bill_month','$years',$total_amount,'$payment_status', 
					'$payment_date',$branch_id);"; 				
					
					mysql_query($insert);			
				}
				else
				{
					$update_voucher = "update `school`.`std_voucher_summery` set total_amnt=$total_amount  where month='$bill_month' and year='$years' and std_id='$std_id'";
					mysql_query($update_voucher);
				}
				/*****************************************
				******* voucher/ payslipp portion start
				********************************************/
				
				
				
				/***************************************************
				*****   fee collection table   
				*****	data insert portion			
				***************************************************/
				$std_id          = $res['std_id'];
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
				
				$fee_collection_str    = "select status,count(*) from `std_fee_collection` where std_id='$std_id' and class_id=$class_id and section='$ur_section_name' and month='$yearmonth'";
				$fee_collection_sql    = mysql_query($fee_collection_str);
				$fee_collection_res    = mysql_fetch_row($fee_collection_sql);				
				$fee_collection_count  = $fee_collection_res[1];	
				$fee_collection_status = $fee_collection_res[0];
				
				if($fee_collection_count==0) 
				{
				    if($fee_collection_status!="paid") 
					{
						$in_str = "INSERT INTO `school`.`std_fee_collection`(`std_id`,`std_name`,`class_id`,`class_name`,`section`,`class_roll`, 
						`amount`,`month`,`pay_date`,`status`,`branch_id`)	VALUES('$std_id','$std_name',$class_id,'$class_name','$ur_section_name', 
						$class_roll,$total_amount,'$yearmonth','','$pay_status',$branch_id);";
						mysql_query($in_str);
					}
					else
					{
					    $upstr = "update `school`.`std_fee_collection` set amount=$total_amount where month='$yearmonth' and std_id='$std_id' and class_id=$class_id and section='$ur_section_name' and branch_id=$branch_id";
						mysql_query($upstr);
					}
				}
				else
				{
					    $upstr = "update `school`.`std_fee_collection` set amount=$total_amount where month='$yearmonth' and std_id='$std_id' and class_id=$class_id and section='$ur_section_name' and branch_id=$branch_id";
						mysql_query($upstr);
				}						
			}
			echo 'Successfully generated payslip!!!';
		}else{
		   echo "After checker authentication you can generate payslip!";
		}	
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
	   return date('Ymdhis',time()).three_digit_random_number();
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

	
	/*******************************************************************************
		SELECT DISTINCT std_id,std_name,class_name,section_id,
		(SELECT section_name FROM std_class_section_config WHERE id=section_id) AS
		section,collection_status AS section FROM `std_fee_details` AS a
		LEFT JOIN `std_fee_collection` AS b
		 ON a.std_id=b.std_id AND a.class_id=b.class_id AND 
		 a.month=b.month AND a.collection_status='paid'; 
	********************************************************************************/
?>