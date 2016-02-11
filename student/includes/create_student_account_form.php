<div id="content" class="box">
	<?php  require_once("../db.php"); session_start();  $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>

    <fieldset>
		    <legend>Create Student Login Account</legend>
					
			    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
				 <tr>
				    <td>					
						<table width="60%"  border="0" cellpadding="0" cellspacing="0">	 
						        <tr>	
									 <th>Student ID</th> 
									 <td> <input type="text" class="inp-form"  id="stu_id" /> </td>
								</tr>									
								<tr>	
									 <td> &nbsp; </td>
								</tr>																	
								<tr >										
									 <th>Password</th> 
									 <td> <input type="text" class="inp-form"  id="password" /> </td>									
								</tr>									
								<tr>	
									 <td> &nbsp; </td>
								</tr>																	
								<tr >										
									 <th>Retype-Password</th> 
									 <td> <input type="text" class="inp-form"  id="retype_password" /> </td>									
								</tr>																							
								<tr>	
									 <td> &nbsp; </td>
								</tr>									
								<tr>	
									 <th>&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="acct_create">Submit</button> </td>
									 <td>&nbsp;</td><td>&nbsp;</td>
								</tr>										
							</table>	 
					</td>
					<td> 
                             <table> 
								<tr>	
									 <th>Name</th> 
									 <td> <input type="text" readonly="readonly" class="inp-form"  id="name" value="" /> </td>
								</tr>									
								<tr>	
									 <td> &nbsp; </td>
								</tr>																	
								<tr >										
									 <th>Class</th> 
									 <td> <input type="text"  readonly="readonly" class="inp-form"  id="adm_class"  value=""/> </td>									
								</tr>									
								<tr>	
									 <td> &nbsp; </td>
								</tr>																	
								<tr >										
									 <th>Section Roll</th> 
									 <td> <input type="text"  readonly="readonly" class="inp-form"  id="section_roll"  value=""/> </td>									
								</tr>									
								<tr>	
									 <td> &nbsp; </td>
								</tr>																									
								<tr >										
									 <th>Section</th> 
									 <td> <input type="text" class="inp-form"  readonly="readonly"  id="section" value="" /> </td>									
								</tr>	
								<tr>	
									 <td> &nbsp; </td>
								</tr>																									
								<tr >										
									 <th>Class Roll</th> 
									 <td> <input type="text" class="inp-form"  readonly="readonly"  id="class_roll" value="" /> </td>									
								</tr>									
						    </table>
						<td>		 
					</td>
                </tr>
             </table>		
             </td>
			 </td>
			 </tr>
			</table>		
			<br/>						
			<br/>		
			<br/>		
				
			<div id="student_acct_table"></div>
	
	</fieldset>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){    
	//student_acct_table
	$("#stu_id").focus();
	$("#stu_id").keypress(function(ex){
	   var stu_id = $("#stu_id").val();
	   if(ex.which == 13) {
	      if(stu_id == "") {
		    alert("Enter student ID");
		    $("#stu_id").focus();
			return false;
		  }else{
		    //		echo $stu_name."|".$class."|".$class_sec."|".$sec_roll."|".$class_roll."|".$c;
			$.ajax({
			   type:"post" ,
			   url:"includes/stu_info_by_id.php" ,
			   data:"stu_id="+stu_id ,
			   success:function(st){			     
				var parse = st.split('|');
				$("#name").val(parse[0]);
				$("#adm_class").val(parse[1]);
				$("#section").val(parse[2]);
				$("#section_roll").val(parse[3]);				  
				$("#class_roll").val(parse[4]);
				if(flag==1) {
				    alert("User account already exist");
				}					  
			   }
			});
		    $("#username").focus();
		  }
	   }
	});
	
	$("#password").keypress(function(ex){
	   var password = $("#password").val();
	   if(ex.which == 13) {
	      if(password == "") {
		    alert("Enter password");
		    $("#password").focus();
			return false;
		  }else{
		    $("#retype_password").focus();
		  }
	   }
	});	
	
	$("#retype_password").keypress(function(ex){
	   var retype_password = $("#retype_password").val();
	   if(ex.which == 13) {
	      if(retype_password == "") {
		    alert("Enter Retype Password");
		    $("#retype_password").focus();
			return false;
		  }else{
		    $("#acct_create").focus();
		  }
	   }
	});		
	
	
	
    $("#acct_create").click(function(){
        var stu_id     = $("#stu_id").val();
		var password   = $("#password").val();
		var retype_password   = $("#retype_password").val();		
		var dataStr = "stu_id="+stu_id+"&password="+password+"&retype_password="+retype_password;
		if(stu_id==""){
		  alert("Enter Student ID");
		  $("#stu_id").focus();
		return false;
		}else if(password==""){
		  alert("Enter password");
		  $("#password").focus();
		  return false;
		}else if(retype_password==""){
		  alert("Enter Retype Password");
		  $("#retype_password").focus();
		  return false;
		}
		else if(retype_password==password) 	{
		  alert("Password does`nt match");
		  $("#password").focus();
		  return false;
		}
		else{
				$.ajax({
				  type:"post" ,
				  url:"includes/create_student_acct_by_ajax.php" ,
				  data:dataStr ,
				  success:function(st){
				      alert(st);
				  }
				});
		}
	});
});
</script>