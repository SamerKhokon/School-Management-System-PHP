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
								  <th>Student ID</th>
								<th>Name</th>								  
								  <th>Class </th>
								  <th>Section</th>
									<th>Section Roll</th>
									<th>Class Roll</th>								  
								  <th>Total Open</th>
								  <th>Total Attend</th>
								  <th>Total Absent</th>								  
								</tr>
							</thead>
							<tbody>
<?php
        
	    $string = "SELECT * FROM `std_attendence_info` WHERE branch_id=$branch_id";			
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
		  $stu_id       = $row['stu_id'];
		  $class_name	= $row['class_id'];
		  $class_sec	= $row['section'];
		  $name = get_stu_name($stu_id,$class_name,$class_sec);	
          $parse = explode("|",$name);		  
		  
		  $stu_name = $parse[0]; 
		  $section_roll = $parse[1];
		  $class_roll = $parse[2];
		  
		  $total_open= $row['total_open_day'];
  		  $total_attend = $row['total_attend'];
  		  $total_absent = $row['total_absent'];
	 
		echo  "<td>$stu_id</td>";
		echo  "<td>$stu_name</td>";		
		echo  "<td>Class-$class_name</td>";		
		echo  "<td>$class_sec</td>";	
		echo  "<td>$section_roll</td>";	
		echo  "<td>$class_roll</td>";			
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
									<th>&nbsp;</th>
								</tr>
							</tfoot>
				</table>
			</div>  <!-- end demo div -->
		</table>
		</body>
		</html>
<?php

	function get_stu_name($stu_id,$class_id,$section) {
	    $str  = "SELECT stu_name,class_roll,ovr_roll FROM std_class_info
				WHERE class_id=$class_id AND class_sec='$section' 
				AND stu_id='$stu_id'";
		$sql = mysql_query($str);		
		$res = mysql_fetch_row($sql);
		return $res[0].'|'.$res[1].'|'.$res[2];
	}
?>		