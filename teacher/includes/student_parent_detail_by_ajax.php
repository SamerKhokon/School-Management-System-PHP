<?php   require_once("../db.php");
			$class_id  = trim($_POST['class_name']);
			$branchid = trim($_POST['branchid']);
            $stuid    = trim($_POST['stu_id']);
			
            if($class_id=='' && $stuid=='')			 {
				$where = "";
			}else if($class_id!='' && $stuid=='') {
				$where = " and adm_class=$class_id";			
			}else if($class_id=='' && $stuid!='') {
				$where = " and stu_id='$stuid'";			
			}else if($class_id!='' && $stuid!='')  {
				$where = " and adm_class=$class_id and stu_id='$stuid'";	
			}
			
			$ssss = "SELECT stu_id,NAME,adm_class
			,father_name,mother_name,father_profession,mother_profession,father_work_phone 
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
							<th>Father Name</th>
							<th>Mother Name</th>						
							<th>Father Profession</th>
							<th>Mother Profession</th>
							<th>Father Phone</th>
						</tr>
					</thead>
					<tbody>
				 <?php
				// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';


						$qry = mysql_query($ssss);
						$count=1;
						while ($row=mysql_fetch_array($qry))		{
												$mod=$count%2;
												if ($mod==0)				{
												echo "<tr>";
												}	else			{
												echo "<tr class=\"bg\">";
												}

							$student_id 	    = $row[0];
							$student_name       = $row[1];
							$class_name		    = $row[2];
							$father_name        = $row[3];
							$mother_name	    = $row[4];			
							$father_profession  = $row[5];
							$mother_profession  = $row[6];			
							$father_phone       = $row[7];
													
							echo  "<td> $student_id </td>";
							echo  "<td>$student_name       </td>";
							echo  "<td> Class-$class_name </td>";							
							echo  "<td> $father_name </td>";
							echo  "<td>$mother_name</td>";
							echo  "<td>$father_profession</td>";
							echo  "<td>$mother_profession</td>";
							echo  "<td>$father_phone</td>";
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
						</tr>
					</tfoot>
				</table>
				</div>
				</table>
</div>