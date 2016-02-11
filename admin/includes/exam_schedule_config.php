

<script type="text/javascript">


               $(document).ready(function(){
						  $("#classname").focus();
															
						  var branch_id="<?php echo $branchid; ?>";
						  
						 // alert(branch_id);												
		 													
						  $("#list").load('includes/table/exam_sche_config_tbl.php?branch_id='+branch_id);
						  
						           	$("#classname").keydown(function(event)
								     {
									     if(event.keyCode == 13 )
									   
								   			{
									        $("#exam_name").focus();
											
											}
									
									});
									$("#exam_name").keydown(function(event)
								    {
									  if(event.keyCode == 13 )
									   
								   			{
									  $("#period").focus();
									  }
									
									});
									$("#period").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
									   
								   			{
									
									  $("#sub_name").focus();
									  
									  }
									 }) 
									$("#sub_name").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
									   
								   			{
									
									        $("#date_from").focus();
									  
									        } 
									  
									});
									
									
							   $("#date_from").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
								   			{
									
												    $("#class_hour_s").focus();     
												//  $("#date_from").focus();
									   	
									        }
									 }) 
								$("#class_hour_s").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
								   			{
									
												    $("#class_min_s").focus();     
												//  $("#date_from").focus();
									   	
									        }
									 })	 
									 	$("#class_min_s").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
								   			{
									
												    $("#class_hour_e").focus();     
												//  $("#date_from").focus();
									   	
									        }
									 })	
									 	 
								$("#class_hour_e").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
								   			{
									
												    $("#class_min_e").focus();     
												//  $("#date_from").focus();
									   	
									        }
									 })	 
								$("#class_min_e").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
								   			{
									
												   $("#exam_btn").focus();     
												//  $("#date_from").focus();
									   	
									        }
									 })	
							
									
									$("#exam_btn").click(function(event)
								    {
									         var result = window.confirm("Click OK or Cancel.");
											 if(result)
											    {
												    var classname=$("#classname").val();
												    var exam_name=$("#exam_name").val();
												    var period= $("#period").val();
											  		var sub_name= $("#sub_name").val();
													var date_from=$("#date_from").val();
												    var class_hour_s= $("#class_hour_s").val();
													var class_min_s= $("#class_min_s").val();
													var class_hour_e= $("#class_hour_e").val();
													var class_min_e= $("#class_min_e").val();
										            var branch_id="<?php echo $branchid; ?>";
													
													
											   $.ajax({
				                             	 	  url:'includes/table/exam_sche_config_tbl_insert.php',
		  				 							  type:'post',
										 
								data:'&classname='+classname+'&exam_name='+exam_name+'&period='+period+'&sub_name='+sub_name+'&date_from='+date_from+'&class_hour_s='+class_hour_s+'&class_min_s='+class_min_s+'&class_hour_e='+class_hour_e+'&class_min_e='+class_min_e+'&branch_id='+branch_id,	 
													  success:function(htmData)
														   {
													 		  alert(htmData);
															  
															  $('#classname').val('');
															  $('#exam_name').val('');
															  $('#period').val('');
															  $('#sub_name').val('');
															  $('#date_from').val('');
															  $('#date_start').val('');
															  $('#date_end').val('');
															  
															//  $('#address').val('');
															  
															  
														   $("#classname").focus();
						  $("#list").load('includes/table/exam_sche_config_tbl.php?branch_id='+branch_id);
														   

							 								  },
		 				 							  error:function(FData)
														   {
															 alert(FData);
		  												   } 
				       								   });																																  
									        } 

									});

							    });	

</script>






