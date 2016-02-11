<?php
	
	require'../db.php';  
	
	 $branch_id=$_REQUEST['branch_id'];      	
		 
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
		
		<script type="text/javascript">
		

		</script>
		
		
	</head>

	<body id="dt_example" class="example_alt_pagination">
		<div id="container">
		 
				<div id="demo">
		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
		  <th>Class&nbspName</th>          
          <th>Exam Name</th>
          <th>Perid</th>
		  <th>Subject Name</th>
		  <th>Exam&nbspDate</th>          
		  <th>Start&nbspTime</th>
		  <th>End&nbspDate</th>          
		  <th>Mark</th>
		  <th>Action&nbsp&nbsp</th>
		</tr>
	</thead>
	<tbody>

	

 
 <?php

$qry = mysql_query("SELECT  * from std_exam_schedule where branch_id='$branch_id'"); 		
		$count=1;
		while ($row=mysql_fetch_array($qry))
		{
			        			$mod=$count%2;
								
								if ($mod==0)
								{
								//$chk_class='odd';
								echo "<tr>";
								}
								else
								{
								//$chk_class='even';
								echo "<tr class=\"bg\">";
								}
				
		//  $deposit_id=$row['id'];
		  
		  $class_name=$row['class_name'];
		  $exam_name=$row['exam_name'];
		  $period=$row['period'];
		  $subject_name=$row['subject_name'];
		  $exam_date=$row['exam_date'];
		  $exam_start_time=$row['exam_start_time'];
		  $exam_end_time=$row['exam_end_time'];
		  $mark=$row['mark'];
		  $class_id=$row['class_id'];
		  $subject_id=$row['subject_id'];
		  $exam_sche_config_id=$row['id'];
		  
        
		echo  "<td>$class_name</td>";
		echo  "<td>$exam_name</td>";	
		echo  "<td>$period</td>";
		echo  "<td>$subject_name</td>";
		echo  "<td>$exam_date</td>";
		echo  "<td>$exam_start_time</td>";
		echo  "<td>$exam_end_time</td>";
		echo  "<td>$mark</td>";
		
echo "<td><a href=\"includes/action/exam_sche_config_chng.php?sub_id=$subject_id&sub_action=delete&class_id=$class_id&branch_id=$branch_id&exam_sche_config_id=$exam_sche_config_id\"   onclick=\"return GB_showCenter('Delete Data', this.href,150,300)\"><img src=\"custom_css/delete_image.png\" width=\"16\" /> </a><a href=\"includes/action/exam_sche_config_chng.php?sub_id=$subject_id&sub_action=detail&class_id=$class_id&branch_id=$branch_id&exam_sche_config_id=$exam_sche_config_id\"   onclick=\"return GB_showCenter('Detail Data', this.href,350,450)\"><img src=\"custom_css/process_info.png\" width=\"16\" /> </a><a href=\"includes/action/exam_sche_config_chng.php?sub_id=$subject_id&sub_action=edit&class_id=$class_id&branch_id=$branch_id&exam_sche_config_id=$exam_sche_config_id\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,350,550)\"><img src=\"custom_css/001_45.png\" width=\"16\" /> </a></td>";		
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
			</div>
			<div class="spacer"></div>
			
		
			</div>
	</body>
   
</html>