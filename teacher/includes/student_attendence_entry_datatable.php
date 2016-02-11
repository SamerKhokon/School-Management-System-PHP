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
<?php
 	 							
   require_once('../db.php'); 
		session_start();
		$branch_id = $_SESSION["LOGIN_BRANCH"];

?>
<table width=100% id="jq_tbl">	
			<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
							<thead>
								<tr>
								  <th>Section Roll</th>
								<th>Name</th>								  
								  <th>Class </th>
								  <th>Section</th>
									<th>Month</th>
								  <th>Total Open</th>
								  <th>Total Attend</th>
								  <th>Total Absent</th>								  
								</tr>
							</thead>
							<tbody>
<?php
        
	    $string = "SELECT *,DATE_FORMAT(MONTH,'%b-%Y') as month_name FROM `std_attendence_info` WHERE branch_id=$branch_id";			
		$qry   = mysql_query($string);
		$count = 1;
		
		while ($row=mysql_fetch_assoc($qry))
		{
			$mod=$count%2;
			if ($mod==0)	{
				echo "<tr>";
			}else{
				echo "<tr class=\"bg\">";
			}
		  $stu_id       = $row['section_roll'];
		  $class_name	= $row['class_id'];
		  $class_sec	= $row['section'];
		  $name = get_student_name($class_name,$class_sec,$stu_id,$branch_id);	
		  
		  $total_open= $row['total_open_day'];
  		  $total_attend = $row['total_attend'];
  		  $total_absent = $row['total_absent'];
		  $month_name = $row['month_name'];
	 
		echo  "<td>$stu_id</td>";
		echo  "<td>$name</td>";		
		echo  "<td>Class-$class_name</td>";		
		echo  "<td>$class_sec</td>";	
		echo  "<td>$month_name</td>";		
		echo  "<td>$total_open</td>";
		echo  "<td>$total_attend</td>";			
		echo  "<td>$total_absent</td>";		
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
									<th>&nbsp;</th>
								</tr>
							</tfoot>
				</table>
			</div>  <!-- end demo div -->
		</table>
		</body>
		</html>
<?php

		function get_student_name($class_id,$section,$section_roll,$branch_id) {
		   $str = "select stu_name from std_class_info where class_id=$class_id and class_sec='$section' and branch_id=$branch_id";
		   $sql = mysql_query($str);
		   $res = mysql_fetch_row($sql);
		   return $res[0];
		 }
	
?>		