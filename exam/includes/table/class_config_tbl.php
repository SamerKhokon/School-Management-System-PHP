<?php
	
	require'../db.php';     
	
	 $branch_id=$_REQUEST['branchid'];   	
		 
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
		     
          <th>Class Name</th>
		  <th>No of Students</th>
		  <th>Daily Class</th>          
		  <th>Start Time</th>
		  <th>Action</th>
		</tr>
	</thead>
	<tbody>

	

 
 <?php


		$qry = mysql_query("SELECT  * from std_class_config  where branch_id='$branch_id' order by class_name"); 		
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
				
		  $deposit_id=$row['id'];
		  
		  
		  
		  $class_id=$row['id'];
		  $class_name=$row['class_name'];
		  $no_of_student=$row['no_of_student'];
		 // $account_number=$row['account_number'];
		  $daily_class=$row['daily_class'];
		  $class_start_time=$row['class_start_time'];
		  
        
		echo  "<td >$class_name</td>";
		echo  "<td>$no_of_student</td>";
	
		echo  "<td>$daily_class</td>";
		echo  "<td>$class_start_time</td>";
		
echo "<td><a href=\"includes/action/class_config_chng.php?class_name=$class_name&sub_action=delete&branch_id=$branch_id&class_id=$class_id\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"20\" /> </a><a href=\"includes/action/class_config_chng.php?class_name=$class_name&sub_action=detail&branch_id=$branch_id&class_id=$class_id\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,250,300)\"><img src=\"custom_css/process_info.png\" width=\"20\" /> </a><a href=\"includes/action/class_config_chng.php?class_name=$class_name&sub_action=edit&branch_id=$branch_id&class_id=$class_id\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,250,450)\"><img src=\"custom_css/001_45.png\" width=\"18\" /> </a></td>";		
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
			</div>
			<div class="spacer"></div>
			
		
			</div>
	</body>
   
</html>