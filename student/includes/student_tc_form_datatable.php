<?php session_start(); 
include("../db.php");				
	
$branchid   = trim($_POST['branch_id']);

$s =  "SELECT * FROM `std_tc_info` where branch_id=$branchid ORDER BY id DESC";				
$str = mysql_query($s);
$count=1;
?>			
<script type="text/javascript">
	$('#example').dataTable({ "sPaginationType": "full_numbers"	});				
</script>			
<table  width=100% id="jq_tbl">
	<div id="demo">
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
		<thead>
		<tr>
				 <th>ID</th>
				 <th>Name</th>
				 <th>Class</th>
				 <th>Section</th>
				 <th>Roll</th>
				 <th>TC Date</th>
				 <th>Reason</th>
				 <th>Remarks</th>
		</tr>		
		</thead>			
		<tbody>
		<?php 	
		while($res =  mysql_fetch_array($str) ) 
		{   
			$count++;
			if($count%2==0)
			echo "<tr>";
			else
			echo "<tr class='bg'>";
			$name = get_student_name($res['class_id'],$res['section'],$res['std_id'])	
			?>
			<td><?php	echo  $res['std_id'];     ?></td>
			<td><?php	echo  $name;     ?></td>
			<td><?php	echo  $res['class_id'];  ?></td>
			<td><?php	echo  $res['section'];    ?></td>
			<td><?php	echo  $res['class_roll']; ?></td>
			<td><?php	echo  $res['tc_date'];    ?></td>
			<td><?php	echo  $res['reason'];     ?></td>
			<td><?php	echo  $res['remarks'];    ?></td>													
			</tr>		
		<?php
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
<?php
	function get_student_name($class_id,$section,$std_id) {		
		$str = "select where stu_id='$std_id' and adm_class=$class_id and section='$section'";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);
		return  $res[0];
	}
?>