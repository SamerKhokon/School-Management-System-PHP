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

?>
<table width=100% id="jq_tbl">	
			<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
							<thead>
								<tr>
								  <th>Student ID</th>          
								  <th>Student&nbsp;Name </th>
								  <th>Class </th>
								  <th>Section</th>
								  <th>Section Roll</th>
								  <th>Class Roll</th>
								  <th>Admission Date</th>								  
								  <th>Status</th>
								</tr>
							</thead>
							<tbody>
<?php
        $branchid   = trim($_POST['branch_id']);		
  	    $class_name = trim($_POST['class_name']);
	    $year_id    = trim($_POST['year_id']);
		//$sec_name   = trim($_POST['sec_name']);		
		
		//$smid       = $_SESSION['SM_id'];
		//$menuid     = $_SESSION['menuid'];
	    
		global $where;
		
		if($class_name!="all" && $year_id!="all" ) {								
			$where  = " WHERE class_id=$class_name and year='$year_id' AND branch_id=$branchid";
		}else if($class_name=="all" && $year_id=="all"){
		    $where = " where branch_id=$branchid";
		}
		
		
	    $string = "SELECT stu_id,stu_name,class_id,class_sec,ovr_roll,				
		branch_id FROM std_class_info AS a ".$where;
			
		$qry   = mysql_query($string);
		$count = 1;
		
		while ($row=mysql_fetch_array($qry))
		{
			$mod=$count%2;
			if ($mod==0)	{
				echo "<tr>";
			}else{
				echo "<tr class=\"bg\">";
			}
		  $stu_id       = $row['stu_id'];
		  $student_name = $row['stu_name'];
		  $class_name	= $row['class_id'];
		  $class_sec	= $row['class_sec'];
		  
		  $adm_date = get_adm_date($stu_id,$class_name,$class_sec);
		  $status	= get_st_status($stu_id,$class_name,$class_sec);
		  
		  $ovr_roll = $row['ovr_roll'];
		  $branches_id = $row['branch_id'];
		
		$roll = get_your_serial($stu_id,$class_sec,$class_name,$branches_id);
		
		 //$url='?SM_id='.$smid.'&menu_id='.$menuid.'&stid='.$stu_id.'&nev=student_profile_information_view';
		 
		echo  "<td>$stu_id</td>";				 
		?>		
		
		<td><a href="includes/student_profile_information_view.php?stid=<?php echo $stu_id ;?>" onclick="return GB_showCenter('Detail Data', this.href,800,980);"><?php echo $student_name;?></a></td>
		
		
		<?php 		
		
		echo  "<td>Class-$class_name</td>";		
		echo  "<td>$class_sec</td>";	
		echo  "<td>$roll</td>";					
		echo  "<td>$ovr_roll</td>";
		echo  "<td>$adm_date</td>";		
		echo  "<td>$status</td>";
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
			function get_your_serial($std_id,$class_sec,$class_id,$branch_id) 
			{
			   $str = "SELECT class_roll FROM std_class_info WHERE stu_id='$std_id' AND class_sec='$class_sec' AND class_id=$class_id and branch_id=$branch_id";
			   $sql = mysql_query($str);
			   $res = mysql_fetch_row($sql);
			   return $res[0];
			}
			
			function get_st_status($stu_id,$class_name,$class_sec) {
			  $str = "SELECT st_status FROM std_profile WHERE stu_id='$stu_id' AND adm_class=$class_name AND section='$class_sec'";
			  $sql = mysql_query($str);
			  $res = mysql_fetch_row($sql);
			  return $res[0];
			}
			function get_adm_date($stu_id,$class_name,$class_sec) {
			  $str = "SELECT adm_date FROM std_profile WHERE stu_id='$stu_id' AND adm_class=$class_name AND section='$class_sec'";
			  $sql = mysql_query($str);
			  $res = mysql_fetch_row($sql);
			  return $res[0];
			}			
?>		