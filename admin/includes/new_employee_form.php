<?php  
	 require_once("../db.php");  session_start();
	$branchid = $_SESSION['LOGIN_BRANCH']; 
?>

<script type="text/javascript">
 $(document).ready(function(){
		$('#empname').focus();
		
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
				$("#mobile").focus();
			}
		});	
		$("#mobile").keydown(function(event)    {
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
				$("#address").focus();
			}
		});	
		
		$("#address").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#joining_date").focus();
			}
		});
		$("#joining_date").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#joining_month").focus();
			}
		});
		$("#joining_month").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#joining_year").focus();
			}
		});
		$("#joining_year").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#sub_btn").focus();
			}
		});			
	$("#sub_btn").click(function(event){
		    var join_dt = $("#joining_date").val();
			var join_mn = $("#joining_month").val();
			var join_yr = $("#joining_year").val();
			var join_date = join_yr+'-'+join_mn+'-'+join_dt;
			var branchid     = $("#branchid").val();						  
			//var employeeid   = $('#employeeid').val();
			var empname      = $('#empname').val();
			var category     = $('#category').val();
			var basic_salary = $('#basic_salary').val();
			var medical      = $('#medical').val();
			var house_rent   = $('#house_rent').val();
			var emp_other    = $('#emp_other').val();
			var mobile       = $('#mobile').val();  
			var address      = $('#address').val();
			
			if(empname=="") {
			  alert("Enter epmployee full name");
			  $('#empname').focus();
			  return false;			
			}else if(category=="")  {
			  alert("Select category");
			  return false;
			}else if(basic_salary=="") {
			  alert("Enter basic salary");
			  $("#basic_salary").focus();
			  return false;
			}else if(medical=="") {
			  alert("Enter medical");
			  $("#medical").focus();
			  return false;
			}else if(house_rent=="") {
			  alert("Enter house rent");
			  $("#house_rent").focus();
			  return false;
			}else if(mobile=="") {
			  alert("Enter mobileno");
			  $('#mobile').focus();
			  return false;
			}else if(address==""){
			  alert('Enter address');
			  $('#address').focus();
			  return false;
			}
			else if(join_dt=="") {
			  alert("Select joining date");
			  $("#joining_date").focus();
			  return false;
			}else if(join_mn=="") {
			  alert("Select joining month");
			  $("#joining_month").focus();
			  return false;
			}else if(join_yr=="") 	{
			  alert("Select joining year");
			  $("#joining_year").focus();
			  return false;			
			}else
			{
					var dataStr = 'empname='+empname+'&category='+category+
					'&basic_salary='+basic_salary+'&medical='+medical+'&house_rent='+house_rent+
					'&emp_other='+emp_other+"&branchid="+branchid+'&address='+address+'&mobile='+mobile+'&join_date='+join_date;
						
					$.ajax({
						url:'includes/new_employee_insert.php',
						type:'post',
						data:dataStr,
						success:function(st)  {										
							alert(st);			
							reset_fields();
						} 
					});   
		    }
	});
	var reset_fields = function() {
		//$('#employeeid').val('');
		$('#empname').val('');
		$('#category').val('');
		$('#basic_salary').val('');
		$('#medical').val('');
		$('#house_rent').val('');
		$('#emp_other').val('');	
		$('#mobile').val(' ');
		$('#address').val('');
		$("#joining_date").val('');
		$("#joining_month").val('');
		$("#joining_year").val('');
		$('#empname').focus();
		
	}
});	
</script>

<div id="content" class="box">

		<input type="hidden" id="branchid" value="<?php echo $branchid; ?>"/>
<fieldset>
	<legend>New Employee </legend>
    <table width="81%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th width="24%" valign="top">Name:&nbsp;&nbsp;</th>
			<td width="18%"><input size="30%" type="text" name="empname" id="empname" class="inp-form"/></td>
			<td width="17%"></td>
			<th width="20%" valign="top"> Medical:</th>
		    <td width="21%"><input size="30%" type="text" name="medical" id="medical" class="inp-form"/></td>
		</tr>
		<tr> 
            <th valign="top">Category:</th>
            <td>
							<select id="category" class="styledselect-normal">
				<?php $cat_str = "SELECT * FROM `tbl_emp_categories` WHERE branch_id=$branchid"; 
					  $cat_sql = mysql_query($cat_str);
					  while($rs = mysql_fetch_array($cat_sql)) {
				?>
				  <option value="<?php echo $rs[1];?>"><?php echo $rs[1];?></option>
				<?php } ?>				
			     </select>
			</td>
			<td width="17%"></td>
            <th valign="top"> House Rent:</th>
            <td><input type="text" name="house_rent" id="house_rent" class="inp-form"/></td>
        </tr>
        <tr>	
            <th valign="top"> Basic Salary:</th>
            <td ><input type="text" name="basic_salary" id="basic_salary" class="inp-form"/></td>	
			<td width="17%"></td>
            <th valign="top"> Others:</th>
            <td><input type="text" name="emp_other" id="emp_other" class="inp-form"/></td>	
		</tr>
        <tr>	
            <th valign="top"> Mobile:</th>
            <td ><input type="text" name="mobile" id="mobile" class="inp-form"/></td>	
			<td width="17%"></td>
            <th valign="top"> Address:</th>
            <td><input type="text" id="address" name="address" class="inp-form"/> </td>	
		</tr>
        <tr><td colspan="5"><br /></td></tr>
        <tr>	
            <th valign="top"> Joining Date:</th>
            <td colspan="4"><select id="joining_date" class="styleselect-day">
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
			</select></td>	
		</tr>		
    </table>				
	
</fieldset>    
    <input type="button" id="sub_btn" name="sub_btn" class="form-submit" />
</div>