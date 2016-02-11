
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
											
											
										 		$("#sec_name").focus();
											}
									
									});
								$("#sec_name").keydown(function(event)
								     {
									     if(event.keyCode == 13 )
									   
								   			{
												 $("#month_id").focus();
											}
									
									});
								$("#month_id").keydown(function(event)
								     {
									     if(event.keyCode == 13 )
									   
								   			{
												 $("#year_id").focus();
											}
									
									});
								$("#year_id").keydown(function(event)
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
<legend>Class Ways Fee Details</legend>
<form name="frm1" id="frm1" method="post" action="">

<table border="0" cellpadding="0"  cellspacing="0"  id="id-form">
			<tr>
				<th valign="top">Class Name:</th>
				<td>
				
				<select id="class_name" name="class_id" class="styledselect-normal">
                <option>select</option>
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
			<th valign="top">Section Name:</th>
			<td>
					<select id="sec_name" name="section_name" class="styledselect-day">
				   <option>select </option>
				  <option value="A">A</option>
				  <option value="B">B</option>
				  <option value="C">C</option>
				  <option value="D">D</option>
				  <option value="E">E</option>
				  <option value="F">F</option>
				  
		     </select>
			
			
			</td>
	        <td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_rep2">This field is required.</p></div>
			</td>	
		    </tr>
            <tr><th valign="top">Month</th>
            
                <td>
                  <select id="month_id" name="month_name" class="styledselect-year">
				  <option><?php  echo date('M') ?> </option>
				  <option value="1">Jan</option>
				  <option value="2">Feb</option>
				  <option value="3">Mar</option>
				  <option value="4">Apr</option>
				  <option value="5">May</option>
				  <option value="6">Jun</option>
                   <option value="7">Jul</option>
				  <option value="8">Aug</option>
				  <option value="9">Sep</option>
				  <option value="10">Oct</option>
				  <option value="11">Nov</option>
				  <option value="12">Dec</option>
				  
		     </select>
             <?php
			 
			 $year = date("Y");
			 
			 $pre = $year - 10;
			 
			 $next = $year + 10;

		
			 ?>
             
              
                  <select id="year_id" name="year_name" class="styledselect-year">
				  <option><?php  echo $year;  ?></option>
				  <?php
				  
				  
				  
				    for($i=$pre;$i<=$next;$i++)
					    {
						
						 echo "<option value=\"$i\">$i</option>";
						}
				  
				  
				  
				  ?>
				  
		     </select>
                </td>
            
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
          <th>Section Name</th>
          <th>Month </th>
		  <th>Fee Name</th>
	 
		  <th>Amount</th>        
		
		</tr>
	</thead>
	<tbody>
 <?php
 
 $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_roll_of_head';
 
 
 //$url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';

      $class_id=$_REQUEST['class_id'];
   	  $sec_name=$_REQUEST['section_name'];
	  $month_name=$_REQUEST['month_name'];
	  $year_id=$_REQUEST['year_name'];
	
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
		   //$mon_id=month_to_num($month_name);
		 
					   
		  $month_id=month_to_num($month_name)."-".$year_id;
		  
		  $month_nam=$month_name."-"."$year_id";
		
		//  $mon_id=date('m-Y',month_id);
					   
	 
	 $qu="select id from std_class_section_config where class_id='$class_id' and section_name='$sec_name'  and branch_id='$branchid'";
	$q=mysql_query($qu);
	$r=mysql_fetch_array($q);
	$sec_id=$r['id'];
	 

if (isset($_POST['submit'])){
 
//echo $qry = "select fee_head_name,sum(amount),class_name from std_fee_details where class_id='$class_id' and section_id='$sec_id' and branch_id='$branchid' and month='$month_id' group by fee_head_name";
   $qry="select fee_head_name,sum(amount),class_name from std_fee_details where class_id='$class_id' and section_id='$sec_id' and branch_id='$branchid' and month='$month_nam' group by fee_head_name";
  
      $qr=mysql_query($qry);
		$count=1;
		$total_amount=0;
		
		while ($row=mysql_fetch_array($qr))
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
	   
		  $class_name=$row['class_name'];
		  $head_name=$row[0];
		  $amount=$row[1];
		  
		  $total_amount=$total_amount+$amount;
		  
		  $class_name=$row[2];

		
		echo  "<td>$class_name</td>";
		echo  "<td>$sec_name</td>";
		echo  "<td>$month_name</td>";
	
		
		echo   "<td><a href= \"$url\">$head_name</a></td>";
		
		
		echo  "<td>$amount</td>";
	

	
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
			<th></th>
			<th></th>
			<th></th>
		    <th></th>
			<th align="center">Total:<?php echo $total_amount; ?></th>
			
	
		
			
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
		
     
		</table>
	

</div>

