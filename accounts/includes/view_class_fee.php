
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
<legend>Class Fee</legend>
<form name="frm1" id="frm1" method="post" action="">

<table border="0" cellpadding="0"  cellspacing="0">
			<tr>
				<th valign="top">Class Name: &nbsp;&nbsp;</th>
				<td>
				
				<select id="class_name" name="class_id" class="styledselect-normal">
                                    <option>Select</option>
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
<?php

		
?>


<table width=100% id="jq_tbl">	

	
<div id="demo">
				 
				
		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
	
		  <th>Class Name</th>
		  <th>Fee Name </th>
		  <th>Amount</th>
		  <th>Action</th>
		
		<!--  <th>Action&nbsp&nbsp</th>-->
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

/*
function fee_fun($fee_head_id,$fee_name)
 {
$qry2=mysql_query("select fee_head from tbl_class_feehead where branch_id='$branchid' and id='$fee_head_id'" );
$row2=mysql_fetch_array($qry2);
echo $fee_name=$row1['fee_head'];

  return $fee_name;
 }
 */
if (isset($_POST['submit'])){
    



$qry = mysql_query("SELECT  * from tbl_class_fee_info where class_id='$class_id' and branch_id='$branchid'");
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
                  $fee_tbl_id=$row['id'];
	          $class_id=$row['class_id'];
		  $fee_head_id=$row['fee_head_id'];

                  $qry2="select fee_head from tbl_class_feehead where branch_id='$branchid' and id='$fee_head_id'" ;
                  $qr2=mysql_query($qry2);
                  $row2=mysql_fetch_array($qr2);
                  $fee_name=$row2['fee_head'];

                  $amount=$row['amount'];
		 

		 echo  "<td> $class_name </td>";
		 echo  "<td>$fee_name</td>";
		 echo  "<td>$amount</td>";
	echo "<td><a href=\"includes/action/class_fee_chng.php?fee_tbl_id=$fee_tbl_id&sub_action=delete&branch_id=$branchid&class_id=$class_id&fee_head_id=$fee_head_id&fee_name=$fee_name&amount=$amount&class_name=$class_name\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"20\" /> </a><a href=\"includes/action/class_fee_chng.php?fee_tbl_id=$fee_tbl_id&sub_action=detail&branch_id=$branchid&class_id=$class_id&fee_head_id=$fee_head_id&fee_name=$fee_name&amount=$amount&class_name=$class_name\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,250,300)\"><img src=\"custom_css/process_info.png\" width=\"20\" /> </a><a href=\"includes/action/class_fee_chng.php?fee_tbl_id=$fee_tbl_id&sub_action=edit&branch_id=$branchid&class_id=$class_id&fee_head_id=$fee_head_id&fee_name=$fee_name&amount=$amount&class_name=$class_name\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,250,450)\"><img src=\"custom_css/001_45.png\" width=\"18\" /> </a></td>";
	
	

	
// echo "<td><a href=\"includes/routine_function/student_info_chng.php?sub_action=delete&id=$id\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"16\" /> </a><a href=\"includes/routine_function/student_info_chng.php?id=$id&sub_action=detail&roll=$roll&student_name=$student_name&class_name=$class_name&class_sec=$class_sec&total_open_day=$total_open_day&total_atten=$total_atten&total_leave=$total_leave&total_abs=$total_abs&status=$status&result=$result\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,350,550)\"><img src=\"custom_css/process_info.png\" width=\"16\" /> </a><a href=\"includes/routine_function/student_info_chng.php?id=$id&sub_action=edit&roll=$roll&student_name=$student_name&class_name=$class_name&class_sec=$class_sec&total_open_day=$total_open_day&total_atten=$total_atten&total_leave=$total_leave&total_abs=$total_abs&status=$status&result=$result\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,350,450)\"><img src=\"custom_css/001_45.png\" width=\"16\" /> </a></td>";
		
//	<a href="includes/routine_function/demo.php?day_name=$day_name&routine_id=$id"  onclick="return GB_showCenter('Add Routine Details', this.href,250,550)">test</a>       ;	
		
		
		// <a href=\"javascript:chng('img');\"><img src=\"s.png\" name=\"img\"></a> 
		
        echo "</tr>";
		
		$count++;
		}
			
			}
			
				?>
	
   
	</tbody>
	<tfoot>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		
			
		<!--	<th>&nbsp;</th> -->
		</tr>
	</tfoot>
</table>
			</div>
		
     
		</table>
	

</div>

