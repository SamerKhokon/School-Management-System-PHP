					 


<?php
	
	require'../db.php';  
	$branchid=$_REQUEST['branchid'];
	      	
		 
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
            </div>
				<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
		   <th>Subject Name</th>          
          <th>Subjective Mark</th>
          <th>CT Mark</th>
		  <th>ST Mark</th>
		  <th>Full Mark</th>          
		  <th>Action</th>
		</tr>
	</thead>
	<tbody>
 <?php
 


$qry = mysql_query("SELECT  * from std_subject_config  where branch_id='$branchid'"); 		
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
		  
		  $sub_id=$row['id'];
		  $sub_name=$row['subject_name'];
		  $sub_mark=$row['sub_mark'];
		  $ct_mark=$row['ct_mark'];
		  $st_mark=$row['st_mark'];
		  $branch_id=$row['branch_id'];
		  $full_mark=$sub_mark+$ct_mark+$st_mark;
		  
        
		echo  "<td>$sub_name</td>";
		echo  "<td>$sub_mark</td>";	
		echo  "<td>$ct_mark</td>";
		echo  "<td>$st_mark</td>";
		echo  "<td>$full_mark</td>";
	
	//	echo  "<td><a href=\"includes/routine_function/demo.php?subject_name=$sub_name\" onclick=\"return GB_showCentre('ádd data',this.href,250,550)\"><img src=\"custom_css/001_45.png\" width=\"16\" /></a> <a href=\"#\"><img src=\"custom_css/delete_image.png\" width=\"18\"/></a> <a href=\"#\"><img src=\"custom_css/process_info.png\" width=\"20\"/></a></td>";
	
	
	
 echo "<td><a href=\"includes/action/sub_config_chng.php?sub_name=$sub_name&sub_action=delete&sub_id=$sub_id&sub_mark=$sub_mark&ct_mark=$ct_mark&st_mark=$st_mark&branch_id=$branch_id\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"18\" /> </a><a href=\"includes/action/sub_config_chng.php?sub_name=$sub_name&sub_action=detail&sub_id=$sub_id&sub_mark=$sub_mark&ct_mark=$ct_mark&st_mark=$st_mark&branch_id=$branch_id\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,250,550)\"><img src=\"custom_css/process_info.png\" width=\"18\" /> </a><a href=\"includes/action/sub_config_chng.php?sub_name=$sub_name&sub_action=edit&sub_id=$sub_id&sub_mark=$sub_mark&ct_mark=$ct_mark&st_mark=$st_mark&branch_id=$branch_id\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,250,450)\"><img src=\"custom_css/001_45.png\" width=\"18\" /> </a></td>";
		
//	<a href="includes/routine_function/demo.php?day_name=$day_name&routine_id=$id"  onclick="return GB_showCenter('Add Routine Details', this.href,250,550)">test</a>;	
		
		
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
		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
			
		
			</div>
	</body>
   
</html>