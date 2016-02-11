<script type="text/javascript">
        $(document).ready(function(){			   
			              $('#example').dataTable( {
							"sPaginationType": "full_numbers"				
				   			    } );
			   
						  $("#class_name").focus();										  
						           	$("#class_name").keydown(function(event)
								     {
									     if(event.keyCode == 13 )									   
								   			{
										 		$("#sub_btn").focus();
											}									
									});
									$("#sub_btn").click(function(event)
								    {									
									//var class_name=$("#class_name").val();
								//	var sec_name  =$("#sec_name").val();
									});														
	    });	
</script>

<div id="content" class="box">


<fieldset class="login">
<legend>Transport Fee</legend>
<form name="frm1" id="frm1" method="post" action="">

<table border="0" cellpadding="0"  cellspacing="0">
			<tr>
				<th valign="top">Class Name: &nbsp;&nbsp;</th>
				<td>				
				<select id="class_name" name="class_id" class="styledselect-normal">
                <option>Select Class</option>
				<?php 
						$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 				
						while ($row=mysql_fetch_array($qry))		{
									echo "<option value=\"$row[0]\">$row[1]</option>";
						 }
		          ?>
				</select>
				</td>
				
				
				
	            <td>
				<div class="error-left"></div>
				<div class="error-inner"><p id="err_rep">This field is required.</p></div>
				</td>	
			</tr>
		
		
			<tr>
            	<td height="6"></td>
            </tr>
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" name="submit" class="form-submit" id="sub_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>
		
	</table>

</form>
</fieldset>


<table width=100% id="jq_tbl">	
<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
					      <th>Student Name</th>
						  <th>Class Name</th>
						  <th>Scholarship Name </th>
						  <th>Amount</th>
						</tr>
					</thead>
					<tbody>
				 <?php
				// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';
					$class_id=$_REQUEST['class_id'];
					$qry1="select class_name from std_class_config where id='$class_id' and branch_id='$branchid'";
					$qr1=mysql_query($qry1);
					$row1=mysql_fetch_array($qr1);
					$class_name=$row1['class_name'];

					if (isset($_POST['submit'])){
					   /*
						$qry = mysql_query("SELECT  * from tbl_class_fee_info where class_id='$class_id' and fee_head_id=8 and branch_id='$branchid'");
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
									$fee_tbl_id=$row['id'];
									$class_id=$row['class_id'];
									$fee_head_id=$row['fee_head_id'];

								  $qry2="select fee_head from tbl_class_feehead where branch_id='$branchid' and fee_head='transport' and id='$fee_head_id'" ;
								  $qr2=mysql_query($qry2);
								  $row2=mysql_fetch_array($qr2);
								  $fee_name=$row2['fee_head'];

								  $amount=$row['amount'];
						 

							echo  "<td> $class_name </td>";
							echo  "<td>$fee_name</td>";
							echo  "<td>$amount</td>";		
							echo "</tr>";		
							
							$count++;
						}*/	
						echo '<tr>
					      <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						</tr>';						
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
</div>