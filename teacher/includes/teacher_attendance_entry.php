<script type="text/javascript">
    $(document).ready(function(){			   			  
								  
		//student_attendence_entry.php
		var data_table = function()
		{
		  $("#attendance_data_load_div").load("includes/teacher_attendance_datatable.php", function(){ });
		}
		data_table();
		
		 var open_datys = function(dt )	 {
				$.ajax({
						type:"post" ,
						url:"includes/get_month_total_open_day.php",
						data:"month_id="+dt ,			
						success:function(st){
						   $("#total_open").val(st);		
						   $("#total_attend").val(st);
						}		
				});		
		}
		 open_datys($("#month_id").val());
		 
		 $("#month_id").change(function(){
		   open_datys($("#month_id").val());
		 });
		
		$("#total_attend").keypress(function(ex){
		   if(ex.which==13) {
			var total_open =$("#total_open").val();		  
			var total_attend = $("#total_attend").val();
			var total_absent = total_open - total_attend;
			$("#total_absense").val(total_absent);
			}
		});

		
		
		
		
		$("#attendence_sub_btn").click(function(){
		   var teacher_id = $("#teacher_id").val();		
		   var total_open = $("#total_open").val();
		   var total_attend = $("#total_attend").val();
		   var total_absense = $("#total_absense").val();
		   var month_id      = $("#month_id").val();
		   var branch_id      = $("#branch_id").val();
		   var dataStr = "teacher_id="+teacher_id+"&total_open="+total_open+"&total_attend="+total_attend+
		   "&total_absense="+total_absense+"&month_id="+month_id+
		   "&branch_id="+branch_id;
		   if(total_attend==""){
		     alert("Enter total attend");
			 $("#total_attend").focus();
			 return false;
		   }else if(total_open==""){
		     alert("Enter  total open days");
		     $("#total_open").focus();
			 return false;
		   }else if(teacher_id=="") {
		       alert("Select Teacher");
			   return false;
		   }else{
			//alert(dataStr);
			  $.ajax({
				  type:"post" ,
				  url:"includes/teacher_attendence_entry_by_ajax.php" ,
				  data:dataStr ,
				  success:function(st){
					alert(st);
					data_table();
				  }
			   });
		   }
		});
		
		
		//section_fetch.php		
	});	
</script>
<div id="content" class="box">
<?php require_once("../db.php");
session_start();
$branchid = $_SESSION["LOGIN_BRANCH"];
 ?>

<fieldset class="login">
<legend>Teacher Attendance</legend>

<input type="hidden" id="branch_id" value="<?php echo $branchid;?>"/>

<table border="0" cellpadding="0"  cellspacing="0"  >
			<tr>
				<th >Month:</th>
				<td>				
					<select id="month_id" name="month_id" class="styledselect-normal">
					   <option value="Jan-<?php echo date('Y');?>">Jan-<?php echo date('Y');?></option>
					   <option value="Feb-<?php echo date('Y');?>">Feb-<?php echo date('Y');?></option>
					   <option value="Mar-<?php echo date('Y');?>">Mar-<?php echo date('Y');?></option>
					   <option value="Apr-<?php echo date('Y');?>">Apr-<?php echo date('Y');?></option>
					   <option value="May-<?php echo date('Y');?>">May-<?php echo date('Y');?></option>
					   <option value="Jun-<?php echo date('Y');?>">Jun-<?php echo date('Y');?></option>
					   <option value="Jul-<?php echo date('Y');?>">Jul-<?php echo date('Y');?></option>
					   <option value="Aug-<?php echo date('Y');?>">Aug-<?php echo date('Y');?></option>
					   <option value="Sep-<?php echo date('Y');?>">Sep-<?php echo date('Y');?></option>
					   <option value="Oct-<?php echo date('Y');?>">Oct-<?php echo date('Y');?></option>
					   <option value="Nov-<?php echo date('Y');?>">Nov-<?php echo date('Y');?></option>
					   <option value="Dec-<?php echo date('Y');?>">Dec-<?php echo date('Y');?></option>					   
					</select>
				</td>
	            <td>
				
				</td>	
			</tr>			
			<tr>
				<th >Teacher :</th>
				<td>				
					<select id="teacher_id" name="teacher_id" class="styledselect-normal">
					    <?php
						$str = "SELECT id,teacher_name FROM std_teacher_info
								WHERE branch_id=$branchid";								
						$sql = mysql_query($str);			
						while($res = mysql_fetch_array($sql)) {	?>
						 <option value="<?php echo $res[0];?>"><?php echo $res[1]; ?></option>
						<?php } ?>
					</select>
				</td>
	            <td>
				
				</td>	
			</tr>			
	         <tr>
            	<td height="6"></td>
            </tr>	

	         <tr>
            	<td height="6"></td>
            </tr>			
			
			<tr>
				<th >Total Open Day:</th>
				<td>				
					<input type="text" id="total_open" name="total_open" class="inp-form"></select>
				</td>
	            <td>
				
				</td>	
			</tr>			
	         <tr>
            	<td height="6"></td>
            </tr>			
			<tr>
				<th >Total Attend:</th>
				<td>				
					<input type="text" id="total_attend" name="total_attend" class="inp-form"></select>
				</td>
	            <td>
				
				</td>	
			</tr>			
	         <tr>
            	<td height="6"></td>
            </tr>			
			<tr>
				<th >Total Absense:</th>
				<td>				
					<input type="text" id="total_absense" name="total_absense" class="inp-form"></select>
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
			<input type="button" value="" name="submit" class="form-submit" id="attendence_sub_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
			</tr>		
	</table>
<br/><br/>
	<div id="attendance_data_load_div"></div>

</fieldset>
</div>  <!-- end box div -->