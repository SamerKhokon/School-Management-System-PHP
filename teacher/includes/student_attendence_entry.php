<?php 	
		require_once('../db.php');
		session_start();
		$branchid = $_SESSION['LOGIN_BRANCH']; 
 ?>
<script type="text/javascript">
  
    $(document).ready(function(){			   			  
			$("#class_id").focus();
			
		
		
	            var open_datys = function(dt)	 {
                    if(dt!="")
					{	
						$.ajax({
						        type:"post" ,
								url:"includes/get_month_total_open_day.php",
								data:"month_id="+dt ,			
								success:function(st){
								   $("#total_open").val(st);		
								   $("#total_attend").val(st);
								   get_absent($("#total_open").val(),$("#total_attend").val());
								}		
						});		
					}else{
						$("#total_open").val("");		
						$("#total_attend").val("");
						$("#total_absense").val("");					
					}
				}
		
		    open_datys($("#month_id").val());
			
			
			$("#month_id").change(function(){	
			 
			   var month_id = $("#month_id").val();
                //alert(month_id);			
				if(month_id!="") {
				open_datys($("#month_id").val());
				}
			});
		
		var data_table = function()		{
		  $("#attendance_data_load_div").load("includes/student_attendence_entry_datatable.php", function(){ });
		}
		data_table();
		
		$("#class_id").change(function(){
		   var class_id  = $("#class_id").val();
		   var branch_id = $("#branch_id").val();
		   var dataStr = "class_id="+class_id+"&branch_id="+branch_id;
		   
		  $.ajax({
		    type:"post",
			url:"includes/section_fetch.php",
			data:dataStr ,
			success:function(st){
			   //alert(st);
			   $("#section_id").html(st);
			}
		  });
		});
		
		var get_absent = function(total_open,total_attend){
		    $("#total_absense").val("");
			var total_absent = parseInt(total_open) - parseInt(total_attend);
			$("#total_absense").val(total_absent);
		}
		
		$("#total_attend").keyup(function(ex)
		{
		    //if(ex.which==13) 		   {
		   	    var total_open = $("#total_open").val();
				var total_attend = $("#total_attend").val();
				if(parseInt(total_attend) > parseInt(total_open)) 
				{
				  alert("Total attend days must be <= "+total_open);
				  $("#total_absense").val(0);
				}else if(total_attend=="") {
				   $("#total_absense").val(0);
				}else{
				get_absent(total_open,total_attend);
				}
			//}
		});
		
		$("#total_open").keyup(function(ex)
		{
		    //if(ex.which==13) 		   {
		   	    var total_open = $("#total_open").val();
				var total_attend = $("#total_attend").val();
				if(parseInt(total_attend) > parseInt(total_open)) 
				{
				  alert("Total attend days must be <= "+total_open);
				  $("#total_absense").val(0);
				}else if(total_attend=="") {
				   $("#total_absense").val(0);
				}
				else{
					get_absent(total_open,total_attend);
				}
			//}
		});		
		
						
		
		$("#attendence_sub_btn").click(function(){
		   var stu_id = $("#stu_id").val();
		   var class_id   = $("#class_id").val();
		   var section_id = $("#section_id").val();
		   var total_open = $("#total_open").val();
		   var total_attend = $("#total_attend").val();
		   var total_absense = $("#total_absense").val();
		   var month_id      = $("#month_id").val();
		   var branch_id      = $("#branch_id").val();
		   var dataStr = "stu_id="+stu_id+"&class_id="+class_id+"&section_id="+section_id+
								"&total_open="+total_open+"&total_attend="+total_attend+
								"&total_absense="+total_absense+"&month_id="+month_id+"&branch_id="+branch_id;
								
		   if(total_attend==""){
		     alert("Enter total attend");
			 $("#total_attend").focus();
			 return false;
		   }else if(total_open==""){
		     alert("Enter  total open days");
		     $("#total_open").focus();
			 return false;
		   }else if(stu_id=="") {
		       alert("Enter student section roll");
			   $("#stu_id").focus();
			   return false;
		   }else if(class_id==""){
		     alert("Select class");
		   }else{
			   $.ajax({
				  type:"post" ,
				  url:"includes/student_attendence_entry_by_ajax.php" ,
				  data:dataStr ,
				  success:function(st){
					alert(st);
					data_table();
					$("#stu_id").focus();
					$("#class_id").val(' ');
					$("#section_id option").remove();
					$("#section_id").val(' ');
				  }
			   });
		   }
		});
		
		
		
		$("#stu_id").keypress(function(ex){
		    var stu_id = $("#stu_id").val();
		    if(ex.which == 13) {
			   if(stu_id=="") {
			     alert("Enter student ID");
				 $("#stu_id").focus();
				 return false;
			   }else{
			       $.ajax({
				      type:"post" ,
					  url:"includes/student_info_fetch_for_attendance.php" ,
					  data:"stu_id="+stu_id ,
					  success:function(st){
					    var parse = st.split('|');
						$("#class_id").val(parse[0]);
						$("#section_id").append('<option value="'+parse[1]+'">'+parse[1]+'</option>');
					  }
				   });
			   }
			}
		});
		
		
		
	});	
