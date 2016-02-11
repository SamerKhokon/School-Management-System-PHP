<?php	
	require'../db.php';  
	$branch_id=$_REQUEST['branchid'];      			 
?>
  <html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>DataTables example</title>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"	
				} );
			} );
		</script>
	</head>
	<body id="dt_example" class="example_alt_pagination">
		<div id="container">		
				<div id="demo">		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
		  <th>Fee Name</th>
		  <th>Category</th>          
		  <th>Branch Id</th>
		  <th>Action </th>
		
		</tr>
	</thead>
	<tbody>

	

 
 <?php


		$qry = mysql_query("SELECT  * from tbl_class_feehead where  branch_id='$branch_id'"); 		
		$count=1;
		while ($row=mysql_fetch_array($qry))
		{
			        			$mod=$count%2;
								
								if ($mod==0)
								{
								//$chk_class='odd';
								echo "<tr>";
								}
								else
								{
								//$chk_class='even';
								echo "<tr class=\"bg\">";
								}
				
		//  $deposit_id=$row['id'];
		  
		  $id=$row['id'];
		  $fee_head=$row['fee_head'];
		  $category=$row['category'];
		echo  "<td>$fee_head</td>";	
		echo  "<td>$category</td>";
		echo  "<td>$branch_id</td>";
	
?>
		<td>
		<a href="includes/action/class_fee_head_chng.php?sub_action=delete&id=<?php echo $id;?>&fee_head=<?php echo $fee_head;?>&category=<?php echo $category;?>&branch_id=<?php echo $branch_id;?>" id="img1"  onclick="return GB_showCenter('Delete Data', this.href,150,250)">
		<img src="custom_css/delete_image.png" width="16" /> 
		</a>
		
		<a href="includes/action/class_fee_head_chng.php?sub_action=detail&id=<?php echo $id;?>&fee_head=<?php echo $fee_head;?>&category=<?php echo $category;?>&branch_id=<?php echo $branch_id;?>" id="img2"  onclick="return GB_showCenter('Detail Data', this.href,250,550)">
		<img src="custom_css/process_info.png" width="16" /> </a>
		
		
		<a href="includes/action/class_fee_head_chng.php?sub_action=edit&id=<?php echo $id;?>&fee_head=<?php echo $fee_head;?>&category=<?php echo $category;?>&branch_id=<?php echo $branch_id;?>" id="img1"  onclick="return GB_showCenter('Edit Data', this.href,250,450)">
		<img src="custom_css/001_45.png" width="14" /> </a>
		
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
			
	
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
			
		
			</div>
	</body>
   
</html>