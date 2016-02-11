<?php session_start();?>
<script type="text/javascript">
 $(document).ready(function(){
		$("#name").focus();
		var branchid = $("#branch_id").val();						  
		$("#name").keydown(function(event)    {
			if(event.keyCode == 13 ){
			   var name = $("#name").val();
			   if(name=="") {
			     alert("Enter full name");
			     $("#name").focus();
				 return false;
			   }else{
				$("#code_no").focus();
			   }	
			}
		});
		$("#code_no").keydown(function(event)    {
			if(event.keyCode == 13 ){
			   var code_no  = $("#code_no").val();
			   if(code_no=="") {
			      alert("Enter codeno");
				  $("#code_no").focus();
			      return false;
			   }else{
				$("#age").focus();
			   }	
			}
		});
		$("#age").keydown(function(event)    {
			if(event.keyCode == 13 )	{
			  var age = $("#age").val();
			  if(age=="") {
			    alert("Enter age");
				$("#age").focus();
			    return false;
			  }else{
			    $("#sex").focus();
			  }	
			}
		}); 
		$("#sex").keydown(function(event)    {
			if(event.keyCode == 13 ){									
			   var sex = $("#sex").val();
			   if(sex=="") {
			     alert("Select Sex");				 
			     return false;				 
			   }else{
					$("#nation").focus();									  
			   }	
			} 									  
		});
		$("#nation").keydown(function(event)    {
			if(event.keyCode == 13 ){
			   $("#dob").focus();
			}
		});
		$("#dob").keydown(function(event) {
		  if(event.keyCode == 13 )	{
			$("#marital").focus();
		  }
		});
		$("#marital").keydown(function(event){
		  if(event.keyCode == 13 ){
		    var marital= $("#marital").val();
			if(marital=="") {
			  alert("select marital status");
			  return false;
			}else{
			 $("#phone").focus();
			} 
		  }
		 }) 
		$("#phone").keydown(function(event){
			if(event.keyCode == 13 ){									
			  var phone = $("#phone").val();
			  if(phone=="") {
			    alert("Enter mobileno");
			    return false;
			  }else{
				$("#mobile").focus();									  
			  }	
			} 									  
		});
		$("#mobile").keydown(function(event){
			if(event.keyCode == 13 )	{
			   var mobile = $("#mobile").val();
               if(mobile=="") 
			   {			   
			     alert("Enter mobileno");
			     return false;
			   }else{
				$("#email").focus();
			   }			   				
			}
		});
		$("#email").keydown(function(event) {
		  if(event.keyCode == 13 ){
			$("#other").focus();
		  }
		});
		$("#other").keydown(function(event){
			if(event.keyCode == 13 ){
				$("#pre_add").focus();
			}
		 }); 
		$("#pre_add").keydown(function(event){
			if(event.keyCode == 13 ){									
				$("#par_add").focus();									  
			} 									  
		});		
		$("#par_add").keydown(function(event){
			if(event.keyCode == 13 ){
				$("#quality").focus();
			}
		});
		$("#quality").keydown(function(event)   {
		  if(event.keyCode == 13 ){
			$("#group").focus();
		  }
		});
		$("#group").keydown(function(event){
			if(event.keyCode == 13 ){
				$("#subject").focus();
			}
		 }); 
		$("#subject").keydown(function(event){
			if(event.keyCode == 13 ){									
				$("#experi").focus();
			} 									  
		});
		$("#experi").keydown(function(event)  {
		  if(event.keyCode == 13 ){
		     $("#status").focus();
		  }
	    }); 
	$("#status").keydown(function(event){
		if(event.keyCode == 13 ){									
			$("#basic_salary").focus();									  
		} 
	});
	$("#basic_salary").keydown(function(event){
	   if(event.keyCode==13) {
	     $("#medical").focus();
	   }
	});
	$("#medical").keydown(function(event){
	   if(event.keyCode==13) {
	     $("#house_rent").focus();
	   }
	});
	$("#house_rent").keydown(function(event){
	   if(event.keyCode==13) {
	     $("#other_rent").focus();
	   }
	});	
	$("#other_rent").keydown(function(event){
	   if(event.keyCode==13) {
	     $("#sub_btn").focus();
	   }
	});		
	//others
	$("#teacher_add_btn").click(function(event){
		  //alert('js');
			var name     = $("#name").val();
			var code_no  = $("#code_no").val();
			var age	     = $("#age").val();
			var sex      = $("#sex").val();	
		    var nation   = $("#nation").val();			
			var dt = $("#dob_date").val();
			var mn = $("#dob_month").val();
			var yr = $("#dob_year").val();
			var new_dob = yr+'-'+mn+'-'+dt;	

			var marital  = $("#marital").val();			
			
			var join_dt = $("#joining_date").val();
			var join_mn = $("#joining_month").val();
			var join_yr = $("#joining_year").val();
			var join_date = join_yr+'-'+join_mn+'-'+join_dt;
			var phone    = $("#phone").val();
			var mobile   = $("#mobile").val();													
			var email    = $("#email").val();
			var other    = $("#other").val();			
			var pre_add  = $("#pre_add").val();
			var par_add  = $("#par_add").val();			
			var quality  = $("#quality").val();
			var group    = $("#group").val();
			var subject  = $("#subject").val();			
			var experi   = $("#experi").val();
			var status   = $("#status").val();
			var branchid = $("#branch_id").val();			
			var short_name = $("#short_name").val();
			
			var dataStr = 'name='+name+'&code_no='+code_no+'&age='+age+'&sex='+sex+'&nation='+nation+'&dob='+new_dob+
			'&marital='+marital+'&joining_date='+join_date+'&phone='+phone+'&mobile='+mobile+'&email='+email+
			'&other='+other+'&pre_add='+pre_add+'&par_add='+par_add+'&quality='+quality+'&group='+group+
			'&subject='+subject+'&experi='+experi+'&status='+status+'&branchid='+branchid+'&short_name='+short_name;
			
			if(name=="") {
			  alert("Enter full name");
			  $("#name").focus();
			  return false;
			}else if(code_no == "") { 
			  alert("Enter code no");
			  $("#code_no").focus();
			  return false;
			}else if(age == "") { 
			  alert("Enter age");
			  $("#age").focus();
			  return false;
			}else if(sex == "") { 
			  alert("Enter sex");
			  $("#sex").focus();
			  return false;
			}else if(dt=="")  {
			  alert("select DOB date");
			  return false;
			}else if(mn=="") {
			  alert("select DOB month");
			  return false;
			}else if(yr=="") {
			  alert("select DOB year");
			  return false;			
			}else if(marital=="") {
			  alert("Select marital status");
			  return false;
			}else if(join_dt=="") {
			  alert("Select joining date");
			  return false;
			}else if(join_mn=="") {
			  alert("Select joining month");
			  return false;
			}else if(join_yr=="") 	{
			  alert("Select joining year");
			  return false;			
			}else if(mobile =="") {
			  alert("Enter mobileno");
			  $("#mobile").focus();
			  return false;
			}else if(short_name==""){
			   alert("Enter teacher shortname");
			  $("#short_name").focus();
			  return false;
			}else{
				$.ajax({
					url:'includes/new_teacher_insert.php',
					type:'post',
					data:dataStr,
					success:function(st)  
					{
						alert(st);
						reset_fields();	
						$("#name").focus();						
					}
				});			  			  
			}
	});		
	
    var reset_fields = function() {
			$("#name").val(' ');
			$("#code_no").val(' ');
			$("#age").val(' ');
			$("#sex").val(' ');	
		    $("#nation").val(' ');			
			$("#dob_date").val(' ');
			$("#dob_month").val(' ');
			$("#dob_year").val(' ');
			$("#marital").val(' ');			
			$("#joining_date").val(' ');
			$("#joining_month").val(' ');
			$("#joining_year").val(' ');
			$("#phone").val(' ');
			$("#mobile").val(' ');													
			$("#email").val(' ');
			$("#other").val(' ');			
			$("#pre_add").val(' ');
			$("#par_add").val(' ');			
			$("#quality").val(' ');
			$("#group").val(' ');
			$("#subject").val(' ');			
			$("#experi").val(' ');
			$("#status").val(' ');
			$("#short_name").val(' ');
	}
});	
</script>

