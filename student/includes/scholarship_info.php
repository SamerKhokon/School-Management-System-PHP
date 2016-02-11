<script type="text/javascript">
        $(document).ready(function(){			   
			              $('#example').dataTable( {
							"sPaginationType": "full_numbers"				
				   			    } );
			   
						 $("#class_name").focus();										  
						           	$("#class_name").keydown(function(event)
								     {
									     if(event.keyCode == 13 )									   
								   			{
										 		$("#sub_btn").focus();
											}									
									});
						$("#sub_btn").click(function(event)	{															
							var class_name= $("#class_name").val();
							var branch_id = $("#branch_id").val();
							if(class_name=="")	 {
							  alert("Select Class");
							  return false;
							}else{
								$("#view_course_info_datatable").load("includes/scholarship_datatable_by_ajax.php",
								{'class_name':class_name,"branch_id":branch_id},function(){});
							}	
						});														
	    });	
</script>

<div id="content" class="box">
<?php require_once("../db.php"); session_start(); $branchid = $_SESSION['LOGIN_BRANCH'];?>
<input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
<fieldset class="login">
<legend>Scholarship Information</legend>



<table border="0" cellpadding="0"  cellspacing="0">
			<tr>
				<th valign="top">Class Name: &nbsp;&nbsp;</th>
				<td>
				
				<select id="class_name" name="class_id" class="styledselect-normal">
                <option value="">Select Class</option>
				<?php 
        		$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 				
		        while ($row=mysql_fetch_array($qry))		{
		        echo "<option value=\"$row[0]\">$row[1]</option>";
		         }
		          ?>
				</select>
				</td>
	            <td>
				<div class="error-left"></div>
				<div class="error-inner"><p id="err_rep">This field is required.</p></div>
				</td>	
			</tr>
		
		
			<tr>
            	<td height="6"></td>
            </tr>
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="button" value="" name="submit" class="form-submit" id="sub_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>
		
	</table>

	<br/><br/><br/>
	 <div id="view_course_info_datatable"></div>
	
	</fieldset>

</div>