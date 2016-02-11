<div id="content" class="box">	
	<fieldset>
			<legend>SMS Send  to Student Parents</legend>						
			<table cellpadding="0" cellspaccing="0">
                <tr><td>Class</td>
					<td>
					<select id="class_id" class="styledselect-normal">
					<option value="">Select Class</option>
					<?php
						$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 				
						while ($row=mysql_fetch_array($qry))		{
							echo '<option value="'.$row[0].'">'.$row[1].'</option>';
						}					 
						//parent_sms_sender_html_form.php
					?>
					</select>
					</td>
					<input type="hidden" id="parent_mobileno" value=""/>
				</tr>
				<tr>		
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
					<tr><td>SMS Type</td>
					<td>
					<select id="sms_type" class="styledselect-normal">
					<option value="">Select Type</option>
							<option value="Notice">Notice</option>
							<option value="Exam">Exam</option>
						    <option value="Result">Result</option>
							<option value="Other">Other</option>	
						</select>
					</td>
					<input type="hidden" id="parent_mobileno" value=""/>
				</tr>
					<tr>		
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>	
                <tr><td>SMS</td>
					<td><textarea id="parent_sms" rows="5" cols="30"></textarea></td>
				</tr>				
				<tr>		
				  <td>&nbsp;</td>
				  <td><input type="button" id="parent_sms_send_btn" class="form-submit" value="Submit"/></td>
				</tr>								
			</table>
			
			<br/><br/>
			<div id="parent_sms_datatable"></div>
		</fieldset>
</div>		
		<script type="text/javascript">
		$(document).ready(function(){
				$("#class_id").change(function(){
				   var class_id = $('#class_id').val();
					$.ajax({
						type:"post",
						url:"includes/parents_mobileno_fetch_by_ajax.php" ,
						data:"class_id="+class_id ,
						success:function(st){
							 //alert(st);
							$("#parent_mobileno").val(" ");
							$("#parent_mobileno").val(st);			   
						}
					});					
						$("#parent_sms_datatable").load("includes/parent_sms_datatable.php",
						{"class_id":class_id,"parent_sms":parent_sms,
						"parent_mobileno":parent_mobileno},function(){});
						$("#parent_sms").focus();
				});						
				$("#confirm_sms_send_to_parents").live("click",function(){
					var c = confirm('Are you sure want to remove this data?');
					if(c==true)	{					 
					}else{
					  return false;
					}
				});	
				$("#parent_sms_send_btn").click(function(){	 	  
					var class_id 		= $("#class_id").val();
					var	parent_sms 		= $("#parent_sms").val();	  					
					if(class_id=="") 
					{
					  alert("Select Class");
					  return false;
					}
					else if(parent_sms=="") 
					{
					  alert("Enter Sms body");
					  $("#parent_sms").focus();
					  return false;
					}
					else
					{
					 var c= confirm("Are you sure want to send SMS?");     
					  if(c==true){
					  }else{
						 return false;
					  }
					}  
				});
			});
		</script>