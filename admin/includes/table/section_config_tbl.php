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
		  <th>Class </th>          
          <th>Section</th>
          <th>Class Teacher</th>
		  <th>Total Student</th>
		  <th>Section System</th>
		    <th>Action</th>
		</tr>
	</thead>
	<tbody>

	

 
 <?php

//$class_name ="(select class_name from std_class_config where id=class_id and branch_id=$branchid) as class_name";
		//$teacher_name="(select teacher_name from std_teacher_info where id=class_teacher_id and branch_id=$branchid) as teacher_name";
		//$qry ="SELECT $class_name,section_name,$teacher_name,no_of_student  from std_class_section_config $where  $pages->limit"; 
	
	
		$qry ="SELECT *  from std_class_section_config where branch_id='$branch_id'"; 	
		$result=mysql_query($qry);
		$count=1;
		while ($row=mysql_fetch_array($result))
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
		  $class_name=$row['class_name'];
		  $section_name=$row['section_name'];
		  $teacher_id=$row['class_teacher_id'];
		  $teacher_name=$row['class_teacher_name'];
		  $total_student=$row['no_of_student'];
		  $subject_id=$row['subject_id'];
		  $subject_name=$row['subject_name'];
		  $branch_id=$row['branch_id'];
		  $section_system = $row['section_system'];
		  
        
	  	  echo  "<td>$class_name</td>";
		  echo  "<td>$section_name</td>";	
		  echo  "<td>$teacher_name</td>";
		  echo  "<td>$total_student</td>";
		  echo  "<td>$section_system</td>";
		  echo "<td><a href=\"includes/action/section_config_chng.php?id=$id&class_name=$class_name&sub_action=delete&section_name=$section_name&teacher_name=$teacher_name&total_student=$total_student&teacher_id=$teacher_id&subject_id=$subject_id&subject_name=$subject_name&branch_id=$branch_id\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"16\" /> </a><a href=\"includes/action/section_config_chng.php?id=$id&class_name=$class_name&sub_action=detail&section_name=$section_name&teacher_name=$teacher_name&total_student=$total_student&teacher_id=$teacher_id&subject_id=$subject_id&subject_name=$subject_name&branch_id=$branch_id\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,250,550)\"><img src=\"custom_css/process_info.png\" width=\"16\" /> </a><a href=\"includes/action/section_config_chng.php?id=$id&class_name=$class_name&sub_action=edit&section_name=$section_name&teacher_name=$teacher_name&total_student=$total_student&teacher_id=$teacher_id&subject_id=$subject_id&subject_name=$subject_name&branch_id=$branch_id\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,250,450)\"><img src=\"custom_css/001_45.png\" width=\"16\" /> </a></td>";		
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