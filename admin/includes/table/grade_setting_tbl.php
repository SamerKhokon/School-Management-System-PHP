<?php	
	require'../db.php';  session_start();
	 $branchid = $_SESSION['LOGIN_BRANCH'] ;
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
		   <th>Mark Range</th>
		    <th>Point</th> 
		   <th>Grade</th> 
		  <th>Action</th>
		</tr>
	</thead>
	<tbody>
	
 <?php
 
 
 //grade_setting_tbl.php
						$qry = mysql_query("SELECT * FROM tbl_grade_setting  WHERE branchid=$branchid order by mark_start desc"); 		
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
				
							  $grade_id    = $row['id'];		  
							  $grade         = $row['grade'];
							  $start_mark = $row['mark_start'];
							  $end_mark  = $row['mark_end'];
							  $branchid    = $row['branchid'];
							  $point          = $row['point'];
							  $mark_range = $start_mark."-".$end_mark;
							  			echo  "<td>$mark_range</td>";       
						
							echo  "<td>$point</td>";
								echo  "<td>$grade</td>";
				 ?>
				 
		<td>
		
		<a href="includes/action/grade_setting_change.php?grade=<?php echo $grade;?>&sub_action=delete&grade_id=<?php echo $grade_id;?>&grade=<?php echo $grade;?>&start_mark=<?php echo $start_mark;?>&end_mark=<?php echo $end_mark;?>&branchid=<?php echo $branchid;?>&point=<?php echo  $point;?>" id="img1"  
		onclick="return GB_showCenter('Delete Data', this.href,150,250)">
		<img src="custom_css/delete_image.png" width="18" /> </a>
	
		
		<a href="includes/action/grade_setting_change.php?grade_id=<?php echo $grade_id;?>&sub_action=detail&grade_id=<?php echo $grade_id;?>&grade=<?php echo $grade;?>&start_mark=<?php echo $start_mark;?>&end_mark=<?php echo $end_mark;?>&branchid=<?php echo $branchid;?>&point=<?php echo  $point;?>" id="img2\"  onclick="return GB_showCenter('Detail Data', this.href,250,550)">
		<img src="custom_css/process_info.png" width="18" /> </a>
		
		<a href="includes/action/grade_setting_change.php?grade=<?php echo $grade;?>&sub_action=edit&grade_id=<?php echo $grade_id;?>&grade=<?php echo $grade;?>&start_mark=<?php echo $start_mark;?>&end_mark=<?php echo $end_mark;?>&branchid=<?php echo $branchid;?>&point=<?php echo  $point;?>" 
		id="img1"  	onclick="return GB_showCenter('Edit Data', this.href,250,450)">
		<img src="custom_css/001_45.png" width="18" /> </a>
		
		</td>
		
        </tr>

		
		<?php
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
		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
			</div>
	</body>   
</html>