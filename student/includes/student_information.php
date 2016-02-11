<script type="text/javascript">
    $(document).ready(function(){			   			  
				$("#class_name").focus();										  
				$("#class_name").keypress(function(event) {
					    if(event.keyCode == 13 ){
						   $("#sec_name").focus();
					    }								
				});
			   	$("#sec_name").keypress(function(event)	     {
					  if(event.keyCode == 13 )	{
						 $("#sub_btn").focus();
					  }
				});									
				$("#sub_btn").click(function(event)    {
                    var class_name = $("#class_name").val();
					var	year_id    = $("#year_id").val();	
					var branch_id  = $("#branch_id").val();					
					var dataStr = 'class_name='+class_name+'&year_id='+year_id+'&branch_id='+branch_id;
					//alert(dataStr);
 			        $('#data_load_div').load('includes/student_class_detail.php', {
					     'class_name':$('#class_name').val(),
						 'year_id':   $("#year_id").val(),
						 'branch_id':branch_id		}, function(){});
				});														
	});	
</script>
<div id="content" class="box">
<?php 	
		include('../db.php');
		session_start();
		$branchid = $_SESSION['LOGIN_BRANCH']; 		
 ?>
<fieldset class="login">
<legend>Student Class Details</legend>
<input type="hidden" id="branch_id" value="<?php echo $branchid;?>"/>

<table border="0" cellpadding="0"  cellspacing="0"  >
			<tr>
				<th>Class Name:</th>
				<td>				
				<select id="class_name" name="class_id" class="styledselect-normal">
				<option value="all">All Classes</option>
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
				<th >Year:</th>
				<td>				
				<select id="year_id" name="year_id" class="styledselect-normal">
				   <option value="all">All Years</option> 
				   <?php for($i=1999;$i<= 2050;$i++){
  				   ?>
				   <option value="<?php echo $i;?>"><?php echo $i;?></option>
				   <?php } ?>
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
<br/><br/>
	<div id="data_load_div"></div>

</fieldset>
</div>  <!-- end box div -->