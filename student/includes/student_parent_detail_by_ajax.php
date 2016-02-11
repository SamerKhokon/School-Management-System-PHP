<?php   require_once("../db.php");
			$class_id  = trim($_POST['class_name']);
			$branchid = trim($_POST['branchid']);
            
            if($class_id=='')			 {
			$where = "";
			}else if($class_id!='') {
			$where = " and adm_class=$class_id";			
			}
			
			$ssss = "SELECT stu_id,name,adm_class,father_name,mother_name,section,father_work_phone,mother_work_phone,branch_id 
			FROM `std_profile` AS a WHERE branch_id=$branchid ".$where;			
			


?>
<script type="text/javascript">
$(document).ready(function(){
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"				
	    });
});
</script>
<br/>
<table width=100% id="jq_tbl">	
<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>					
							<th>Student ID</th>
							<th>Name </th>
							<th>Class</th>	
							<th>Section</th>								
							<th>Roll</th>															
							<th>Father Name</th>
							<th>Mother Name</th>						
							<th>Father Phone</th>
							<th>Mother Phone</th>
						</tr>
					</thead>
					<tbody>
				 <?php
				// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';


						$qry = mysql_query($ssss);
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

							$student_id 	        = $row['stu_id'];
							$student_name    = $row['name'];
							$class_name		= $row['adm_class'];
							$section               = $row['section'];
							$father_name       = $row['father_name'];
							$mother_name	     = $row['mother_name'];			
							$father_phone       = $row['father_work_phone'];
							$mother_phone       = $row['mother_work_phone'];
							$branch_id         = $row['branch_id'];  
							
							$roll  = get_your_serial($student_id,$section,$class_name,$branch_id);
													
							echo  "<td> $student_id </td>";
							echo  "<td>$student_name       </td>";
							echo  "<td>Class-$class_name </td>";							
							echo  "<td>$section</td>";
							echo  "<td>$roll</td>";
							echo  "<td> $father_name </td>";
							echo  "<td>$mother_name</td>";
							echo  "<td>$father_phone</td>";
							echo  "<td>$mother_phone</td>";							
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
				</table>
</div>
<?php
			function get_your_serial($std_id,$section,$class_id,$branch_id) {
			   $str = "SELECT class_roll FROM std_class_info WHERE stu_id='$std_id' AND class_sec='$section' AND class_id=$class_id and branch_id=$branch_id";
			   $sql = mysql_query($str);
			   $res = mysql_fetch_row($sql);
			   return $res[0];
			}
?>