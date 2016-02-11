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

<?php	require_once('db.php');

       $class_id     = trim($_POST['class_id']);  
	   $class_sec    = trim($_POST['class_sec']);
	   $month 		 = trim($_POST['month']);
	   $roll         = trim($_POST['roll']);
	   $branch_id    = trim($_POST['branch_id']);
	   
	  	
	function get_section_id($class_id,$section_name,$branch_id) {
	  $st  = "SELECT id FROM `std_class_section_config` WHERE class_id=$class_id AND section_name='$section_name' and branch_id=$branch_id";
      $ss = mysql_query($st);	  
	  $rs = mysql_fetch_row($ss);
	  return $rs[0];
	}
	function get_section_name($class_id,$section_id,$branch_id) {
		$st  = "SELECT section_name FROM `std_class_section_config` WHERE class_id=$class_id AND id=$section_id and branch_id=$branch_id";
      $ss = mysql_query($st);	  
	  $rs = mysql_fetch_row($ss);
	  return $rs[0];	
	}	
	
		$section_id =  get_section_id($class_id,$class_sec,$branch_id);
		

		if($roll == "")  {
			$where = " WHERE class_id=$class_id AND checker_status='checked' and section_id=$section_id AND month='$month' AND 
			branch_id=$branch_id GROUP BY std_id"; 
		}else{
			$where = " WHERE class_id=$class_id AND checker_status='checked' and section_id=$section_id AND month='$month' AND 
			branch_id=$branch_id GROUP BY std_id"; 		
		}
		
         $str = "SELECT std_id,std_name,SUM(amount) as amount,month,class_id,class_name,section_id,checker_status FROM `std_fee_details`".$where;	    
		 $qr = mysql_query($str);		
?>

<br/><br/><br/>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <th>Student ID </th>
							   <th>Name</th>
							   <th>Class</th>
							   <th>Section</th>
							   <th>Amount</th>
							   <th>Month</th>
							   <th>Status</th>
							</tr>
						</thead>
						<tbody>
					 <?php
					      $count = 0;
						    $tot = 0;
							while ($res = mysql_fetch_assoc($qr)){
								$std_id = $res['std_id'];
								$std_name = $res['std_name'];
								$amount = $res['amount'];
								$months = $res['month'];
								$classid = $res['class_id'];
								$class_name =$res['class_name'];
								$sectionid = $res['section_id'];
								$section = get_section_name($class_id,$sectionid,$branch_id);
								$checker_status = $res['checker_status'];
							    $mod=$count%2;
								$tot  += $amount;
								if ($mod==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
							   echo  "<td>$std_id</td>";
							   echo  "<td>$std_name</td>";
							   echo  "<td>$class_name</td>";
							   echo  "<td>$section</td>";
							   echo  "<td>$amount</td>";
							   echo  "<td>$months</td>";
							   echo  "<td>$checker_status</td>";
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
								<th>Total: <?php echo $tot;?></th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
</body>
</html>
<br/>
<br/>
