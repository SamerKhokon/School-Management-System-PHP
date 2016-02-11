<table>
<thead>
<tr>
    <th>Fee-Name</th><td width="50"></td>
    <th>Amount</th>
 </tr>
 </thead>
<tbody>
<?php
	include ('../db.php');
	$branch_id  = $_GET['branch_id'];
	$class_id   = $_GET['class_id'];
	$section_id = $_GET['section_id'];	
	$qr = "select fee_head,amount from tbl_class_feehead,tbl_class_fee_info 
	where tbl_class_fee_info.class_id='$class_id' and tbl_class_feehead.id=tbl_class_fee_info.fee_head_id and tbl_class_fee_info.branch_id='$branch_id'
	and tbl_class_feehead.category='fixed'";

$qry=mysql_query($qr);			
while ($row=mysql_fetch_array($qry)){
	echo "<td><input type=\"checkbox\" name=\"$row[0]\" value=\"$row[0]\">&nbsp;$row[0]</td>";
	echo "<td></td>";
	echo "<td><input type=\"hidden\" name=\"$row[1]\" value=\"$row[1]\">$row[1]Tk</td>";
    echo "</tr>";
}
?>
	</tbody>
	<tfoot>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>			
		</tr>
	</tfoot>
</table>