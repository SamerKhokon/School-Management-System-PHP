<script type="text/javascript">
$(document).ready(function(){			   
		//alert(2);
		
		var dt = function(teacher_name,branch_id){
			$("#leave_info_table").load("includes/leave_info_table.php",
				{'teacher':teacher_name,'branch_id':branch_id},function(){});
		}

		$("#teacher_id").focus();										  
		$("#teacher_id").change(function()
		{
			   var teacher_name = $("#teacher_id").val();
			   var branch_id = $("#branch_id").val();
			   //alert(teacher_name);
			if(teacher_name=="") 
			{
			     alert("Select teacher");
				 $("#teacher_id").focus();
				 return false;
			}else{
					$("#leave_name").focus();
					dt(teacher_name,branch_id);
			}												
		});		
		
		$("#leave_name").keypress(function(event)
		{
			if(event.which == 13 )									   
			{
			   var leave_name = $("#leave_name").val();	
				if(leave_name=="") {
			     alert("Select leave type");
				 $("#leave_name").focus();
				 return false;
				}else{
					$("#no_of_days_leave").focus();
				}
			}									
		});
		
		$("#leave_name").keypress(function(event)
		 {
			if(event.which == 13 )									   
			{
			    var no_of_days_leave = $("#no_of_days_leave").val();
				if(no_of_days_leave=="") {
				    alert("Enter no of days leave");
					$("#no_of_days_leave").focus();
					return false;
				}else{
				   $("#sub_btn").focus();
				}
			}									
		});
		
		
		
		
		$("#sub_btn").click(function(event)
		{									
			var teacher_name     =$("#teacher_id").val();					
			var leave_name       =$("#leave_name").val();			
			var no_of_days_leave = $("#no_of_days_leave").val();
			var leave_from       = $("#leave_from").val();
			var leave_to 		 = $("#leave_to").val();
			var branch_id        =$("#branch_id").val();
			
			var dataStr = "teacher_id="+teacher_name+
			"&leave_type="+leave_name+"&leave_from="+leave_from+
			"&leave_to="+leave_to+"&no_of_days_leave="+no_of_days_leave
			+"&branch_id="+branch_id;
			
			
			if(teacher_name==""){
			  alert("Select teacher");
			  $("#teacher_id").focus();
			  return false;
			}
			else if(leave_name==""){
			  alert("Select Leave Type");
			  $("#leave_name").focus();
			  return false;
			}else if(no_of_days_leave=="") {
			  alert("Enter no of days leave");
			  $("#no_of_days_leave").focus();
			  return false;
			}else{
		
				
				$.ajax({
				   type:"post" ,
				   url:"includes/teacher_leave_add_by_ajax.php" ,
				   data:dataStr ,
				   cache:false ,
				   success:function(st){
				      alert(st);
					  $("#no_of_days_leave").val('');
					  $("#teacher_id").val(0);
					  $("#leave_name").val(0);
					  dt(teacher_name,branch_id);
				   }
				});
				
			}
		});														
});	
</script>

<div id="content" class="box">
<?php require_once("../db.php");
session_start();
$branchid = $_SESSION["LOGIN_BRANCH"];
 ?>


<fieldset class="login">
<legend>Leave Info   </legend>

<input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
<table border="0" cellpadding="0"  cellspacing="0">
			<tr>			
				<th>Teacher:</th>	
				<td>
				<?php 
							
				$teacher_str ="SELECT * FROM std_teacher_info WHERE branch_id=$branchid";
				$teacher_sql = mysql_query($teacher_str);				
				?>
				<select id="teacher_id" name="teacher_id" class="styledselect-normal">
					<option value="">Select Teacher</option>
				    <?php  while($result = mysql_fetch_array($teacher_sql) ) { ?>
							<option value="<?php echo $result[0];?>"><?php echo $result[1];?></option>
					<?php } ?>	
				</select>
				
				</td>
				<td>				
				<div class="error-left"></div>
				<div class="error-inner"><p id="err_rep">This field is required.</p></div>
				</td>	
				
			</tr>
			<tr>
				<th valign="top">Leave Type: &nbsp;&nbsp;</th>
				<td>				
				<select id="leave_name" name="leave_name" class="styledselect-normal">
                <option value="">Select Leave</option>
				<?php 
				$string =  "SELECT * FROM tbl_leaves where branch_id=$branchid";
        		$qry = mysql_query($string); 				
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
				<th>No of Days Leave:</th>	
				<td><input type="text" id="no_of_days_leave" class="inp-form"/></td>
				<td>				
				<div class="error-left"></div>
				<div class="error-inner"><p id="err_rep">This field is required.</p></div>
				</td>
			</tr>
			<tr>			
				<th>From:</th>	
				<td><input type="text" readonly="readonly" value="<?php echo date('d-m-Y');?>" name="notice_date_to" id="leave_from" class="inp-form" onclick="scwShow(this,event);"></td>
				<th>To:</th>	
				<td><input type="text" readonly="readonly" value="<?php echo date('d-m-Y');?>" name="notice_date_to" id="leave_to" class="inp-form" onclick="scwShow(this,event);"></td>
			</tr>		
		
		
		
		
			<tr>
            	<td height="6"></td>
            </tr>
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" name="submit" class="form-submit" id="sub_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>
		
	</table>
	<br/><br/><br/>
	<div id="leave_info_table"></div>
</fieldset>



</div>