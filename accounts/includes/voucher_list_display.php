<html>
<head>
<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
	});	
</script>
</head>
<body>		
<?php
	include('db.php');
	global $str;
	$class_id = trim($_POST['class_id']); 
	$roll     = trim($_POST['roll']);

	if($class_id == "" && $roll =="") {
		$str = "SELECT class_id,std_id,total_amnt,payment_stat,payment_date,month FROM std_voucher_summery";	
	}else if($class_id != "" && $roll ==""){
		$str = "SELECT class_id,std_id,total_amnt,payment_stat,payment_date,month FROM std_voucher_summery where class_id=$class_id";		
	}else if($class_id == "" && $roll !=""){
		$str = "SELECT class_id,std_id,total_amnt,payment_stat,payment_date,month FROM std_voucher_summery where std_id='$roll'";		
	}else if($class_id != "" && $roll !="") {
		$str = "SELECT class_id,std_id,total_amnt,payment_stat,payment_date,month FROM std_voucher_summery where std_id='$roll' and class_id=$class_id";		
	}
	
	//echo $class_id." ".$roll."  ".$str;
?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <th>Class</th>
							   <th>Student ID </th>
							   <th>Name</th>
							   <th>Total Amount</th>
							
							   <th>Payment Status</th>
							   <th>Month</th>
							   <th></th>
							</tr>
						</thead>
						<tbody>
					 <?php
					      $count = 0;
						  $qr = mysql_query($str);		
							while ($res = mysql_fetch_array($qr)){
								$class_id   = $res[0];
								$std_id	      = $res[1];
								$total_amnt   = $res[2];
								$payment_stat = $res[3];
								$payment_date = $res[4];
								$month        = $res[5];
								$name = get_student_name($std_id);
								$arear    = get_arear($std_id,$month);
								$surplus = get_surplus($std_id,$month);
								$total_arear = get_total_arear($std_id);
							    $mod=$count%2;
								if ($mod==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
							   echo  "<td>Class-$class_id </td>";
							   echo  "<td>$std_id</td>";
							   echo "<td>$name</td>";
							   echo  "<td>$total_amnt </td>";				
							   	//echo  "<td>$total_arear </td>";				
							   echo  "<td>$payment_stat </td>";
							   echo  "<td>$month</td>";
							   if($payment_stat=="Due") {
							   ?>
							   <td><a href="../fee_voucher.php?std_id=<?php echo $std_id;?>&cls=<?php echo $class_id;?>&mnt=<?php echo $month;?>" target="_blank">Print</a></td>
							   <?php
							   }else{
							     echo "<td>&nbsp;</td>";
							   }
							   echo "</tr>";		
							 $count++;
							}	
						?>
						</tbody>
						<tfoot>
							<tr>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								
								<th>&nbsp;</th>
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
</body>
</html>
<?php
           function get_student_name($stdid) {
		      $st = "select name from std_profile where stu_id='$stdid'";
			  $sq = mysql_query($st);
			  $rs = mysql_fetch_row($sq);
			  return $rs[0];
		   }
           function get_arear($std_id,$month) {
		        $str = "SELECT arear_amount  FROM `std_fee_payment_info`
				WHERE stu_id='$std_id' AND MONTH='$month'";   
                $sql =  mysql_query($str);
				$res = mysql_fetch_row($sql);
				if($res[0]=="" )
				return 0;
				else
				return $res[0];
		   }
		   function get_total_arear($std_id){
					$str = "SELECT SUM(total_amnt) FROM `std_voucher_summery` WHERE 
					payment_stat='Due' AND std_id='$std_id'";
					$sql = mysql_query($str);
					$rs = mysql_fetch_row($sql);
					if($rs[0]=="" || $rs[0]==0)
					return 0;
					else
					return $rs[0];
		   }
           function get_surplus($std_id,$month) {
		        $str = "SELECT surplus_amount  FROM `std_fee_payment_info`
				WHERE stu_id='$std_id' AND MONTH='$month'";   
                $sql =  mysql_query($str);
				$res = mysql_fetch_row($sql);
				if($res[0]=="" )
				return 0;
				else				
				return $res[0];
		   }		   
?>