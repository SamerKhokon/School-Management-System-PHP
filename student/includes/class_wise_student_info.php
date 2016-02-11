<script type="text/javascript">
    $(document).ready(function(){			   			  
				$("#class_name").focus();										  
				$("#class_name").keypress(function(event) {
					    if(event.keyCode == 13 ){
						   $("#sec_name").focus();
					    }								
				});
				
				$("#class_name").change(function() {
				 var class_id = $("#class_name").val();
				 var branch_id = $("#branch_id").val();
				 var dataStr = "class_id="+class_id+"&branch_id="+branch_id;
				    if(class_id != "" ){
					    $.ajax({
						   type:"post" ,
						   url:"includes/section_fetch_with_all.php" ,
						   data:dataStr ,
						   success:function(st){
						     //alert(st);
						      $("#sec_name").html(st);
						   }
						});
						
					}else{
						   $("#sec_name").html("");
					}								
				});
				
				
			   	$("#sec_name").keypress(function(event)	     {
					  if(event.keyCode == 13 )	{
						 $("#sub_btn").focus();
					  }
				});									
				$("#sub_btn").click(function(event)    
				{
                    var class_name = $("#class_name").val();
					var sec_name   = $("#sec_name").val(); 	
					
					var	branch_id = $("#branch_id").val();				
					
					var dataStr = 'class_name='+class_name+'&sec_name='+sec_name;
					//alert(dataStr);
 			        $('#data_load_div').load('includes/student_class_detail_by_ajax.php', {
					     'class_name':class_name,
						 'sec_name':  sec_name ,						 
						 'branch_id':branch_id }, function(){});
				});														
	});	
</script>
<div id="content" class="box">
<?php 	 
		include('../db.php');
		session_start();
		$branchid = $_SESSION['LOGIN_BRANCH'];
		//$_SESSION['menuid'] = $_GET['menu_id'];	
		//$_SESSION['SM_id']  = $_GET['SM_id'];
 ?>
<fieldset class="login">
<legend>Student Class Details</legend>
<input type="hidden" id="branch_id" value="<?php echo $branchid;?>"/>
<table border="0" cellpadding="0"  cellspacing="0"  >
			<tr>
				<th >Class Name:</th>
				<td>				
				<select id="class_name" name="class_id" class="styledselect-normal">
			<option value="">Select class</option>
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
			<th valign="top">Section Name: &nbsp;&nbsp; </th>
			<td>
			<select id="sec_name" name="section_name"  class="styledselect-normal">
				  				  
		     </select>
			</td>
	        <td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_rep2">This field is required.</p></div>
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
</fieldset>
<?php   ?>
<div id="data_load_div"></div>
</div>  <!-- end box div -->