<div id="content" class="box">
<?php  
	 require_once("../db.php"); 
  
	$branchid = $_SESSION['LOGIN_BRANCH']; ?>
	
   <input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
    <fieldset>
        <legend>Personal Details</legend>
        <table width="81%" border="0" cellpadding="0" cellspacing="0" >
		<tr>
            <th width="24%" valign="top">Name:</th>
			<td width="18%"><input size="30%" type="text" name="name" id="name" class="inp-form"/></td><td></td>
            <th width="20%" valign="top">Code Number:</th>
			<td width="21%"><input size="30%" type="text" name="code_no" id="code_no" class="inp-form"/></td>
        </tr>
        <tr>
            <th valign="top">Age:</th>
            <td><input type="text" name="age" id="age" class="inp-form"/></td><td width="17%"></td>
            <th valign="top">Sex:</th>
            <td><select id="sex" class="styledselect-normal">
			   <option value="">select any one</option>
			   <option value="Male">Male</option>
			   <option value="Female">Female</option>
			</select>
			</td>
        </tr>
		
		<tr>
            <th valign="top">Short Name:</th>
            <td><input type="text" name="short_name" id="short_name" class="inp-form"/></td><td width="17%"></td>
            <th valign="top">Nationality:</th>
			<td><input type="text" name="nation" id="nation" class="inp-form"/></td>
        </tr>		
		
        <tr>
            <th valign="top">Birth Date:</th>
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
        </tr>
		<tr><td>&nbsp;</td></tr>
        <tr>
            <th valign="top">Marital Status:</th>
            <td><select id="marital" class="styledselect-normal">
			      <option value=""> Select any one</option>
			      <option value="Married">Married</option>
				  <option value="Single">Single</option>
			     </select>
			</td>
			<td width="17%"></td>
			<th valign="top">Joining Date:</th>
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
        </tr>
		
		
		
    </table>
  </fieldset>
