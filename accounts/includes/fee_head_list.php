
<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
	});	
</script>		
<div id="content" class="box">
<?php   include('db.php');
		$str = "SELECT b.id,class_id,c.class_name,fee_head_id,fee_head,amount,category
		FROM tbl_class_fee_info AS a,tbl_class_feehead AS b,std_class_config AS c WHERE 
		a.fee_head_id=b.id AND c.id=a.class_id";

?>
<table width=100% id="jq_tbl">	
		<div id="demo">
		    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
						<thead>
							<tr>
							   <td>class </td>
							   <td>feehead</td>
							   <td>amount </td>
							   <td>category </td>
							   <td>actions </td>							   
							</tr>
						</thead>
						<tbody>
					 <?php
						 
//b.id,class_id,c.class_name,
//fee_head_id,fee_head,amount,category
					  $count = 0;
						  $qr=mysql_query($str);		
							while ($rs=mysql_fetch_array($qr)){
							   $slno              = $rs['id'];
							   $class_id          = $rs['class_id']; 
							   $class_name        = $rs['class_name'];
							   $fee_head_id       = $rs['fee_head_id']; 							   
							   $fee_head_name     = $rs['fee_head']; 
							   $amount            = $rs['amount'];							   
							   $category          = $rs['category']; 
							    $mod=$count%2;
								if ($mod==0){
									echo "<tr>";
								}else{
									echo "<tr class=\"bg\">";
								}	   
							   echo  "<td>$class_name </td>";
							   echo  "<td>$fee_head_name </td>";
							   echo  "<td>$amount </td>";
							   echo  "<td>$category </td>";
                               echo  "<td><a>edit</a><a>delete</a></td>";							   
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
							</tr>
						</tfoot>
					</table>
		</div>
	</table>
</div>