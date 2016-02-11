<html>
<head>
<script type="text/javascript">
			$('#example').dataTable({  	"sPaginationType": "full_numbers"	 	});				
</script>			
</head>
<body>
<?php   require_once('../db.php');
		$class_name = trim($_POST["class_name"]);
		$branch_id = trim($_POST["branch_id"]);
?>
<table width=100% id="jq_tbl">	
<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>					
						  <th>Subject Code</th>
						  <th>Subject Name </th>
						  <th>SB Mark </th>						  
						  <th>OB Mark </th>						  
						  <th>CT Mark </th>						  						  
						  <th>Total Mark </th>						  
						</tr>
					</thead>
					<tbody>
<?php
				// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';

					$class_id=$class_name;
					$qry1="select class_name from std_class_config where id='$class_id' and branch_id='$branch_id'";
					$qr1=mysql_query($qry1);
					$row1=mysql_fetch_array($qr1);
					$class_name=$row1['class_name'];

					$st = "SELECT subject_code,subject_name,sub_mark,ct_mark,st_mark,final_mark FROM `std_subject_config` WHERE class_id=$class_id and branch_id=$branch_id"; 
					$qry = mysql_query($st);
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
						$sub_code  =$row['subject_code'];
						$sub_name =$row['subject_name'];
						$sub_mark  = $row['sub_mark'];
						$ct_mark     = $row['ct_mark'];
						$sb_mark     = $row['st_mark'];
						$total_mark = $row['final_mark'];						

						echo  "<td> $sub_code </td>";
						echo  "<td>$sub_name</td>";
						echo  "<td>$sub_mark</td>";							
						echo  "<td>$ct_mark</td>";							
						echo  "<td>$sb_mark</td>";													
						echo  "<td>$total_mark</td>";													
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
				</table>
</body>
</html>				