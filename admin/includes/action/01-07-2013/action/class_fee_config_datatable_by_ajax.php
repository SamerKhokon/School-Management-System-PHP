<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').dataTable( {
		"sPaginationType": "full_numbers"	
	});
});
</script>
<?php require_once('db.php'); ?>
<table width=100% id="jq_tbl">
<div id="demo">				 
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>
				<tr>			 
				  <th>Class&nbsp;Name</th>
				  <th>Exam fee</th>
				  <th>Action</th>
				</tr>
			</thead>
	<tbody>
 <?php
        $class_name = "class-".trim($_POST['class_name']);
		$branch_id  = trim($_POST['branch_id']);
				
		$fee_str = "SHOW COLUMNS FROM std_class_config WHERE FIELD LIKE '%fee'";
		$fee_sql = mysql_query($fee_str);
		while($rs = mysql_fetch_array($fee_sql) ) {
		   $fee_heads[] = $rs[0];
		}
		
		$fee_query = "SELECT  * from std_class_config where class_name='$class_name' and branch_id='$branch_id'";
		$fee_qry = mysql_query($fee_query); 		
	    while($fee_amount_res = mysql_fetch_array($fee_qry) ) {
		    $id               = $fee_amount_res['id'];
			$exam_fee		  = $fee_amount_res['exam_fee'];
			$development_fee  = $fee_amount_res['developement_fee'];
			$monthly_fee	  = $fee_amount_res['monthly_fee'];
			$hostel_fee	      = $fee_amount_res['hostel_fee'];
			$tution_fee	      = $fee_amount_res['tution_fee'];
			$lab_fee		  = $fee_amount_res['leb_fee'];        		
		} 	
		$fee_amounts = array($exam_fee,$development_fee,
		$monthly_fee,$hostel_fee,$tution_fee,$lab_fee,$id);						
		$len = count($fee_heads)-1;
		for($i=0 ; $i< count($fee_heads)-2 ; $i++) {
   			$mod = $i % 2;			
			if ( $mod == 0 ) {
				echo "<tr>";
			} else {
				echo "<tr class=\"bg\">";
			}
			
			echo "<td>".$fee_heads[$i]."</td>";
			echo "<td>".$fee_amounts[$i]."</td>";
			
?>			
			<td><a href="includes/action/class_fee_config_chng.php?sub_action=delete&id=<?php echo $class_name;?>&branch_id=<?php echo $branch_id;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)">
			<img src="custom_css/delete_image.png" width="16" />
			</a><a href="includes/action/class_fee_config_chng.php?id=<?php echo $class_name;?>&sub_action=detail&fee_name=<?php echo $fee_heads[$i];?>&fee_amount=<?php echo $fee_amounts[$i];?>&branch_id=<?php echo $branch_id;?>" id="img2"  onclick="return GB_showCenter('Detail Data', this.href,350,550)">
			<img src="custom_css/process_info.png" width="16" /> 
			</a><a href="includes/action/class_fee_config_chng.php?id=<?php echo $class_name;?>&sub_action=edit&fee_name=<?php echo $fee_heads[$i];?>&fee_amount=<?php echo $fee_amounts[$i];?>&branch_id=<?php echo $branch_id;?>" id="img1"  onclick="return GB_showCenter('Edit Data', this.href,350,450)">
			<img src="custom_css/001_45.png" width="16" /> </a></td>
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
		</tr>
	</tfoot>
</table>
</div>
</table>