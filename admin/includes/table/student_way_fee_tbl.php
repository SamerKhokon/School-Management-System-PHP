					 


<?php
	
	require'../db.php';  

	      	
		 
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
		
		<script type="text/javascript">
						  }


		</script>
		
		
	</head>

	<body id="dt_example" class="example_alt_pagination">
		<div id="container">
            </div>

	
<div id="demo">
				 
				
		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
		  <th>Fee Name</th>          
          <th>Category</th>
          <th>Month</th>
		  <th>Amount</th>
		  <th>Action </th>          
	
		<!--  <th>Action&nbsp&nbsp</th>-->
		</tr>
	</thead>
	<tbody>
 <?php
 
 
 //$url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';

      $class_name=$_REQUEST['class_id'];
  	  $sec_name=$_REQUEST['sec_id'];
	  $roll=$_REQUEST['roll'];
	  $month=$_REQUEST['mon'];
	  $year=$_REQUEST['year'];
	  $branchid=$_REQUEST['branch_id'];
	  
      $pay_month=$month."-".$year;
	  
	  $qu="select id from std_class_section_config where class_id='$class_name' and section_name='$sec_name'  and branch_id='$branchid'";
	$q=mysql_query($qu);
	$r=mysql_fetch_array($q);
	$sec_id=$r['id'];


 
$qr ="SELECT  fee_head_name,category,month,amount,std_id from std_fee_details where class_id='$class_name' and section_id='$sec_id' and branch_id='$branchid' and roll='$roll' and month='$pay_month'";
$qry=mysql_query($qr);

        $total_amount=0;
		
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
	 
		  $fee_head=$row[0];
		  $category=$row[1];
		  $month=$row[2];
		  $amount=$row[3];
		  
		  $std_id=$row['std_id'];
		  
		  $total_amount=$total_amount+$amount;
		
		
		echo  "<td>$fee_head</td>";
		echo  "<td>$category</td>";
		echo  "<td>$month</td>";
		echo  "<td>$amount</td>";	

	
echo "<td><a href=\"includes/action/student_way_fee_chng.php?sub_action=delete&class_name=$class_name&sec_name=$sec_name&roll=$roll&month=$month&branchid=$branchid&std_id=$std_id&fee_head=$fee_head&amount=$amount\" onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"16\" /> </a><a href=\"includes/action/student_way_fee_chng.php?sub_action=edit&&class_name=$class_name&sec_name=$sec_name&roll=$roll&fee_head=$fee_head&month=$month&amount=$amount&branchid=$branchid&std_id=$std_id\"  onclick=\"return GB_showCenter('Edit Data', this.href,350,450)\"><img src=\"custom_css/001_45.png\" width=\"16\" /> </a></td>";
		
//	<a href="includes/routine_function/demo.php?day_name=$day_name&routine_id=$id"  onclick="return GB_showCenter('Add Routine Details', this.href,250,550)">test</a>       ;	
		
		
		// <a href=\"javascript:chng('img');\"><img src=\"s.png\" name=\"img\"></a> 
		
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
			<th>Total:<?php echo $total_amount; ?></th>
			<th> &nbsp;</th>
			
			
		<!--	<th>&nbsp;</th> -->
		</tr>
	
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			
			
		<!--	<th>&nbsp;</th> -->
		</tr>
	</tfoot>
    
  
</table>
			</div>
		
     
	 

</div>







	</body>
   
</html>