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
								  <th>Teacher ID</th>
								  <th>Name</th>								  
								  <th>Total Open Days</th>
								  <th>Total Attend</th>
								  <th>Total Absent</th>								  
								</tr>
							</thead>
							<tbody>
<?php
        
		$string = "SELECT * FROM `tbl_teacher_attendance_info` WHERE branch_id=$branch_id";			
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
		  $teacher_id       = $row['teacher_id'];
		  $teacher_name = get_teacher_name($teacher_id,$branch_id);			  
		  $total_open= $row['total_open'];
  		  $total_attend = $row['total_attend'];
  		  $total_absent = $row['total_absent'];
	 
		echo  "<td>$teacher_id</td>";
		echo  "<td>$teacher_name</td>";		
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
								</tr>
							</tfoot>
				</table>
			</div>  <!-- end demo div -->
		</table>
		</body>
		</html>
<?php

	function get_teacher_name($teacher_id,$branch_id) {
	    $str  = "SELECT teacher_name FROM std_teacher_info
				WHERE id=$teacher_id AND branch_id=$branch_id";
		$sql = mysql_query($str);		
		$res = mysql_fetch_row($sql);
		return $res[0];
	}
?>		