<html>
<head>
    <script type="text/javascript">
	  $(document).ready(function(){
		$('#example').dataTable({
		   "sPaginationType": "full_numbers"				
		});	          
	  });
	</script>
</head>
<body>
<?php		require_once('db.php');
		$class_name = trim($_POST['class_name']);
		$branch_id  = trim($_POST['branch_id']);
?>

<table width=100% id="jq_tbl">	
<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>					
						  <th>Date</th>
						  <th>Occation </th>
						</tr>
					</thead>
					<tbody>
				 <?php
				// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';
					$class_id=$class_name;
					$qry1="select class_name from std_class_config where id=$class_id and branch_id=$branch_id";
					$qr1=mysql_query($qry1);
					$row1=mysql_fetch_array($qr1);
					$class_name=$row1['class_name'];

					if (isset($_POST['submit'])){
						echo "<tr class=\"bg\">";
						echo  "<td> &nbsp; </td>";
						echo  "<td> &nbsp; </td>";
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
				</div>
				</table>
</body>
</html>				