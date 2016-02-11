<?php session_start();?>
<html>
<head>
<script type="text/javascript">
$(document).ready(function()
{  
		$('#stu_name').focus().select();		
		$('#class_name').change(function(ex)
		{
		    var class_name = $("#class_name").val();
			if(class_name !=0) 
			{
			    $.ajax({
			        type:"post" ,
				    url: "includes/get_ur_section_by_ajax.php" ,
				    data:"class_name="+class_name ,
				    cache:false ,
				    success:function(st) 
				    {
				  	  $('#section_name').val('');
				      $('#section_name').val(st);
					  $('#class_name').val(class_name);					  

					  student_basic_info($('#class_name').val(),$('#section_name').val());
					  $('#stu_name').focus();
				    }
			    });
			}   
		});
		var section_call = function(class_name) {
			$.ajax({
					  type:"post" ,
					  url: "includes/get_ur_section_by_ajax.php" ,
					  data:"class_name="+class_name ,
					  cache:false ,
					  success:function(st) {
					      $('#section_name').val('');
						  $('#section_name').val(st);
						  $('#class_name').val(class_name);
						  $('#stu_name').focus();
					  }
			});		 
		}
		
		var student_basic_info = function(class_name,section_name )
		{				
		     var dataStr = "class_name="+class_name+"&class_sec="+section_name;		   
		     $.ajax({
		      type:"post" ,
			  url:"includes/get_ur_adm_info_by_ajax.php",
			  data:dataStr ,
			  success:function(st) {
			  
			     var parse = st.split('|');
				 if(parse[0]!='' && parse[1]!='' && parse[2]!='') 
				 {
					$("#profile_id").val(parse[0]);
					$("#class_roll").val(parse[1]);
					$("#section_roll").val(parse[2]); 					
				 }
				 else
				 {
					$("#profile_id").val(' ');
					$("#class_roll").val(' ');
					$("#section_roll").val(' ');
				 }
			  }
		   });		  
		}	
		
		$('#stu_name').keydown(function(event)
		{
		    if (event.keyCode == 13)
			{ 
			    var stu_name = $("#stu_name").val();
				var class_name = $("#class_name").val();
				if(stu_name=="") 
				{
				  alert("Enter Fullname");
				  $("#stu_name").focus();
				  return false;
				}
				else
				{				
				   $.ajax({
					  type:"post" ,
					  url: "includes/get_ur_section_by_ajax.php" ,
					  data:"class_name="+class_name ,
					  cache:false ,
					  success:function(st) {
					      $('#section_name').val('');
						  $('#section_name').val(st);
						  $('#class_name').val(class_name);
						  $('#group_name').focus();
					  }
					});	
                     $("#age").focus();					
				}
			}		
		});
				
	    $('#age').keydown(function(event){
		     if (event.keyCode == 13){ $('#father_name').focus();}		
		});	
		$('#father_name').keydown(function(event){
		     if (event.keyCode == 13){ $('#father_rank').focus();}		
		});	
		$('#father_rank').keydown(function(event){
		     if (event.keyCode == 13){ $('#father_wrk_address').focus();}		
		});
		$('#father_wrk_address').keydown(function(event){
		     if (event.keyCode == 13){ $('#father_income').focus();}		
		});	
		$('#father_income').keydown(function(event){
		     if (event.keyCode == 13){ $('#father_wrk_phone').focus();}		
		});	
		$('#father_wrk_phone').keydown(function(event){
		     if (event.keyCode == 13){ $('#father_cell_phone').focus();}		
		});	
		$('#father_cell_phone').keydown(function(event){
		     if (event.keyCode == 13){ $('#mother_name').focus();}		
		});	
		$('#mother_name').keydown(function(event){
		     if (event.keyCode == 13){ $('#mother_rank').focus();}		
		});
		$('#mother_rank').keydown(function(event){
		     if (event.keyCode == 13){ $('#mother_wrk_address').focus();}		
		});	
		$('#mother_wrk_address').keydown(function(event){
		     if (event.keyCode == 13){ $('#mother_income').focus();}		
		});	
		$('#mother_income').keydown(function(event){
		     if (event.keyCode == 13){ $('#mother_wrk_phone').focus();}		
		});	
		$('#mother_wrk_phone').keydown(function(event){
		     if (event.keyCode == 13){ $('#mother_cell_phone').focus();}		
		});	
		$('#mother_cell_phone').keydown(function(event){
		     if (event.keyCode == 13){ $('#pre_address').focus();}		
		});
		$('#pre_address').keydown(function(event){
		     if (event.keyCode == 13){ $('#par_address').focus();}		
		});
		$('#par_address').keydown(function(event){
		     if (event.keyCode == 13){ $('#pre_school_name').focus();}		
		});
				
		$('#pre_school_name').keydown(function(event){
		     if (event.keyCode == 13){ $('#pre_school_add').focus();}		
		});			
		$('#pre_school_add').keydown(function(event){
		     if (event.keyCode == 13){ $('#pre_class').focus();}		
		});	
		$('#pre_class').keydown(function(event){
		     if (event.keyCode == 13){ $('#pre_class_roll').focus();}		
		});	
		$('#pre_class_roll').keydown(function(event){
		     if (event.keyCode == 13){ $('#pre_class_result').focus();}		
		});	
		$('#pre_class_result').keydown(function(event){
		     if (event.keyCode == 13){ $("#button").focus();}		
		});		
			
	
		$('#reset_button').click(function(){
			reset_fields();
		});

	
	var reset_fields = function() {
		 $('#stu_name').val(' ');
		 $('#age').val(' ');
		 $('#sex').val(0);
		 $('#birthday').val('<?php echo date("d-m-Y")?>');
		 $('#admission_date').val('<?php echo date("d-m-Y")?>');
		 $('#group_name').val(0);
		 $('#payslip_no').val(' ');
		 $('#h_tel').val(' ');
	
      	$('#pre_address').val(' ');	
		 $('#par_address').val(' ');	
		 
		
	
		 $('#emer_name1').val(' ');
		 $('#emer_mobile1').val(' ');
		 $('#emer_name2').val(' ');
		 $('#emer_mobile2').val(' ');
		 $('#emer_email').val(' ');

		 $('#father_name').val(' ');
		 $('#father_rank').val(' ');
		 $('#father_wrk_address').val(' ');
		 $('#father_income').val(' ');
		 $('#father_wrk_phone').val(' ');
		 $('#father_cell_phone').val(' ');

		 $('#mother_name').val(' ');
		 $('#mother_rank').val(' ');
		 $('#mother_wrk_address').val(' ');
		 $('#mother_income').val(' ');
		 $('#mother_wrk_phone').val(' ');
		 $('#mother_cell_phone').val(' ');
			
		 $('#pre_school_name').val(' ');
		 $('#pre_class').val(' ');
		 $('#pre_school_add').val(' ');
		 $('#pre_class').val(' ');
		 $('#pre_class_roll').val(' ');
		 $('#pre_class_result').val(' ');	
		 
		 $("#nationality").val("Bangladeshi");
		$("#dob_date").val('');
		$("#dob_month").val('');
		$("#dob_year").val('');
		
		$("#religion").val(0);
		
		$("#joining_date").val('');
		$("#joining_month").val('');
		$("#joining_year").val('');			 
		 $('#stu_name').focus();
		 
	}
$("#save_button").click(function()
	{			
		var stu_name     = $('#stu_name').val();
		var age          = $('#age').val();
		var sex		     = $('#sex').val();
				
		var dt = $("#dob_date").val();
		var mn = $("#dob_month").val();
		var yr = $("#dob_year").val();
		var birthday = yr+'-'+mn+'-'+dt;
		
		var join_dt = $("#joining_date").val();
		var join_mn = $("#joining_month").val();
		var join_yr = $("#joining_year").val();		
		var adm_date= join_yr+'-'+join_mn+'-'+join_dt;
		
		
		var class_name   = $('#class_name').val();
		var section_name = $('#section_name').val();	
		var group_name   = $('#group_name').val();
		var payslip_no   = $('#payslip_no').val();
		var h_tel		 = $('#h_tel').val();
		
		var pre_address  = $('#pre_address').val();	
		
		var par_address  = $('#par_address').val();
		
		var emer_name1   = $('#emer_name1').val();
		var emer_mobile1 = $('#emer_mobile1').val();
		var emer_name2	 =  $('#emer_name2').val();
		var emer_mobile2 = $('#emer_mobile2').val();
		var emer_email	 = $('#emer_email').val();

		var father_name        = $('#father_name').val();
		var father_rank        = $('#father_rank').val();
		var father_wrk_address = $('#father_wrk_address').val();
		var father_income      = $('#father_income').val();
		var father_wrk_phone   = $('#father_wrk_phone').val();
		var father_cell_phone  = $('#father_cell_phone').val();

		var mother_name        = $('#mother_name').val();
		var mother_rank        = $('#mother_rank').val();
		var mother_wrk_address = $('#mother_wrk_address').val();
		var mother_income	   = $('#mother_income').val();
		var mother_wrk_phone   = $('#mother_wrk_phone').val();
		var mother_cell_phone  = $('#mother_cell_phone').val();
			
		var pre_school_name    = $('#pre_school_name').val();
		var pre_class          = $('#pre_class').val();
		var pre_school_add     = $('#pre_school_add').val();
		var pre_class          = $('#pre_class').val();
		var pre_class_roll     = $('#pre_class_roll').val();
		var pre_class_result   = $('#pre_class_result').val();
	    var quota              = $("#quota").val();
		var nationality        = $("#nationality").val();
		var religion           = $("#religion").val();
		var branch_id          = $("#branch_id").val();
	
		
		var dataStr ="stu_name="+stu_name+"&age="+age+"&sex="+sex+'&birthday='+birthday+"&adm_date="+adm_date+"&class_name="+class_name+"&section_name="+section_name+
		"&group_name="+group_name+"&payslip_no="+payslip_no+"&h_tel="+h_tel+"&par_address="+par_address+"&emer_name1="+emer_name1
		+"&emer_mobile1="+emer_mobile1+"&emer_name2="+emer_name2+"&emer_mobile2="+emer_mobile2+"&emer_email="+emer_email+"&father_name="+father_name+
		"&father_rank="+father_rank+"&father_wrk_address="+father_wrk_address+
		"&father_income="+father_income+"&father_wrk_phone="+father_wrk_phone+
		"&father_cell_phone="+father_cell_phone+"&mother_name="+mother_name+
		"&mother_rank="+mother_rank+"&mother_wrk_address="+mother_wrk_address+
		"&mother_income="+mother_income+"&mother_wrk_phone="+mother_wrk_phone+
		"&mother_cell_phone="+mother_cell_phone+"&pre_school_name="+pre_school_name+"&pre_school_add="+pre_school_add+
		"&pre_class="+pre_class+"&pre_class_roll="+pre_class_roll+
		"&pre_class_result="+pre_class_result+"&branchid="+branch_id+"&quota="+quota+"&nationality="+
		nationality+"&religion="+religion+"&pre_address="+pre_address;
		
       	 if(stu_name=="")	 
		 {
		   alert('Enter Fullname');
		   $("#stu_name").focus();
		   return false;
		 }
		 else if(father_wrk_phone=="")
		 {
		    alert('Enter Father Work Phone');
		    $("#father_wrk_phone").focus();
			return false;
		 }
		 else if(age=="")
		 {
		    alert("Enter Age");
			$("#age").focus();
			return false;
		 }
		 else if(sex=="")
		 {
		    alert("Select Sex");
			$("#sex").focus();
			return false;
		 }
		 else if(dt=="")  {
			alert("select DOB date");
			return false;
		 }else if(mn=="") {
		  alert("select DOB month");
		  return false;
		 }else if(yr=="") {
		  alert("select DOB year");
		  return false;			
		 }
		else if(join_dt=="") {
			alert("Select admission date");
			return false;
		}else if(join_mn=="") {
			alert("Select admission month");
			return false;
		}else if(join_yr=="") 	{
			alert("Select admission year");
			return false;			
		}else if(nationality==""){
		  alert("Enter nationality");
		  return false;
		}else if(religion==""){
		  alert("Select religion");
		  return false;
		}			
		else
		{	
			$.ajax({  
				type: "POST",  
				url: "includes/edit_stu_admission_form_back.php",  
				data: dataStr,     
				success: function(st)
				{  	 
					alert(st);
					reset_fields();
					section_call(class_name);
					 student_basic_info($('#class_name').val(),$('#section_name').val());
				}  	 
			}); 			
			return false;
		}		
	});		

});
	</script>
	</head>
	<body>
	<?php require_once("../db.php");
	$branchid =  $_SESSION["LOGIN_BRANCH"]; 
	?>
	<input type="hidden" id="branch_id" value="<?php echo $branchid;?>"/>
	<div id="content" class="box">
	  <h3 >Add New Student Details</h3>	  
	  <fieldset >
	<legend>Student Details</legend>
	<table width="100%" border=1><tr>
	<td width="50%">			
        <table>
			      

			     
            	<tr>
                	<th>Admit Class Name* : </th>
                    <td> <select id="class_name" name="class_name" class="styledselect-normal">
					    <option value="0">select any class</option>
					<?php 
						$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 		
						while ($row=mysql_fetch_array($qry))
						{
							echo "<option value=\"$row[0]\">$row[1]</option>";
						}
					?></td>
                    <td></td>
				</tr>
			<!-- name will be here -->
			<tr>
				<th>Name* : </th>
				<td> <input type="text" id="stu_name" name="stu_name" class="inp-form" /></td>
                <td> 
				    
				</td>
            </tr>	
          				
			<tr>
			   <th>Date of Birth* : </th>
			   <td>
			   

						<select id="dob_date" class="styleselect-day">
						   <option value="">dd</option>
						  <?php for($i=1;$i<=31;$i++) {
						  if($i<=9){$i='0'.$i;}else{ $i=$i; }
						  ?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
						  <?php } ?>
						</select>
						<select id="dob_month" class="styleselect-day">
						   <option value="">mm</option>
						  <?php for($i=1;$i<=12;$i++) { 
							   if($i<=9){$i='0'.$i;}else{ $i=$i; }
						  ?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
						  <?php } ?>
						</select>
						<select id="dob_year" class="styleselect-day">
						   <option value="">yyyy</option>
						  <?php for($i=1970;$i<=2080;$i++) { ?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
						  <?php } ?>
						</select>
			   
			   </td>
			   <td>				
			   </td>				   
			</tr>
			
			<tr>
				<th>Age* : </th>
				<td> 
					<input type="text" id="age" name="age" class="inp-form" />
				</td>
				<td>
				</td>                     
            </tr>
			<tr>
				<th>Gender* : </th>
				<td>
				 <select id="sex" name="sex" class="styledselect-normal">
					<option value="Male">Boy</option>
					<option value="Female">Girl</option>				  
				 </select>
				</td>
				 <td>		<input type="hidden" id="payslip_no" value=""/>	</td>
			</tr>		
				
			<tr>
			   <th>Admission Date* : </th>
			   <td>
			   
			   	<select id="joining_date" class="styleselect-day">
					   <option value="">dd</option>
					  <?php for($i=1;$i<=31;$i++) {
								if($i<=9){$i='0'.$i;}else{ $i=$i; }
					  ?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
					<?php } ?>
				</select>
				<select id="joining_month" class="styleselect-day">
				   <option value="">mm</option>
				  <?php for($i=1;$i<=12;$i++) { 
					   if($i<=9){$i='0'.$i;}else{ $i=$i; }
				  ?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
				  <?php } ?>
				</select>
				<select id="joining_year" class="styleselect-day">
				   <option value="">yyyy</option>
				  <?php for($i=1970;$i<=2080;$i++) { ?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
				  <?php } ?>
				</select>
				</td>
			   <td>
				
			   </td>				   
			</tr>					
			<tr>
				<th>Nationality* : </th>
				<td> <input type="text" id="nationality"  class="inp-form" value="Bangladeshi"/></td>
                <td>
				    
				</td>
            </tr>			
			
			
					
        </table>
		</td>
		<td width="50%">	
			<table>
			<!-- section will be here -->
			
					
			<tr>
			  <td>ProfileID</td>
			  <td><input type="text" id="profile_id" readonly="readonly" class="inp-form"/></td>
			</tr>
			<tr>
			  <td>Section Roll</td>
			  <td> <input type="text" id="section_roll" readonly="readonly" class="inp-form"/></td>
			</tr>
			<tr>
			  <td>Class Roll</td>
			  <td><input type="text" id="class_roll" readonly="readonly" class="inp-form" /></td>
			</tr>			
			
			
			
			<tr>
				<th>Section* : </th>
				<td> <input type="text" id="section_name" readonly="readonly" class="inp-form" /></td>
                <td> 
				    
				</td>
            </tr>			
			<input type="hidden"  id="group_name" value=""/>
			
			
			<tr>
				<th>Religion* : </th>
				<td> 
					<select id="religion" class="styledselect-normal">
					   <?php
                        $religion = array("Muslim","Hindu","Buddist","Christian");					    
						for($i=0;$i<count($religion);$i++){ ?>
						<option value="<?php echo $religion[$i];?>"><?php echo $religion[$i];?></option>
						<?php } ?>
					</select>								
				</td>
                <td> 
				    
				</td>
            </tr>
          	    <tr>
                	<th>Qouta:</th>
                    <td>
					<select id="quota" class="styledselect-normal">
						<option value="Civil">Civil</option>
						<option value="Freedom Fighter">Freedom Fighter</option>
						<option value="Defence">Defence</option>						
						<option value="Trival">Trival</option>												
					</select>
					</td>
                    <td></td>
				</tr>				   
				
            </table>
		</td>
		</tr>
		</table>			
	</fieldset>
			
			

	<fieldset>
	<legend>Parents Details</legend>	
	<table width="100%" border=1>
	<tr>
	<td width="50%">
	<h2>Father Information</h2>	
    <table>
    	<tr>
                	<th>Name* : </th>
                    <td><input type="text" id="father_name" name="father_name" class="inp-form" /></td>
                    <td></td>
                </tr>
                <tr>
                	<th>Rank* : </th>
                    <td><input type="text" id="father_rank" name="father_rank" class="inp-form" /></td>
                    <td></td>
                </tr>
                 <tr>
            	<td height="6"></td>
            </tr>
                <tr>
                	<th>Work Address* : </th>
                    <td>
                    <textarea id="father_wrk_address" name="father_wrk_address" row="3" cols="18">		
				</textarea>
                    </td>
                    <td></td>
                </tr>
                <tr>
                	<th>Father Income* : </th>
                    <td><input type="text" id="father_income" name="father_income" class="inp-form" /></td>
                    <td></td>
                </tr>
                <tr>
                	<th>Work phone* : </th>
                    <td><input type="text" id="father_wrk_phone" name="father_wrk_phone" class="inp-form" /></td>
                    <td></td>
                </tr>
                <tr>
                	<th>Mobile* : </th>
                    <td><input type="text" id="father_cell_phone" name="father_cell_phone" class="inp-form" /></td>
                    <td></td>
                </tr>
    </table>
