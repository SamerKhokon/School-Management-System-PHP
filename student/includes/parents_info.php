<script type="text/javascript">
    $(document).ready(function(){			   			  
				$("#class_id").focus();
				$('#parents_info_data_load_div').load('includes/student_parent_detail_by_ajax.php', 
				{
					 'class_name':'',
					 'branchid': $('#branchid').val()
				}, function(){});				
				
				$("#class_id").change(function(event) {
						$('#parents_info_data_load_div').load('includes/student_parent_detail_by_ajax.php', 
						{
							 'class_name': $('#class_id').val(),
							 'branchid': $('#branchid').val()
						}, function(){});								
				});
			   	$("#stu_id").keypress(function(event)	     {
					  if(event.keyCode == 13 )	{
						 $("#sub_btns").focus();
					  }
				});									
				$("#sub_btns").click(function(event)    {
                    var class_name = $("#class_id").val();
					//var stuid     = $("#stu_id").val(); 	
					var branchid = $("#branchid").val();
					var dataStr = 'class_name='+class_name+'&branchid='+branchid;
					//alert(dataStr);
					if(class_name !="") {
							$('#parents_info_data_load_div').load('includes/student_parent_detail_by_ajax.php', 
							{
								 'class_name':$('#class_id').val(),
								 'branchid': $('#branchid').val()
							}, function(){});
					}
				});														
	});	
</script>
<div id="content" class="box">
<?php 	
		require_once('../db.php');
		session_start();
		$branchid = $_SESSION['LOGIN_BRANCH']; 
		//$_SESSION['menuid'] = $_GET['menu_id'];	
		//$_SESSION['SM_id']  = $_GET['SM_id'];
 ?>
<fieldset class="login">
<legend>Parents Information</legend>
<form name="frm1" id="frm1" method="post" action="">
<input type="hidden" id="branchid" value="<?php echo $branchid;?>"/>
<table border="0" cellpadding="0"  cellspacing="0"  >
			<tr>
				<th >Class Name:</th>
				<td>				
				<select id="class_id" name="class_id" class="styledselect-normal">
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
			<input type="button" value="" name="submit" class="form-submit" id="sub_btns" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
			</tr>		
	</table>
</form>
<br/><br/>
<div id="parents_info_data_load_div"></div>

</fieldset>
<?php   ?>

</div>  <!-- end box div -->