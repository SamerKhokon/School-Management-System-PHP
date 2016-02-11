<div id="content" class="box">	
<fieldset>
			<legend>SMS Send  to Office Stuff</legend>	
			<table>
				<tr>
				  <td>Stuff Type</td>
				  <td>
					  <select id="stuff_type" class="styledselect-normal">
						<option value="">Select Stuff Type</option>
						<option value="Teacher">Teacher</option>
						<option value="Employee">Employee</option>				
					  </select>
				  </td>
				  	<input type="hidden" id="stuff_mobileno" value=""/>
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
				<tr>
				  <td>SMS</td>
				  <td><textarea id="office_stuff_sms" rows="5" cols="30"></textarea></td>
				</tr>
				<tr>		
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>		
				  <td>&nbsp;</td>
				  <td><input type="button" id="office_stuff_sms_send_btn" class="form-submit" value="Submit"/></td>
				</tr>				
			</table>
			<br/><br/>
		
			<div id="office_stuff_sms_datatable"></div>
			

			
		</fieldset>
</div>		
		<script type="text/javascript">
		$(document).ready(function(){
			$("#stuff_type").change(function(){
				var stuff_type = $('#stuff_type').val();
				 $.ajax({
				  type:"post" ,
				  url:"includes/stuff_mobileno_fetch_by_ajax.php" ,
				  data:"stuff_type="+stuff_type ,
				  success:function(st) {
					 //alert(st);
					 $("#stuff_mobileno").val(" ");
					 $("#stuff_mobileno").val(st);
				  }
			   });	    
			   
				$("#office_stuff_sms_datatable").load("includes/office_stuff_datatable.php",
					{"stuff_type":stuff_type,
					"stuff_mobileno":stuff_mobileno,
					"office_stuff_sms":office_stuff_sms},function(){});
				$("#office_stuff_sms").focus();
			});
			
			$("#confirm_sms_send_to_office_stuff").live("click",function(){
			   var c = confirm('Are you sure want to remove this data?');
			   if(c == true) {
			   }else{
				 return false;
			   }
			});	
			$("#office_stuff_sms_send_btn").click(function(){
				var stuff_type = $('#stuff_type').val();	   
				var office_stuff_sms = $("#office_stuff_sms").val();	  
				
			  if(stuff_type=="")	 {
				alert("Select Stuff Type");
				return false;
			  }else if(office_stuff_sms==""){
				alert("Enter Sms body");
				$("#office_stuff_sms").focus();
				return false;
			  }else{
				  var c= confirm("Are you sure want to send SMS?");	
				  if(c==true){
				  }else{
					 return false;
				  }
			  }
			});				
		});
		</script>