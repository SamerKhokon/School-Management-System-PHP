<?php	include("../db.php");
			$class_id         = trim($_POST["class_id"]);
			$roll                  = trim($_POST["roll"]);
			$branchid         = trim($_POST["branchid"]);
			$month_name = trim($_POST["month_name"]);
						
			$parse = explode("-",$month_name);
			$day      = (int)$parse[0];
			$month = (int)$parse[1];
			$year     = $parse[2];

			
			
			
			/*********
			    sometimes month 
				name will be get full name
				this will be 3 character
			**********/
			
			$ur_month = get_month_name($month)."-".$year;
			
			if($roll=="") {
					$str = "SELECT  roll,class_id,SUM(amount),month FROM std_fee_details 
					WHERE branch_id=$branchid AND MONTH='$ur_month' AND class_id=$class_id 
					GROUP BY roll ORDER BY roll ASC";
           }else{
					$str = "SELECT  roll,class_id,SUM(amount),month FROM std_fee_details 
					WHERE branch_id=$branchid AND MONTH='$ur_month' AND class_id=$class_id and roll=$roll 
					GROUP BY roll ORDER BY roll ASC";		   
		   }
			  //echo $str;			   
			  
			  
				$fee_query = mysql_query($str) ; 
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />		
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {	"sPaginationType": "full_numbers"	} );
			} );
		</script>
	</head>
	<body id="dt_example" class="example_alt_pagination">
		<div id="container">		 
				<div id="demo">		
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							  <th>Roll</th>          
							  <th>Class</th>
							  <th>Fee Amount</th>
							  <th>Month</th>
							  <th>Detail</th>
							</tr>
						</thead>
						<tbody>				
<?php     $count = 0 ; 	
                $sum   = 0;			
				while($fee_res = mysql_fetch_array($fee_query)  ) {
				         $std_roll   = $fee_res[0];
						 $class_id = $fee_res[1];
						 $amount   = $fee_res[2];
						 $month_name = $fee_res[3];
						 $sum += $amount;
						 $count ++;
						 if( $count %2 == 0 )
							echo "<tr class='bg'>";
						 else
							echo "<tr>";
?>						 
							    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $std_roll;   ?></td>
								<td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo get_stdclass_name($class_id);  ?></td>
								<td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $amount;    ?> Taka</td>
								<td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $month_name;    ?> </td>
								<td ><a href="?SM_id=3&menu_id=3&nev=std_fee_show_form_details&roll=<?php echo $std_roll;    ?>&month=<?php echo $month_name;?>&bid=<?php echo $branchid;?>">Fee Detail</a></td>								
							</tr>
<?php 	} ?>
									</tbody>
										<tfoot>
											<tr>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
												<th>Total: <span style="color:brown;"><?php  echo $sum; ?> Taka</span></th>
												<th>&nbsp;</th>
												<th>&nbsp;</th>
											</tr>
										</tfoot>
									</table>
					</div>
					<div class="spacer"></div>
			</div>
	</body>
</html>	
<?php 
			function get_month_name($month) 
			{
			        switch($month) {
					   case 1: 
					      return "Jan";
						  break;
					   case 2: 
						  return "Feb";
						  break;
					   case 3: 
							return "Mar";
							break;
					   case 4: 
							return "Apr";
							break;
					   case 5: 
							return "May";
							break;
					   case 6: 
							return "Jun";
							break;
					   case 7: 
							return "Jul";
							break;
					   case 8: 
							return "Aug";
							break;
					   case 9: 
							return "Sep";
							break;
					   case 10: 
							return "Oct";
							break;
					   case 11: 
							return "Nov";
							break;
					   case 12: 
							return "Dec";
							break;
					   default:
					}
			}		
            function get_stdclass_name($class_id)			{
			   $st = "select class_name from std_class_config where id=$class_id";
			   $sq =  mysql_query($st);
			   $rs = mysql_fetch_row($sq);
			   return $rs[0];
			}
?>