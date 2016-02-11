



<script type="text/javascript">

               $(document).ready(function(){
						  $("#group_name").focus();
						  
						  var branchid="<?php echo $branchid; ?>";
								
						  $("#list").load('includes/table/group_config_tbl.php?branchid='+branchid);
						  
						           	$("#group_name").keydown(function(event)
								     {
									     if(event.keyCode == 13 )
									   
								   			{
											 	if($("#group_name").val()=="")
												{
												 $("#err_rep1").fadeOut(200);
												 $("#err_rep1").fadeIn(1200);
												}
												else
												{
									        	$("#class_name").focus();
												}
											}
									
									});
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
									
									  $("#group_btn").focus();
									  
									  }
									 }) 
								
									$("#group_btn").click(function(event)
								    {
									    
									
									         var result = window.confirm("Click OK or Cancel.");
											 
											 if(result)
											    {
												    var group_name=$("#group_name").val();
												    var class_name=$("#class_name").val();
												    var sec_name= $("#sec_name").val();
											  	//	var st_mark= $("#st_mark").val();
													
										            var branchid=<?php echo $branchid; ?>;
											   $.ajax({
				                             	 	  url:'includes/table/group_config_tbl_insert.php',
		  				 							  type:'post',
	 data:'&group_name='+group_name+'&class_name='+class_name+'&sec_name='+sec_name+'&branchid='+branchid,
													 
													  success:function(htmData)
														   {
													 		  alert(htmData);
															  
															  $('#group_name').val('');
															  $('#class_name').val('');
															  $('#sec_name').val('');
														
						  $("#list").load('includes/table/group_config_tbl.php?branchid='+branchid);
						   $("#group_name").focus();
														   

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
<legend>Group Details</legend>
			
			<table>
				<tr><th valign="top">Group Name :</th> 
				<td> <input type="text" id="group_name" name="groupname" class="inp-form"></td>
				<td>
		    	<div class="error-left"></div>
			    <div class="error-inner"><p id="err_rep1">This field is required.</p></div>
	            </td>
				</tr>

				<tr><th valign="top">Class Name :</th> 				
				<td><select id="class_name" name="classname" class="styledselect-normal">
				<?php 
				
				
		$qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid' "); 		
		
		while ($row=mysql_fetch_array($qry))
		{
		echo "<option value=\"$row[0]\">$row[1]</option>";
		}
		?>
		</select></td>
			<td>
		    <div class="error-left"></div>
			<div class="error-inner"><p id="err_rep2">This field is required.</p></div>
	        </td>
		    </tr>
			

			
				<tr><th valign="top">Section Name :</th>
				<td><select id="sec_name" name="secname" class="styledselect-day">
				<?php 
		$qry = mysql_query("select id,section_name from std_class_section_config where branch_id='$branchid' group by section_name "); 		
		
		while ($row=mysql_fetch_array($qry))
		{
		echo "<option value=\"$row[0]\">$row[1]</option>";
		}
		?>
				</select></td>
							<td><div class="bubble-left"></div>
	<div class="bubble-inner"><p id="err_rep3">Select class time</p></div>
	<div class="bubble-right"></div></td>
				</tr>
				
			
				
			<tr><td>	 <button id="group_btn" class="form-submit">submit</button></td></tr>
		</table>		
		
</fieldset>

<table id="list" width="100%"></table>  
<div id="pager" class="scroll" style="text-align:center;"></div>  
<!--<input type="BUTTON" id="bedata" value="Edit Selected" /> -->

</div>