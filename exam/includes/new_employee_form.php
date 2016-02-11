<script type="text/javascript">
 $(document).ready(function(){
		$("#employeeid").focus();
		
		
		$("#employeeid").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#empname").focus();
			}
		});
		$("#empname").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#category").focus();
			}
		});		
		$("#category").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#basic_salary").focus();
			}
		});	
		$("#basic_salary").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#medical").focus();
			}
		});		
		$("#medical").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#house_rent").focus();
			}
		});				
		$("#house_rent").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#emp_other").focus();
			}
		});				    
		$("#emp_other").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#sub_btn").focus();
			}
		});				    	
	$("#sub_btn").click(function(event){
		var result = window.confirm("Click OK or Cancel.");
		if(result)    {
		   var branchid     = $("#branchid").val();						  
			var employeeid   = $('#employeeid').val();
			var empname      = $('#empname').val();
			var category     = $('#category').val();
			var basic_salary = $('#basic_salary').val();
			var medical      = $('#medical').val();
			var house_rent   = $('#house_rent').val();
			var emp_other    = $('#emp_other').val();
			var dataStr = 'employeeid='+employeeid+'&empname='+empname+'&category='+category+
			'&basic_salary='+basic_salary+'&medical='+medical+'&house_rent='+house_rent+'&emp_other='+emp_other+"&branchid="+branchid;
			//alert(datastring);  
			$.ajax({
 			    url:'includes/new_employee_insert.php',
				type:'post',
				data:dataStr,
				success:function(htmData)  {
					$('#employeeid').val('');
					$('#empname').val('');
					$('#category').val('');
					$('#basic_salary').val('');
					$('#medical').val('');
					$('#house_rent').val('');
					$('#emp_other').val('');				
					alert(htmData);													  
				} 
			});   
		} 
	});
});	
</script>

<div id="content" class="box">

		<input type="hidden" id="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH']; ?>"/>
<fieldset>
	<legend>Employee Salary Details</legend>
    <table width="81%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th width="24%" valign="top">Employee ID :&nbsp;&nbsp;</th>
			<td width="18%"><input size="30%" type="text" name="employeeid" id="employeeid" class="inp-form"/></td>
			<td width="17%"></td>
			<th width="20%" valign="top"> Medical:</th>
		    <td width="21%"><input size="30%" type="text" name="medical" id="medical" class="inp-form"/></td>
		</tr>
		<tr> 
            <th valign="top">Name:</th>
            <td><input type="text" name="empname" id="empname" class="inp-form"/></td>
			<td width="17%"></td>
            <th valign="top"> House Rent:</th>
            <td><input type="text" name="house_rent" id="house_rent" class="inp-form"/></td>
        </tr>
        <tr>	
            <th valign="top"> Category:</th>
            <td ><input type="text" name="category" id="category" class="inp-form"/></td>	
			<td width="17%"></td>
            <th valign="top"> Others:</th>
            <td><input type="text" name="emp_other" id="emp_other" class="inp-form"/></td>	
		</tr>
        <tr>	
            <th valign="top"> Basic Salary:</th>
            <td ><input type="text" name="basic_salary" id="basic_salary" class="inp-form"/></td>	
			<td width="17%"></td>
		</tr>		
    </table>				
	
</fieldset>    
    <input type="button" id="sub_btn" name="sub_btn" class="form-submit" />
</div>