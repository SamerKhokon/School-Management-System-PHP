<?php
				include("../db.php");
				
				$class_id    =trim($_POST["class_id"]);
				$roll_id       =trim($_POST["roll_id"]);
				$month_id  =trim($_POST["month_id"]);
				$amount_id=trim($_POST["amount_id"]);
				$branchid   =trim($_POST["branchid"]);
				
				$parse = explode("-",$month_id);
				$dd  = $parse[0];
				$mm= $parse[1];
				$yy  = $parse[2];
				
				$month_name = get_month_name($mm)."-".$yy;
							
				
				echo $str = "SELECT * FROM `std_voucher_summery` WHERE std_id='$roll_id' 
				AND MONTH='$month_name' and month_date='$month_date'";
				$sql = mysql_query($str);
				$res = mysql_fetch_row($sql);
				
				$voucherid          = $res[1];
				$classid              = $res[3];
				$payment_month = $res[4];
				$payment_year   = $res[5];
				$total_amount     = $res[6];				
				$payment_status = $res[7];
				$payment_date   = $res[8];
				$branchid            = $res[9];
				
				$pay_date = date('Y-m-d');
				
				if($payment_status=="Due") {				    
					$arear = get_arear_amount($total_amount ,$amount_id) ;					
					$parse_amnt = explode("_",$arear);
					$arear_amount = $parse_amnt[0];
					$ext = $parse_amnt[1];
					
					if($ext=="s") 
					{
						echo "Surplus: ".$arear_amount." ".$month_name;						
						
						$sts = "INSERT INTO `school`.`std_fee_payment_info`(
						`stu_id`,`class_id`,`month`,`year`,`voucher_id`,`amount`,`pay_date`, 
						`pay_amount`,`surplus_amount`,`pay_status`, `branch_id`)
						VALUES('$roll_id',$classid,'$payment_month','$payment_year','$voucherid','$total_amount', 
						'$pay_date',$amount_id,$arear_amount,'Paid',$branchid)";
						
						mysql_query($sts);
						
						$update_voucher_table = "update `std_voucher_summery` set payment_stat='Paid'  where std_id='$roll_id' and voucher_id='$voucherid'";
						mysql_query($update_voucher_table);
												
												
					}
					else if($ext=="a")
					{
					
						$stss = "INSERT INTO `school`.`std_fee_payment_info`(
						`stu_id`,`class_id`,`month`,`year`,`voucher_id`,`amount`,`pay_date`, 
						`pay_amount`,`arear_amount`,`pay_status`, `branch_id`)
						VALUES('$roll_id',$classid,'$payment_month','$payment_year','$voucherid','$total_amount', 
						'$pay_date',$amount_id,$arear_amount,'Due',$branchid)";
						
						mysql_query($stss);					
					
					}
					
					$s  = "SELECT 	`id`,`stu_id`, `class_id`, `month`, `amount`, 	 
							`pay_amount`, `arear_amount`, `surplus_amount`, `pay_date`,
							`pay_status` 	FROM 	`school`.`std_fee_payment_info` where branch_id=$branchid";
					$q = mysql_query($s);
?>					
	<html>
<head>
    <script type="text/javascript">
	  $(document).ready(function(){
		$('#example').dataTable({
		   "sPaginationType": "full_numbers"				
		});	          
	  });
	</script>
</head>
<body>
	<div id="container">		
			<div id="demo">
		
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					 <thead>
					 <tr> 
							  <th>Stuid</th>
							  <th>Class</th>
							  <th>Month</th>
							  <th>Neat Amount</th>
							  <th>Pay Amount</th>
							  <th>Arear</th>
							  <th>Surplus</th>
							  <th>Pay Date</th>
							  <th>Status</th>
						   </tr> 

					</thead>
					<tbody>
								<?php   $cn = 0;
								while( $rr = mysql_fetch_array($q) ) {
								                 $sl_no = $rr[0];
								                 $st_id = $rr[1];
								                 $cls_id =$rr[2];
												 $mnt    = $rr[3];
												 $amt   = $rr[4];
												 $p_amt = $rr[5];
												 $a_amt  = $rr[6];
												 $s_amt   = $rr[7];
												 $p_date = $rr[8];
												 $p_stat  = $rr[9];												 
												 $cn++;
												 if($cn%2==0)
												 echo "<tr class='bg'>";
												 else
												 echo "<tr>";
								}								
								?>             													
								    
									  <td><?php echo $st_id ; ?></td>
									  <td><?php echo $cls_id ; ?></td>
									  <td><?php echo $mnt ; ?></td>
									  <td><?php echo $amt ; ?></td>
									  <td><?php echo $p_amt ; ?></td>
									  <td><?php echo $a_amt ; ?></td>
									  <td><?php echo $s_amt ; ?></td>
									  <td><?php echo $p_date ; ?></td>
									  <td><?php echo $p_stat ; ?></td>
								   </tr> 								
					</tbody>	
					</tfoot>   
						   <tr> 
							  <td></td>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td></td>
						   </tr> 
					</tfoot>	   
					</table>
			</div>
			<div class="spacer"></div>
	</div>
</body>
</html>					
<?php					
				}else{
				   echo "Payment of ".$month_name ." is already paid";
				}
?>




















				
<?php				

               function get_arear_amount($total_amount , $given_amount) {
			       global $ar;
			       if($total_amount >= $given_amount ) {
				      $ar =  $total_amount - $given_amount;
					  $ar = $ar."_a";
				   }else if($total_amount <= $given_amount) {
				   	  $ar =  $given_amount - $total_amount;
					  $ar = $ar."_s";
				   }
				   return $ar;
			   }


				function get_month_name($mm) {
				    $mm = (int)$mm;
				    switch($mm) {
					   case 1: return "Jan";  break;
					   case 2: return "Feb";  break;
					   case 3: return "Mar";  break;
					   case 4: return "Apr";  break;
					   case 5: return "May";  break;
					   case 6: return "Jun";  break;
					   case 7: return "Jul";  break;
					   case 8: return "Aug";  break;
					   case 9: return "Sep";  break;
					   case 10: return "Oct";  break;
					   case 11: return "Nov";  break;
					   case 12: return "Dec";  break;					   
					   default:
					}
				}
				

				
?>