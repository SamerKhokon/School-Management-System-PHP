<script type="text/javascript">
    $(document).ready(function(){			   			  
		var data_table = function(){
		   $("#admission_data_load_div").load("includes/student_admission_list_by_ajax.php",function(){});
		}
		data_table();
		
		$("#admission_list_sub_btn").click(function() {
		      var class_id        = $("#class_id").val();
		      var branch_id      = $("#branch_id").val();
			  data_table();	   		   
		});
	});	
</script>
<div id="content" class="box">
<?php 	$branchid = $_SESSION['LOGIN_BRANCH']; 
		require_once('../db.php');
		$_SESSION['menuid'] = $_GET['menu_id'];	
		$_SESSION['SM_id']  = $_GET['SM_id'];
 ?>
<fieldset class="login">
<legend>Student Attendance</legend>

<input type="hidden" id="branch_id" value="<?php echo $branchid;?>"/>

<table border="0" cellpadding="0"  cellspacing="0"  >
			<tr>
				<th>Class Name:</th>
				<td>				
				<select id="class_id" name="class_id" class="styledselect-normal">
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
				</td>	
			</tr>
			
				<tr>
						<th>&nbsp;</th>
						<td valign="top">
							<input type="button" value="" name="submit" class="form-submit" id="admission_list_sub_btn" />
							<input type="button" value="" name="reset" class="form-reset"  />
						</td>
						<td></td>
				</tr>		
	</table>
<br/><br/>
	<div id="admission_data_load_div"></div>

</fieldset>
</div>  <!-- end box div -->