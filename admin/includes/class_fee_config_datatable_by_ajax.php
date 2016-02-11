<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').dataTable( {
		"sPaginationType": "full_numbers"	
	});
});
</script>
<?php require_once('../db.php'); ?>
<table width=100% id="jq_tbl">
<div id="demo">				 
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>
				<tr>			 
				  <th>Class&nbsp;Name</th>
				  <th>Fee Name</th>
				  <th>Amount</th>				  
				  <th>Action</th>
				</tr>
			</thead>
	<tbody>
 <?php
 
/*	
		$fee_str = "SHOW COLUMNS FROM std_class_config WHERE FIELD LIKE '%fee'";
		$fee_sql = mysql_query($fee_str);
		while($rs = mysql_fetch_array($fee_sql) ) {
		   $fee_heads[] = $rs[0];
		}		
		$fee_query = "SELECT  * from std_class_config where class_name='$class_name' and branch_id='$branch_id'";
		*/
    
 
        $c_id = trim($_POST['class_name']);
		$branch_id  = trim($_POST['branch_id']);
		$fee_cndtn = '';
		if(isset($_POST['fee_head_id']))
		{
			$fee_cndtn = ' and fee_head_id='.trim($_POST['fee_head_id']);
		}
		 $str = "SELECT id,class_id,(SELECT class_name FROM std_class_config WHERE id=a.class_id) AS class_name,
		fee_head_id,(SELECT fee_head FROM tbl_class_feehead WHERE id=a.fee_head_id) AS fee_head,amount 
		FROM tbl_class_fee_info AS a WHERE branch_id=$branch_id and class_id=$c_id $fee_cndtn";
		
	    $i=0;
		$fee_qry = mysql_query($str); 		
	    while($res = mysql_fetch_array($fee_qry) ) {
		    $id               = $res['id'];
			$class_id		  = $res['class_id'];
			$class_names  = $res['class_name'];
			$fee_head_id	  = $res['fee_head_id'];
			$fee_head	      = $res['fee_head'];
			$amount	      = $res['amount'];
			
   			$mod = $i % 2;			
			if ( $mod == 0 ) {
				echo "<tr>";
			} else {
				echo "<tr class=\"bg\">";
			}			
			echo "<td>$class_names</td>";
			echo "<td>$fee_head</td>";			
			echo "<td>$amount</td>";	
            $i++;			
			
?>			
			<td><a href="includes/action/class_fee_chng.php?sub_action=delete&id=<?php echo $id;?>&fee_head_id=<?php echo $fee_head_id;?>&class_id=<?php echo $class_id;?>&fee_name=<?php echo $fee_head;?>&fee_amount=<?php echo $amount;?>&branch_id=<?php echo $branch_id;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)">
			<img src="custom_css/delete_image.png" width="16" />
			</a><a href="includes/action/class_fee_chng.php?id=<?php echo $id;?>&sub_action=detail&fee_head_id=<?php echo $fee_head_id;?>&class_id=<?php echo $class_id;?>&fee_name=<?php echo $fee_head;?>&fee_amount=<?php echo $amount;?>&branch_id=<?php echo $branch_id;?>" id="img2"  onclick="return GB_showCenter('Detail Data', this.href,350,550)">
			<img src="custom_css/process_info.png" width="16" /> 
			</a><a href="includes/action/class_fee_chng.php?id=<?php echo $id;?>&sub_action=edit&fee_head_id=<?php echo $fee_head_id;?>&class_id=<?php echo $class_id;?>&fee_name=<?php echo $fee_head;?>&fee_amount=<?php echo $amount;?>&branch_id=<?php echo $branch_id;?>" id="img1"  onclick="return GB_showCenter('Edit Data', this.href,350,450)">
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
			<th>&nbsp;</th>
		</tr>
	</tfoot>
</table>
</div>
</table>