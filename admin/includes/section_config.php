<?php session_start();
	require_once("../db.php"); 
	$branchid = $_SESSION["LOGIN_BRANCH"];
?>
<script type="text/javascript">
$(document).ready(function(){						
    $("#class_name").focus();	
	var branchid=$("#branchid").val();
	$("#jq_tbl").load('includes/table/section_config_tbl.php?branchid='+branchid);
						  
	$("#class_name").change(function(event) {
		var class_id = $('#class_name').val();
		var branchid = $('#branchid').val();
		if(class_id != '' )	{
		  $("#section_name").focus();
		  $.ajax({
			 type:'post' ,
			 url:'includes/subject_load_by_ajax.php' ,
			 data:'class_id='+$('#class_name').val()+'&branchid='+branchid,
			 success:function(st){
				$('#sub_id option').remove();
				$('#sub_id').html(st);
				//alert(st);
			 }
		  });
		}									
	});						
				
	$("#section_name").keydown(function(event)
	{
		if(event.keyCode == 13 ){	
			$("#teacher_id").focus();
		}									
	});
				
	$("#teacher_id").keydown(function(event){
		if(event.keyCode == 13 )				   
		{				
			$("#sub_id").focus();
		}
	}); 
	$("#sub_id").keydown(function(event){
		if(event.keyCode == 13 )
		{
			$("#total_stu").focus();
		} 				  
	});
	$("#total_stu").keydown(function(event){
		if(event.keyCode == 13 )
		{				
			$("#sec_btn").focus();				  
		} 				  
	});
	
	$("#sec_btn").click(function(event){
		
		var class_name=$("#class_name").val();
		var section_name=$("#section_name").val();
		var teacher_id= $("#teacher_id").val();
		var sub_id= $("#sub_id").val();
		var total_stu= $("#total_stu").val();			
		var section_system = $("#section_system").val();						
		var branchid       =  $("#branchid").val();
		if(class_name=="")
		{
			alert("Select class Name");
			return false;
		}
		else if(total_stu==""){
			alert('Enter total student');
			$('#total_stu').focus();
			return false;
		}
		else{
			var dataA = 'class_name='+class_name+'&section_name='+section_name+'&teacher_id='+teacher_id+'&sub_id='+sub_id+'&branchid='+branchid+'&total_stu='+total_stu+'&section_system='+section_system;
			//alert(dataA);
			$.ajax({
				url:'includes/table/section_config_tbl_insert.php',
				type:'post',
				data:dataA,
				success:function(htmData){
					alert(htmData);										  
				  	//$('#class_name').val('');
					$('#section_name').val('');
				  	$('#teacher_id').val('');
				  	$('#sub_id').val('');
				  	$('#total_stu').val('');
					$("#jq_tbl").load('includes/table/section_config_tbl.php?branchid='+branchid);
				  	$("#class_name").focus();				   
				}
			});		
		}
	  
	});
		   
});	
</script>
<input type="hidden" name="branchid" id="branchid" value="<?php echo $branchid;?>" />
<div id="content" class="box">
<fieldset class="login">
<legend>Add New Section Details</legend>
	<table border="0" cellpadding="0" cellspacing="0" >
		<tr>
			<th valign="top">Class Name:</th>
			<td>
				<select id="class_name" name="class_id" class="styledselect-normal">
				<option value=''>select any class</option>
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
			<div class="error-inner" id="cls_in">This field is required.</div>
			</td>	
		</tr>
		<tr>
            <td height="6"></td>
        </tr>
		<tr>
            <th valign="top">Section Name:</th>
            <td><select id="section_name" name="section_name" class="styledselect-day">
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
				<option value="E">E</option>
				<option value="F">F</option>
			</select></td>
			<td></td>
		</tr> 
		<tr>
            <td height="6"></td>
        </tr>
		<tr>
			<th valign="top">Teacher Name:</th>
			<td><select id="teacher_id" name="teacher_id" class="styledselect-normal">
			<?php 
				$qry = mysql_query("select id,teacher_name from std_teacher_info where branch_id=$branchid"); 				
				while($row=mysql_fetch_array($qry))
				{
					echo "<option value=\"$row[0]\">$row[1]</option>";
				}
			?>
			</select></td>
			<td></td>
		</tr> 
        <tr>
            <td height="6"></td>
        </tr>
		<tr>
			<th valign="top">Subject Name:</th>
			<td><select id="sub_id" name="sub_id" class="styledselect-normal"></select></td>
			<td></td>
		</tr> 
		<tr>
            <td height="6"></td>
        </tr>
		<tr>
			<th valign="top">Total Student: &nbsp;&nbsp;</th>
			<td><input type="text" class="inp-form" id="total_stu" name="total_student" /></td>
			<td>
                <div class="error-left"></div>
                <div class="error-inner">This field is required.</div>
			</td>	
		</tr>
        <tr>
	        <td height="6"></td>
        </tr>
		<tr>
			<th valign="top">Section System: &nbsp;&nbsp;</th>
			<td><select class="styledselect-normal" id="section_system" name="section_system" >
				<option value="E">E</option>
				<option value="Z">Z</option>
			</select></td>
			<td>
                <div class="error-left"></div>
                <div class="error-inner">This field is required.</div>
			</td>	
		</tr>
        <tr>
	        <td height="6"></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td valign="top">
                <input type="button" value="" name="submit" class="form-submit" id="sec_btn" />
                <input type="button" value="" name="reset" class="form-reset"  />
            </td>
            <td></td>
        </tr>
	</table>
</fieldset>
<table width=100% id="jq_tbl">
</table>
</div>