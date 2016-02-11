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
							  <th>Class Roll</th>
							  <th>Father</th>
							  <th>Mother</th>								  
							  <th>Admission Date</th>								  
							  <th>Status</th>
							  <th>&nbsp;</th>
							</tr>
						</thead>
				<tbody>
<?php        
							$string = "SELECT id,stu_id,name,father_name,mother_name,adm_date,adm_class,section,ovr_roll,st_status FROM std_profile WHERE branch_id=$branch_id";			
							$qry     = mysql_query($string);
							$count = 1;
							
							while ($row=mysql_fetch_assoc($qry))	{
									$mod=$count%2;
									if ($mod==0)			{
											echo "<tr>";
									}	else	{
											echo "<tr class=\"bg\">";
									}
									
									$slno                  = $row['id'];
									$stu_id               = $row['stu_id'];
									$name	               = $row['name'];
									$class_sec	       = $row['section'];
									$father_name    = $row['father_name'];
									$mother_name  = $row['mother_name'];
									$adm_date         = $row['adm_date'];
									$adm_class       = $row['adm_class'];
									$ovr_roll             = $row['ovr_roll'];
									$st_status          = $row['st_status'];
								 
									echo  "<td>$stu_id</td>";
									echo  "<td>$name</td>";		
									echo  "<td>Class-$adm_class</td>";								
									echo  "<td>$class_sec</td>";
									echo  "<td>$ovr_roll</td>";								
									echo  "<td>$father_name</td>";				
									echo  "<td>$mother_name</td>";						
									echo  "<td>$adm_date</td>";		
									echo  "<td>$st_status</td>";						
									?>  
										<td>
											 <a href="includes/action/student_admission_list_chng.php?id=<?php echo $slno;?>&stu_id=<?php echo $stu_id;?>&sub_action=delete&adm_class=<?php echo $adm_class;?>&section=<?php echo $class_sec;?>&ovr_roll=<?php echo $ovr_roll;?>&father_name=<?php echo $father_name;?>&mother_name=<?php echo $mother_name;?>&adm_date=<?php echo $adm_date;?>&status=<?php echo $st_status;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)">
											 <img src="custom_css/delete_image.png" width="20" /> </a>											
											 <a href="includes/action/student_admission_list_chng.php?id=<?php echo $slno;?>&stu_id=<?php echo $stu_id;?>&sub_action=detail&adm_class=<?php echo $adm_class;?>&section=<?php echo $class_sec;?>&ovr_roll=<?php echo $ovr_roll;?>&father_name=<?php echo $father_name;?>&mother_name=<?php echo $mother_name;?>&adm_date=<?php echo $adm_date;?>&status=<?php echo $st_status;?>" id="img2"  onclick="return GB_showCenter('Detail Data', this.href,250,550)">
											 <img src="custom_css/process_info.png" width="20" /> </a>											
											 <a href="includes/action/student_admission_list_chng.php?id=<?php echo $slno;?>&stu_id=<?php echo $stu_id;?>&sub_action=edit&adm_class=<?php echo $adm_class;?>&section=<?php echo $class_sec;?>&ovr_roll=<?php echo $ovr_roll;?>&father_name=<?php echo $father_name;?>&mother_name=<?php echo $mother_name;?>&adm_date=<?php echo $adm_date;?>&status=<?php echo $st_status;?>" id="img1"  onclick="return GB_showCenter('Edit Data', this.href,250,450)">
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