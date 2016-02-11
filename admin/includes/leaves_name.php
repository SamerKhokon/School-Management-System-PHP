<?php session_start(); ?>
<div id="content" class="box">
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php  $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Leave Setting </legend>
			    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
				             
					<tr><td>		 
						<table width="60%"  border="0" cellpadding="0" cellspacing="0">	 
								<tr>	
									 <th>Leave Name</th> 
									 <td> <input type="text"  class="inp-form" id="leave_name"/> </td>
								</tr>	
								<tr>	
									 <th>No of Days</th> 
									 <td> <input type="text"  class="inp-form" id="no_of_days"/> </td>
								</tr>	
								<tr>	
									 <td> &nbsp; </td>
								</tr>									
								<tr>	
									 <th>&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="leave_save">Submit</button> </td>
								</tr>										
							</table>	 
						</td>		 
						<td>		 
					</td>
                </tr>
             </table>				
				<br/>		
	</fieldset>
	<br/><br/>	
    <div id="leave_name_table"></div>	
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#leave_name").focus();
	
	$("#leave_name_table").load("includes/leave_name_datatable.php" , function(){})
	
	
	var reset_fields = function(){
		$("#leave_name").val('');
		$("#no_of_days").val('');
		$("#leave_name").focus('');			
	}
	
    $("#leave_save").click(function()
    {
		var leave_name =$("#leave_name").val();
		var no_of_days = $("#no_of_days").val();
		var branchid = $("#branchid").val();
		var dataStr = "leave_name="+leave_name+
		"&no_of_days="+no_of_days+"&branch_id="+branchid;
		
		if(leave_name=="") 
		{
		    alert("Enter leave name");
			$("#leave_name").focus();
			return false;
		}
		else if(no_of_days=="") 
		{
		    alert("Enter no of days");
			$("#no_of_days").focus();
			return false;
		}
		else
		{
		    $.ajax({
			  type:"post" ,
			  url:"includes/leave_name_add_by_ajax.php",
			  data:dataStr ,
			  cache:false,
			  sucess:function(st)
			  {
				alert(st);
				$("#leave_name_table").load("includes/leave_name_datatable.php" , function(){})
				reset_fields();
			  }
		    });
		}
    });	
});
</script>