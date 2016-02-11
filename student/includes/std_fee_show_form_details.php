<?php
		         include("../db.php");
			   
			     $std_roll         = trim($_GET['roll']);
				 $month_name = trim($_GET['month']); 
				 $branchid       = trim($_GET["bid"]);				 
				$str = "SELECT roll,fee_head_name,amount,class_id FROM std_fee_details WHERE roll=$std_roll AND MONTH='$month_name' AND branch_id=$branchid";				
				 $qry = mysql_query($str);
				 
?>		


<div  id="content" class="box">

		 
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />		
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"	
			
				} );
			} );
		</script>		
	</head>

	<body id="dt_example" class="example_alt_pagination">
		<div id="container">		
				<div id="demo">		
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							  <th>Roll</th >
							  <th>Class</th>
							  <th>Fee Name</th>          
							  <th>&nbsp;&nbsp;Amount</th>
							</tr>
						</thead>
						<tbody>				 
				 
							<?php 				 
											 $sum = 0;
											 $count = 0 ;
											 while( $res = mysql_fetch_array($qry)  ) {
												   $roll                    = $res[0];
												   $fee_head_name = $res[1];
												   $amount              = $res[2];												   
												   $class_id             = $res[3];
												   $sum += $amount;
												   
												   if($count%2==0)
												    echo "<tr class='bg'>";
												   else
												   echo "<tr>";
?>												   
												   
												   
												<td><?php   echo $roll;?></td>
												<td><?php echo get_class_name($class_id);?></td>
												<td><?php   echo $fee_head_name;?></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php   echo $amount; ?> Taka</td>
												   
								</tr>					
<?php 					 } 				?>
									</tbody>
										<tfoot>
											<tr>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
												<th>Total : <span style='color:brown;'><?php echo $sum;?>Taka</span></th>
										</tfoot>
									</table>
												</div>
												<div class="spacer"></div>
												</div>
	</body>   
</html>	
</div>						
<?php 
          function get_class_name($class_id ) {
		         $str = "select class_name from std_class_config where id=$class_id";
				 $qry =mysql_query($str);
				 $res = mysql_fetch_row($qry);
				 return $res[0];
		  }
?>