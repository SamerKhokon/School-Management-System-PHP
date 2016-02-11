<script type="text/javascript">
    $(document).ready(function(){			   
	
		$("#admission_student_list_table").load("includes/admission_student_list_table.php",
			{	'class_id':$('#class_id').val(),'branch_id':$('#branch_id').val() },function(){});
			
		$("#adm_sub_btn").click(function(event)
		{									
			var class_id = $("#class_id").val();
			var branch_id  = $('#branch_id').val();
			if(class_id==""){
			  alert("Select class");
			  return false;
			}else{
			   $("#admission_student_list_table").load("includes/admission_student_list_table.php",
				{	'class_id':class_id,'branch_id': branch_id},function(){});
			
			}
		});													
	});	
</script>
<?php require_once("../db.php"); session_start(); ?>
<div id="content" class="box">

<input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
<fieldset class="login">
<legend>Admission List</legend>

<table border="0" cellpadding="0"  cellspacing="0">
			<tr>
				<th valign="top">Class Name: &nbsp;&nbsp;</th>
				<td>
				
				<select id="class_id" name="class_id" class="styledselect-normal">
                     <option value="">Select class</option>
				<?php   $branchid = $_SESSION['LOGIN_BRANCH'];
						echo $s = "select id,class_name from std_class_config where branch_id=$branchid";
						$qry = mysql_query($s); 				
						while ($row=mysql_fetch_array($qry))		{
									echo "<option value=\"$row[0]\">$row[1]</option>";
						 }
		          ?>
				</select>
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
			<input type="button" value="" name="submit" class="form-submit" id="adm_sub_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>
		
	</table>


<br/><br/>



		<div id="admission_student_list_table"></div>


</fieldset>
				
</div>