</script>
<div id="content" class="box">

<fieldset class="login">
<legend>Student Attendance</legend>

<input type="hidden" id="branch_id" value="<?php echo $branchid;?>"/>

<input type="hidden" id="cal_vals"  value=""/>

<table border="0" cellpadding="0"  cellspacing="0"  >
        <tr>
		<td>
				<table>
					<tr>
						<th >Month:</th>
						<td>				
							<select id="month_id" name="month_id" class="styledselect-normal">
							   <option value="">Select Month</option>							
							   <option value="Jan-<?php echo date('Y');?>">Jan-<?php echo date('Y');?></option>
							   <option value="Feb-<?php echo date('Y');?>">Feb-<?php echo date('Y');?></option>
							   <option value="Mar-<?php echo date('Y');?>">Mar-<?php echo date('Y');?></option>
							   <option value="Apr-<?php echo date('Y');?>">Apr-<?php echo date('Y');?></option>
							   <option value="May-<?php echo date('Y');?>">May-<?php echo date('Y');?></option>
							   <option value="Jun-<?php echo date('Y');?>">Jun-<?php echo date('Y');?></option>
							   <option value="Jul-<?php echo date('Y');?>">Jul-<?php echo date('Y');?></option>
							   <option value="Aug-<?php echo date('Y');?>">Aug-<?php echo date('Y');?></option>
							   <option value="Sep-<?php echo date('Y');?>">Sep-<?php echo date('Y');?></option>
							   <option value="Oct-<?php echo date('Y');?>">Oct-<?php echo date('Y');?></option>
							   <option value="Nov-<?php echo date('Y');?>">Nov-<?php echo date('Y');?></option>
							   <option value="Dec-<?php echo date('Y');?>">Dec-<?php echo date('Y');?></option>					   
							</select>
						</td>
					</tr>			
					<tr>
						<th >Student Roll:</th>
						<td>				
							<input type="text" id="stu_id" name="stu_id" class="inp-form"/>
						</td>							
					</tr>			
					 <tr><td height="6"></td></tr>	
					<tr>
						<th>Class Name:</th>
						<td>				
						<select id="class_id" name="class_id" class="styledselect-normal">
						<option value="">Select Class</option>
						<?php 
						$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 				
						while ($row=mysql_fetch_array($qry))		{
							echo "<option value=\"$row[0]\">$row[1]</option>";
						 }
						  ?>
						</select>
						</td>
					</tr>
					<tr><td height="6"></td></tr>	
					<tr>
							<th >Section:</th>
							<td>				
							<select id="section_id" name="section_id" class="styledselect-normal"></select>
							</td>
					</tr>			
				</table>
		</td>	
		<td>	
			<table>											
				<tr>
					<th >Total Open Day:</th>
					<td>				
						<input type="text" id="total_open" name="total_open" class="inp-form"></select>
					</td>
					<td>
					
					</td>	
				</tr>			
				 <tr>
					<td height="6"></td>
				</tr>			
				<tr>
					<th >Total Attend:</th>
					<td>				
						<input type="text" id="total_attend" name="total_attend" class="inp-form"></select>
					</td>
					<td>
					
					</td>	
				</tr>			
				 <tr>
					<td height="6"></td>
				</tr>			
				<tr>
					<th >Total Absense:</th>
					<td>				
						<input type="text" id="total_absense" name="total_absense" class="inp-form"></select>
					</td>
					<td>
					
					</td>	
				</tr>			
				 <tr>
					<td height="6"></td>
				</tr>						
				
				<tr>
					<th>&nbsp;</th>
					<td valign="top">
						<input type="button" value="" name="submit" class="form-submit" id="attendence_sub_btn" />
						<input type="button" value="" name="reset" class="form-reset"  />
					</td>
					<td></td>
				</tr>		
			</table>	
		</td>
		</tr>		
	</table>
<br/><br/>
	<div id="attendance_data_load_div"></div>

</fieldset>
</div>  <!-- end box div -->