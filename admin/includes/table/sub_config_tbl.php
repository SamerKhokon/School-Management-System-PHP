<?php	require'../db.php';  
		$branchid=$_REQUEST['branchid'];
?> 
 <html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />		
		<title>DataTables example</title>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers",	 	
					"aLengthMenu":[10,20,50,100],
					"iDisplayLength": 10,						 
					"sDom": 'T<"clear">lfrtip' ,
					"oTableTools": 
					{
						"aButtons": 
						[							
							"csv",
							"xls",
							{
								 "sExtends"       : "pdf",
								 "sButtonText"    : "Save to Pdf",
								 "sPdfOrientation": "landscape",								 
								 "sPdfMessage"    : "Download report as PDF format"
							},
							"print"
						]
					}				
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
		   <th>Class</th>		
		   <th>Subject Code</th>
		   <th>Subject Name</th>          
          <th>SB Mark</th>
          <th>CT Mark</th>
		  <th>OB Mark</th>
		  <th>PT Mark</th>
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
		if ($mod==0){
			echo "<tr>";
		}else{
			echo "<tr class=\"bg\">";
		}
		  $id    = $row['id'];		  
		  $class_id          = $row['class_id'];
		  $sub_code    = $row['subject_code'];
		  $sub_name   = $row['subject_name'];
		  $sub_mark    = $row['sub_mark'];
		  $ct_mark       = $row['ct_mark'];
		  $st_mark       = $row['st_mark'];
		  $ob_mark      = $row['ob_mark'];
		  $practical_mark = $row['practical_mark'];
		  $branch_id    = $row['branch_id'];
		  $full_mark     = $sub_mark+$ct_mark+$ob_mark+$practical_mark;
		echo  "<td>Class-$class_id</td>";
		echo  "<td>$sub_code</td>";        
		echo  "<td>$sub_name</td>";
		echo  "<td>$sub_mark</td>";	
		echo  "<td>$ct_mark</td>";
		echo  "<td>$ob_mark</td>";
		echo  "<td>$practical_mark</td>";		
		echo  "<td>$full_mark</td>";
		echo "<td><a href=\"includes/action/sub_config_chng.php?id=$id&sub_name=$sub_name&sub_action=delete&id=$id&sub_id=$class_id&sub_mark=$sub_mark&ct_mark=$ct_mark&st_mark=$st_mark&ob_mark=$ob_mark&branch_id=$branch_id\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\">
		<img src=\"custom_css/delete_image.png\" width=\"18\" /> </a>
		<a href=\"includes/action/sub_config_chng.php?id=$id&sub_name=$sub_name&sub_action=detail&id=$id&sub_id=$class_id&sub_mark=$sub_mark&ct_mark=$ct_mark&st_mark=$st_mark&ob_mark=$ob_mark&branch_id=$branch_id\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,250,550)\">
		<img src=\"custom_css/process_info.png\" width=\"18\" /> </a>
		<a href=\"includes/action/sub_config_chng.php?id=$id&sub_name=$sub_name&sub_action=edit&id=$id&sub_id=$class_id&sub_mark=$sub_mark&ct_mark=$ct_mark&st_mark=$st_mark&ob_mark=$ob_mark&branch_id=$branch_id&sub_code=$sub_code\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,250,450)\">
		<img src=\"custom_css/001_45.png\" width=\"18\" /> </a></td>";
		echo "</tr>";		
			$count++;
	}	
?>
	</tbody>
	<tfoot>
		<tr>
			<th> </th>
			<th> </th>
			<th> </th>
			<th> </th>
			<th> </th>
			<th> </th>
			<th> </th>	
			<th> </th>				
		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
			</div>
	</body>   
</html>