<fieldset>
    <legend>Contact Details</legend>
	<table width="81%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<th width="24%" valign="top">Home Phone: &nbsp;&nbsp;</th>
				<td width="18%"><input size="30%" type="text" name="phone" id="phone" class="inp-form"/></td><td></td>
				<th width="18%" valign="top">Mobile No:</th>
				<td width="20%"><input size="30%" type="text" name="mobile" id="mobile" class="inp-form"/></td>
			</tr>
            <tr>
                <th valign="top">Email Address:</th>
                <td><input size="30%" type="text" name="email" id="email" class="inp-form"/></td><td width="20%"></td>
                <th valign="top">Others:</th>
                <td><input type="text" name="other" id="other" class="inp-form"/></td>
            </tr>
            <tr><td height="6"></td></tr>
            <tr>
               <th width="24%" valign="top">Present Address:</th>
               <td><textarea name="pre_add" id="pre_add" cols="18" rows="3"></textarea></td><td></td>
               <th width="18%" valign="top">Parmenent Address:</th>
               <td><textarea name="par_add" id="par_add" cols="18" rows="3"></textarea></td>
            </tr>
        </table>
  </fieldset>
  <fieldset>
        <legend>Other Details</legend>
    <table width="81%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th width="24%" valign="top">Latest Qualification :&nbsp;&nbsp;</th>
			<td width="18%"><input size="30%" type="text" name="quality" id="quality" class="inp-form"/></td>
			<td width="17%"></td>
			<th width="20%" valign="top">Group:</th>
		    <td width="21%"><input size="30%" type="text" name="group" id="group" class="inp-form"/></td>
		</tr>
		<tr>
            <th valign="top">Subject:</th>
            <td><input type="text" name="subject" id="subject" class="inp-form"/></td>
			<td width="17%"></td>
            <th valign="top"> Experience:</th>
            <td><input type="text" name="experi" id="experi" class="inp-form"/></td>
        </tr>
        <tr>
            <th valign="top">Present Status:</th>				
            <td colspan="2"><input type="text" name="status" id="status" class="inp-form"/></td>
			<td width="17%"></td>
		</tr>
    </table>			
</fieldset>	

<!-- 		
<fieldset>
	<legend>Salary Details</legend>
    <table width="81%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th width="24%" valign="top">Basic Salary :&nbsp;&nbsp;</th>
			<td width="18%"><input size="30%" type="text" name="basic_salary" id="basic_salary" class="inp-form"/></td>
			<td width="17%"></td>
			<th width="20%" valign="top">House Rent:</th>
		    <td width="21%"><input size="30%" type="text" name="house_rent" id="house_rent" class="inp-form"/></td>
		</tr>
		<tr>
            <th valign="top">Medical:</th>
            <td><input type="text" name="medical" id="medical" class="inp-form"/></td>
			<td width="17%"></td>
            <th valign="top">Others:</th>
            <td><input type="text" name="other_rent" id="other_rent" class="inp-form"/></td>
        </tr>
    </table>			
	
</fieldset>   --> 

    <input type="button" id="teacher_add_btn" name="sub_btn" class="form-submit" />
</div>