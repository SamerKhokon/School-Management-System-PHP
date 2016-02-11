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
		   <th>ID</th>          
           <th>Group Name</th>
           <th>Class ID</th>
		   <th>Section ID</th>
		   <th>Branch ID</th>          
		   <th>Action</th>
		</tr>
	</thead>
	<tbody>

	

 
 <?php

$qry = mysql_query("SELECT  * from std_group_info where  branch_id='$branch_id'"); 		
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
		  
		  $id=$row['id'];
		  $group_name=$row['group_name'];
		  $class_id=$row['class_id'];
		  $section_id=$row['section_id'];
		  $branch_id=$row['branch_id'];
	
		  
        
		echo  "<td>$id</td>";
		echo  "<td>$group_name</td>";	
		echo  "<td>$class_id</td>";
		echo  "<td>$section_id</td>";
		echo  "<td>$branch_id</td>";
echo "<td><a href=\"includes/action/group_config_chng.php?group_name=$group_name&sub_action=delete&class_id=$class_id&section_id=$section_id&id=$id&branch_id=$branch_id\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"16\" /> </a><a href=\"includes/action/group_config_chng.php?group_name=$group_name&sub_action=detail&class_id=$class_id&section_id=$section_id&id=$id&branch_id=$branch_id\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,250,550)\"><img src=\"custom_css/process_info.png\" width=\"16\" /> </a><a href=\"includes/action/group_config_chng.php?group_name=$group_name&sub_action=edit&class_id=$class_id&section_id=$section_id&id=$id&branch_id=$branch_id\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,250,450)\"><img src=\"custom_css/001_45.png\" width=\"16\" /> </a></td>";			
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