<div id="content" class="box">

			
<fieldset class="login">
<legend>Add Exam Details</legend>
<table border="0" cellpadding="0"  cellspacing="0">

			<tr>
			<th valign="top">Class Name </th>   				
			<td>	: &nbsp;&nbsp; <select id="classname" name="classname" class="styledselect-normal">
				<?php 
		$qry = mysql_query("select class_name from std_class_config where branch_id='$branchid' "); 		
		
		while ($row=mysql_fetch_array($qry))
		{
		echo "<option>$row[0]</option>";
		}
		?>
		</select></td>
		<td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>	
		</tr>
             <tr>
            	<td height="6"></td>
            </tr>
		<tr>
			  
		<th valign="top">Exam name  </th>		
			<td>	: &nbsp;&nbsp; <select id="exam_name" name="exam_name" class="styledselect-day">
				<?php 
		
		$qry = mysql_query("select exam_name from std_exam_config where branch_id='$branchid' group by exam_name"); 		
		
		while ($row=mysql_fetch_array($qry))
		{
		echo "<option>$row[0]</option>";
		}
		?>		
		</select>
		</td>	</tr>
             <tr>
            	<td height="6"></td>
            </tr>
		<tr>
		<th valign="top">Period  </th>
			<td>	: &nbsp;&nbsp; <select id="period" name="period" class="styledselect-day">
				<?php 
							
					$qry = mysql_query("select period from std_exam_config  where branch_id='$branchid' group by period"); 		
					
					while ($row=mysql_fetch_array($qry))
					{
					
					echo "<option>$row[0]</option>";
					}
					?>		
					</select>
			</td>
			

			</tr>
                 <tr>
            	<td height="6"></td>
            </tr>
			<tr>
			<th valign="top">Subject Name </th>
			<td>	:&nbsp;&nbsp; <select id="sub_name" name="subname" class="styledselect-normal">
				<?php 							
					$qry = mysql_query("select subject_name from std_subject_config where branch_id='$branchid' "); 		
					
					while ($row=mysql_fetch_array($qry))
					{
					
					echo "<option>$row[0]</option>";
					}
					?>		
					</select>
					</td>
		</tr>
		<tr>
		<th valign="top">Exam Date </th>
		 <td> &nbsp;&nbsp; <input onclick='scwShow(this,event);'  id="date_from" name="date_from" value="<?php echo date('d-m-Y') ?>" class="inp-form"/></td>
							<td><div class="bubble-left"></div>
	<div class="bubble-inner"><p id="err_dat">Select exam date</p></div>
	<div class="bubble-right"></div></td>
			</tr>
			<tr>	
		<th valign="top">Start Time</th>
		<td>
		: &nbsp;&nbsp; <select id="class_hour_s" class="styledselect-day" name="hour_s">
					
					<?php
					for($i=1;$i<=12;$i++ )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
				</select>
					<select id="class_min_s" class="styledselect-month" name="minute_s">
					<?php
					for($i=0;$i<60;$i=$i+5 )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
					
					</select>
				</td>
				<td><div class="bubble-left"></div>
	<div class="bubble-inner"><p id="err_sml_4">Select class time</p></div>
	<div class="bubble-right"></div></td>
				</tr>
				<tr>
				<th valign="top"> End Time</th>
		<td>
		: &nbsp;&nbsp; <select id="class_hour_e" class="styledselect-day" name="hour_e">
					
					<?php
					for($i=1;$i<=12;$i++ )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
				</select>
					<select id="class_min_e" class="styledselect-month" name="minute_e">
					<?php
					for($i=0;$i<60;$i=$i+5 )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
					
					</select>
				</td>
				<td><div class="bubble-left"></div>
	<div class="bubble-inner"><p id="err_sml_4">Select class time</p></div>
	<div class="bubble-right"></div></td>
			</tr>
                 <tr>
            	<td height="6"></td>
            </tr>
			<tr>	
			<td>	
			
				<input type="hidden" id="branchid" name="branchid" value="<?php echo $branchid;?>">
				
			
				 <button id="exam_btn" name="exam_btn" class="form-submit">submit</button>
			</td>
			</tr>	
		</table>	
</fieldset>




<table id="list"  width="100%">



</table>  

<div id="pager" class="scroll" style="text-align:center;"></div>  


</div>