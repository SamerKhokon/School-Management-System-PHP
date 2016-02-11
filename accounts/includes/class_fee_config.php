
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"sPaginationType": "full_numbers"	
			
				} );
			} );
			 

		</script>
<div id="content" class="box">

<table width=100% id="jq_tbl">	

	
<div id="demo">
				 
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
		
		
	<thead>
		<tr>
	 
          <th>Class&nbsp;Name</th>
		  <th>Exam fee</th>
		  <th>Development&nbsp;fee</th>          
		  <th>Monthly&nbsp;fee</th>
		  <th>Hostel&nbsp;fee</th>
		  <th>Tution&nbsp;fee</th>
		  <th>Lab&nbsp;fee</th>
		  <th>Action&nbsp;&nbsp;</th>
		</tr>
	</thead>
	<tbody>

	

 
 <?php


		$qry = mysql_query("SELECT  * from std_class_config where branch_id='$branchid'"); 		
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
		  $class_name=$row['class_name'];
		  $exam_fee=$row['exam_fee'];
		  $development_fee=$row['developement_fee'];
		  $monthly_fee=$row['monthly_fee'];
		  $hostel_fee=$row['hostel_fee'];
		  $tution_fee=$row['tution_fee'];
		  $lab_fee=$row['leb_fee'];
		  
        
		
		echo  "<td>$class_name</td>";
	
		echo  "<td>$exam_fee</td>";
		echo  "<td>$development_fee</td>";
		
		echo "<td> $monthly_fee</td>";
		echo "<td> $hostel_fee</td>";
		
			echo "<td> $tution_fee</td>";
		echo "<td> $lab_fee</td>";
		
echo "<td><a href=\"includes/action/class_fee_config_chng.php?id=$id&class_name=$class_name&exam_fee=$exam_fee&development_fee=$development_fee&monthly_fee=$monthly_fee&hostel_fee=$hostel_fee&tution_fee=$tution_fee&lab_fee=$lab_fee&sub_action=delete&branch_id=$branchid\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"16\" /> </a><a href=\"includes/action/class_fee_config_chng.php?id=$id&class_name=$class_name&exam_fee=$exam_fee&development_fee=$development_fee&monthly_fee=$monthly_fee&hostel_fee=$hostel_fee&tution_fee=$tution_fee&lab_fee=$lab_fee&sub_action=detail&branch_id=$branchid\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,250,550)\"><img src=\"custom_css/process_info.png\" width=\"16\" /> </a><a href=\"includes/action/class_fee_config_chng.php?id=$id&class_name=$class_name&exam_fee=$exam_fee&development_fee=$development_fee&monthly_fee=$monthly_fee&hostel_fee=$hostel_fee&tution_fee=$tution_fee&lab_fee=$lab_fee&sub_action=edit&branch_id=$branchid\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,250,450)\"><img src=\"custom_css/001_45.png\" width=\"14\" /> </a></td>";		
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
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</tfoot>
</table>
			</div>
		
     
		</table>
	

</div>
