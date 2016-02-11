				 


<?php
	
	require'../db.php';        	
		 
?>
 
 
 <html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>DataTables example</title>
	


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
		
            </div>
		
				<div id="demo">
				 
				
		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
		  <th>Roll</th>          
          <th>Student&nbspName</th>
          <th>Class </th>
		  <th>Section</th>
		  <th>Open Day </th>  
		  <th>Attend</th>        
		  <th>Absent</th>
		  <th>Leave </th>         
		  <th>Status</th>
		  <th>Present Result</th>
		<!--  <th>Action&nbsp&nbsp</th>-->
		</tr>
	</thead>
	<tbody>
 <?php
 
 
 $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_info_chng';
 
     $class_name=$_REQUEST['class_name'];
  	 $sec_name=$_REQUEST['sec_name'];
$qry = mysql_query("SELECT  * from std_class_info where class_id='$class_name' and class_sec='$sec_name'"); 		
		$count=1;
		while ($row=mysql_fetch_array($qry))
		{
			        			$mod=$count%2;
								if ($mod==0)
								{
								echo "<tr>";
								}
								else
								{
								echo "<tr class=\"bg\">";
								}
	      $stu_id=$row['id'];
		  $roll=$row['class_roll'];
		  $student_name=$row['stu_name'];
		  $class_name=$row['class_name'];
		  $class_sec=$row['class_sec'];
		  $total_open_day=$row['total_open_day'];
		  $total_atten=$row['total_atten'];
		  $total_leave=$row['total_leave'];
		  $total_abs=$row['total_abs'];
		  $status=$row['stuts'];
		  $result=$row['result'];
        
		echo  "<td>$roll</td>";
		//echo  "<td><a href=\"includes/routine_function/student_profile_info_chng.php?stu_id=$stu_id\" onclick=\"return GB_showCenter('Delete Data', this.href,650,650)\"> $student_name</a></td>";	
		echo "<td>$student_name</td>";
		
		
		echo  "<td><a href= \"$url\">$student_name</a></td>";
		
		
		echo  "<td>$class_name</td>";
		echo  "<td>$class_sec</td>";
		echo  "<td>$total_open_day</td>";
		echo  "<td>$total_atten</td>";	
		echo  "<td>$total_leave</td>";
		echo  "<td>$total_abs</td>";
		echo  "<td>$status</td>";
		echo  "<td>$result</td>";
	
	

	
// echo "<td><a href=\"includes/routine_function/student_info_chng.php?sub_action=delete&id=$id\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"16\" /> </a><a href=\"includes/routine_function/student_info_chng.php?id=$id&sub_action=detail&roll=$roll&student_name=$student_name&class_name=$class_name&class_sec=$class_sec&total_open_day=$total_open_day&total_atten=$total_atten&total_leave=$total_leave&total_abs=$total_abs&status=$status&result=$result\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,350,550)\"><img src=\"custom_css/process_info.png\" width=\"16\" /> </a><a href=\"includes/routine_function/student_info_chng.php?id=$id&sub_action=edit&roll=$roll&student_name=$student_name&class_name=$class_name&class_sec=$class_sec&total_open_day=$total_open_day&total_atten=$total_atten&total_leave=$total_leave&total_abs=$total_abs&status=$status&result=$result\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,350,450)\"><img src=\"custom_css/001_45.png\" width=\"16\" /> </a></td>";
		
//	<a href="includes/routine_function/demo.php?day_name=$day_name&routine_id=$id"  onclick="return GB_showCenter('Add Routine Details', this.href,250,550)">test</a>       ;	
		
		
		// <a href=\"javascript:chng('img');\"><img src=\"s.png\" name=\"img\"></a> 
		
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
			<th>&nbsp;</th>
			
		<!--	<th>&nbsp;</th> -->
		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
			
		
			</div>
	</body>
   
</html>