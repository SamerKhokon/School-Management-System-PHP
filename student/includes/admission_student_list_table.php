<script type="text/javascript">
$(document).ready(function(){
    //alert('js');
	$('#example').dataTable({"sPaginationType": "full_numbers"		});
});

</script>
			<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
						<th>ID </th>
						<th>Name</th>
						<th>Father</th>
						<th>Mother</th>		
						<th>Dob</th>							
						<th>Admission Date</th>
						<th>Class</th>
						<th>Father Profession</th>
						<th>Mother Profession</th>		
						<th>&nbsp;</th>						
						</tr>
					</thead>
					<tbody>
				 <?php
				   require_once("../db.php");
				   session_start();
				// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';

					$total_amount = 0;
                    $class_id = trim($_POST['class_id']);
					$branch = $_SESSION['LOGIN_BRANCH'];
					
					
					if($class_id==""){
					 $where = " where branch_id=$branch";
					}else{
					 $where = " where adm_class=$class_id and branch_id=$branch";					
					}
					
					$str = "SELECT  * from std_profile ".$where;
					$qry = mysql_query($str);
					$count=1;
					while ($row=mysql_fetch_assoc($qry))
					{
						$mod=$count%2;
						if ($mod==0){
						echo "<tr>";
						}else{
						echo "<tr class=\"bg\">";
						}
						$slno = $row['id'];
                        $stu_id = $row['stu_id'];
						$name = $row['name'];
						$father = $row['father_name'];
						$mother =$row['mother_name'];
						$pre_add =$row['pre_address'];
						$par_add = $row['par_address'];
						$gender = $row['sex'];
						$adm_date = $row['adm_date'];
						$adm_class = $row['adm_class']; 
						$dob = $row['dob'];
						$father_income = $row['father_income'];
						$father_profession = $row['father_profession'];
						$mother_profession = $row['mother_profession'];
						echo  "<td> $stu_id </td>";
						echo  "<td>$name</td>";
						echo  "<td>$father</td>";		
						echo  "<td>$mother</td>";		
						echo  "<td>$dob</td>";								
						echo  "<td>$adm_date</td>";		
						echo  "<td>Class-$adm_class</td>";		
						echo  "<td>$father_profession</td>";								
						echo  "<td>$mother_profession</td>";
?>	
			<td><a href="includes/action/sub_config_chng.php?slno=<?php echo $slno;?>&sub_action=delete&stu_id=<?php echo $stu_id;?>&name=<?php echo $name;?>&father=<?php echo $father;?>&mother=<?php echo $mother;?>&branch_id=<?php echo $branch;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)"><img src="custom_css/delete_image.png" width="18" /></a><a href="includes/action/sub_config_chng.php?slno=<?php echo $slno;?>&sub_action=edit&stu_id=<?php echo $stu_id;?>&name=<?php echo $name;?>&father=<?php echo $father;?>&mother=<?php echo $mother;?>&branch_id=<?php echo $branch;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)"><img src="custom_css/process_info.png" width="18" /></a><a href="includes/action/sub_confi_chng.php?slno=<?php echo $slno;?>&sub_action=delete&stu_id=<?php echo $stu_id;?>&name=<?php echo $name;?>&father=<?php echo $father;?>&mother=<?php echo $mother;?>&branch_id=<?php echo $branch;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)"><img src="custom_css/001_45.png" width="18" /></a></td>
<?php
						
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
							<th>&nbsp;</th>
						</tr>
					</tfoot>
				</table>
				</div>
		