<!--	
	</fieldset>
	-->
	</td>
	<td width="50%">
	<h2>Mother Information</h2>
			<table>
				<tr>
					<th>Name* : </th>
					<td><input type="text" id="mother_name" name="mother_name" class="inp-form" /></td>
					<td></td>
				</tr>
				<tr>
					<th>Rank* : </th>
					<td><input type="text" id="mother_rank" name="mother_rank" class="inp-form" /></td>
					<td></td>
				</tr>
				<tr><td height="6"></td></tr>
				<tr>
					<th>Work Address* : </th>
					<td><textarea name="mother_wrk_address" id="mother_wrk_address" cols="18" rows="3">
					</textarea></td>
					<td></td>
				</tr>
				<tr>
							<th>Mother Income* : </th>
							<td><input type="text" id="mother_income" name="mother_income" class="inp-form" /></td>
							<td></td>
				</tr>
				<tr>
					<th>Work phone* : </th>
					<td><input type="text" id="mother_wrk_phone" name="mother_wrk_phone" class="inp-form" /></td>
					<td></td>
				</tr>
				<tr>
					<th>Mobile* : </th>
					<td><input type="text" id="mother_cell_phone" name="mother_cell_phone" class="inp-form" /></td>
					<td></td>
				</tr>
			</table>
	</td>
	</tr>	
	</table>		
	</fieldset>
	
			<fieldset >
				<legend>Contact Details</legend>
				<table width="100%" border=1>
					<tr>
						<td width="50%">
							<table>
								
								<input type="hidden" id="h_tel" value=""/> 
								<input type="hidden" id="par_address" value=""/>
								
								<input type="hidden" id="emer_name1"  value=""/>
							    <input type="hidden" id="emer_mobile1"  value=""/>
								
								<tr>
									<th>Present Address* : </th>
									<td><textarea id="pre_address" ></textarea></td>
									<td></td>
								</tr>
											
								
							</table>
						</td>
						<td width="50%">
						<table>
								<tr>
									<th>Permanent Address* : </th>
									<td><textarea id="par_address" ></textarea></td>
									<td></td>
								</tr>
								<input type="hidden" id="emer_name2" value=""  />
							    <input type="hidden" id="emer_mobile2" value=""/>
								<input type="hidden" id="emer_email" value="" />
						</table>			
						</td>
					</tr>
				</table>
			</fieldset>		
	
        <fieldset>
		<legend>Student Previous Record</legend>
		<table width="100%" border=1>
		<tr>
		<td width="50%"> 		
        <table>
        	<tr>
                <th>School Name* : </th>
                <td><input type="text" id="pre_school_name" name="pre_school_name" class="inp-form" /></td>
                <td></td>
            </tr>
            <tr>
            	<td height="6"></td>
            </tr>
            <tr>
                <th>School address* : </th>
                <td><textarea id="pre_school_add" name="pre_school_add" cols="18" rows="3">
		             </textarea></td>
                <td></td>
            </tr>        
        </table>			
		</td>
		<td width="50%">        
        <table>
        	<tr>
                <th>Class* : </th>
                <td><input type="text" id="pre_class" name="pre_class" class="inp-form" /></td>
                <td></td>
            </tr>
            <tr>
                <th>Class Roll* : </th>
                <td><input type="text" id="pre_class_roll" name="pre_class_roll" class="inp-form" /></td>
                <td></td>
            </tr>
            <tr>
               	<th>Class Result* : </th>
                <td><input type="text" id="pre_class_result" name="pre_class_result" class="inp-form" /></td>
                <td></td>
            </tr>        
        </table>		
		</td>		
		</tr>
		</table>
		</fieldset>
		<div>								
			<input type="hidden" id="branchid" name="branchid" value="<?php echo $branchid;?>">
		</div>
		<div>
		    <button id="save_button"  class="form-submit">Save</button>				
		    <button id="reset_button"  class="form-reset">Reset</button>							
		</div>	  
	  </div>  
    </div>
    <!-- /content -->
	</body>
	</html>