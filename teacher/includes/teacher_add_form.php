<script type="text/javascript">
 $(document).ready(function(){
		$("#name").focus();
		var branchid = "<?php echo $branchid; ?>";						  
		$("#name").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#code_no").focus();
			}
		});
		$("#code_no").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#age").focus();
			}
		});
		$("#age").keydown(function(event)    {
			if(event.keyCode == 13 )	{
			    $("#sex").focus();
			}
		}); 
		$("#sex").keydown(function(event)    {
			if(event.keyCode == 13 ){									
				$("#nation").focus();									  
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
			 $("#phone").focus();
		  }
		 }) 
		$("#phone").keydown(function(event){
			if(event.keyCode == 13 ){									
				$("#mobile").focus();									  
			} 									  
		});
		$("#mobile").keydown(function(event){
			if(event.keyCode == 13 )	{
				$("#email").focus();
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
	$("#sub_btn").click(function(event){
		var result = window.confirm("Click OK or Cancel.");
		if(result)    {
			var name     = $("#name").val();
			var code_no  = $("#code_no").val();
			var age	     = $("#age").val();
			var sex      = $("#sex").val();													
			var nation   = $("#nation").val();
			var dob      = $("#dob").val();
			
			var parse = dob.split('-');
			var dt = parse[0];
			var mn = parse[1];
			var yr = parse[2];
			var new_dob = yr+'-'+mn+'-'+dt;
			
			var marital  = $("#marital").val();
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
			var branchid = "<?php echo $branchid; ?>";
			
			
			/*var teacherid    = $("#teacherid").val();
			var basic_salary = $("#basic_salary").val();
			var medical      = $("#medical").val();
			var house_rent   = $("#house_rent").val();
			var others       = $("#other_rent").val();
			*/
		
			var datastring='name='+name+'&code_no='+code_no+
			'&age='+age+'&sex='+sex+'&nation='+nation+'&dob='+
			new_dob+'&phone='+phone+'&mobile='+mobile+'&email='+email+
			'&other='+other+'&pre_add='+pre_add+'&par_add='+par_add
			+'&quality='+quality+'&group='+group+'&subject='+
			subject+'&experi='+experi+'&marital='+marital+
			'&status='+status+'&branchid='+branchid;
			//+"&basic_salary="+basic_salary+"&medical="+medical+"&house_rent="+house_rent+"&others="+others;
						
			//alert(datastring);  
			$.ajax({
 			    url:'includes/new_teacher_insert.php',
				type:'post',
				data:datastring,
				success:function(htmData)  {
					alert(htmData);													  
				} ,
				error:function(FData)  {
				    alert(FData);
				}  
			});
		} 
	});
});	
</script>

<div id="content" class="box">

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
            <td><input type="text" name="sex" id="sex" class="inp-form"/></td>
        </tr>
        <tr>
            <th valign="top">Nationality:</th>
            <td><input type="text" name="nation" id="nation" class="inp-form"/></td><td width="17%"></td>
            <th valign="top">Birth Date:</th>
            <td><input type="text" onclick='scwShow(this,event);'  class="inp-form"  
					   id="dob" name="dob" value="<?php echo date('d-m-Y') ?>" 					   readonly="readonly"	class="inp-form"/></td>
        </tr>
        <tr>
            <th valign="top">Marital Status:</th>
            <td><input type="text" name="marital" id="marital" class="inp-form"/></td><td width="17%"></td>
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

    <input type="button" id="sub_btn" name="sub_btn" class="form-submit" />
</div>