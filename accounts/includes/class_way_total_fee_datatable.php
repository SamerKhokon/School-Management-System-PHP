<html><head>
    <script type="text/javascript">
	   $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
	});	
	</script>
</head>
<?php require_once('db.php');	?>
<table width=100% id="jq_tbl">	
<div id="demo">
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
					  <th>Class Name</th>          
					  <th>Section Name</th>
					  <th>Month </th>
					  <th>Fee Name</th>	 
					  <th>Amount</th>  
					</tr>
				</thead>
				<tbody>
			 <?php
			 //$url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';
				  $class_id  = trim($_POST['class_name']);
				  $sec_name  = trim($_POST['sec_name']);
				  $month_name= trim($_POST['month_id']);
				  $year_id   = trim($_POST['year_id']);
				  $branch_id = trim($_POST['branch_id']); 

				function month_to_num($month_id)       
				{
					 if($month_id=='Jan'){ return '01' ; }
					 if($month_id=='Feb'){ return '02' ; }
					 if($month_id=='Mar'){ return '03' ; }
					 if($month_id=='Apr'){ return '04' ; }
					 if($month_id=='May'){ return '05' ; }
					 if($month_id=='Jun'){ return '06' ; }
					 if($month_id=='Jul'){ return '07' ; }
					 if($month_id=='Aug'){ return '08' ; }
					 if($month_id=='Sep'){ return '09' ; }
					 if($month_id=='Oct'){ return '10' ;}
					 if($month_id=='Nov'){ return '11' ;}
					 if($month_id=='Dec'){ return '12' ;}						
				}
				
					$month_id=month_to_num($month_name)."-".$year_id;		  
					$month_nam=$month_name."-".$year_id;		
						
					$qu="select id from std_class_section_config
					where class_id='$class_id' and 
					section_name='$sec_name'  and 
					branch_id='$branch_id'";
					$q=mysql_query($qu);
					$r=mysql_fetch_array($q);
					$sec_id=$r['id'];	 
				 
					$qry="select fee_head_name,amount,
					class_name from std_fee_details where
					class_id='$class_id' and 
					section_id='$sec_id' and branch_id='$branch_id' 
					and month='$month_nam' group by fee_head_name";
					$qr=mysql_query($qry);
					$count=1;
					$total_amount=0;
					
					while ($row=mysql_fetch_array($qr))	{
						$mod=$count%2;
						if ($mod==0) {
							echo "<tr>";
						}else{
							echo "<tr class=\"bg\">";
						}
				   
						$class_name = $row['class_name'];
						$head_name  = $row[0];
						$amount		= $row[1];		  
						$total_amount = $total_amount+$amount;		  
						$class_name	  = $row[2];
					
						echo "<td>$class_name</td>";
						echo "<td>$sec_name</td>";
						echo "<td>$month_nam</td>";
						echo "<td>$head_name</td>";	
						echo "<td>$amount</td>";
						echo "</tr>";		
						$count++;
					}			
							
?>
				</tbody>
				<tfoot>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th align="center">Total:<?php echo $total_amount; ?></th>
					</tr>
				</tfoot>
			</table>
	</div>
</table>