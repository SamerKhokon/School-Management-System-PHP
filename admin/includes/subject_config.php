<?php session_start();
$branchid = $_SESSION['LOGIN_BRANCH'];
require'db.php'; 
?>
<script type="text/javascript">
$(document).ready(function(){			   
	$("#sub_code").focus();
	var branchid="<?php echo $branchid; ?>";						  
	$("#jq_tbl").load('includes/table/sub_config_tbl.php?branchid='+branchid);						

	$("#sub_code").keydown(function(event)     {
		if(event.keyCode == 13 )	{
			if( $("#sub_code").val()=="")   {
				$("#err_rep").fadeOut(300);
				$("#err_rep").fadeIn(1000);
				$("#sub_code").focus();
			}else{
				$("#subname").focus();
			}	
		}
	});	
	
	$("#subname").keydown(function(event)     {
		if(event.keyCode == 13 )	{
			if( $("#subname").val()=="")   {
				$("#err_rep").fadeOut(300);
				$("#err_rep").fadeIn(1000);
				$("#subname").focus();
			}else{
				$("#sub_mark").focus();
			}	
		}
	});

	$("#sub_mark").keydown(function(event){
		if(event.keyCode == 13 ){
			$("#ct_mark").focus();
		}
	});

	$("#ct_mark").keydown(function(event){
		if(event.keyCode == 13 )
		{
			$("#st_mark").focus();
		}
	}) 
	$("#st_mark").keydown(function(event){
		if(event.keyCode == 13 )
		{
			$("#sub_btn").focus();
		} 
	});

	
	$("#sub_btn").click(function(event){
	        var class_id  = $("#class_names").val();
			var sub_code  = $("#sub_code").val();	
			var subname   = $("#subname").val();			
			var sub_mark  = $("#sub_mark").val();
			var ct_mark   = $("#ct_mark").val();
			var ob_mark   = $("#ob_mark").val();	
			var practical_mark =  $("#practical_mark").val();						  
			var branchid  = "<?php echo $branchid; ?>";
		
		    if(class_id ==""){
			alert("Select class");
			  $("#class_names").focus();
			  return false;
			}
			else if(subname==''){
			  alert('Enter Subject name');
			  $('#subname').focus();
			  return false;
			}else if(sub_code==''){
			   alert('Enter Subject Code');
			   $('#sub_code').focus();
			  return false;
			}
			else if(subname!='' && sub_code!=''){			  
				$.ajax({
				  url:'includes/table/sub_config_tbl_insert.php',
				  type:'post',
				  data:'class_id='+class_id+'&subname='+subname+'&sub_mark='+sub_mark+'&ct_mark='+ct_mark+'&ob_mark='+ob_mark+'&practical_mark='+practical_mark+'&sub_code='+sub_code+'&branchid='+branchid,
				  success:function(htmData)
				   {
						  alert(htmData);
						  $('#sub_code').val('');											  
						  $('#subname').val('');
						  $('#sub_mark').val('');
						  $('#ct_mark').val('');
						  $('#ob_mark').val('');
						  $('#practical_mark').val('');						  
						 $("#subname").focus();
						$("#jq_tbl").load('includes/table/sub_config_tbl.php?branchid='+branchid);			
						
					}	
				});
			}	
		
	});
	$("#reset_btn").click(function(){
		$("#class_names").val();
		$('#sub_code').val('');											  
		$('#subname').val('');
		$('#sub_mark').val('');
		$('#ct_mark').val('');
		$('#st_mark').val('');											  
		$("#subname").focus();
		$("#jq_tbl").load('includes/table/sub_config_tbl.php?branchid='+branchid);
	});
	
});	
</script>

<div id="content" class="box">


<fieldset class="login">
<legend>Setting Subject Infomation</legend>

<table border="0" cellpadding="0"  cellspacing="0" >

		<tr>
				<th valign="top">Class: &nbsp;&nbsp;</th>
				<td><select class="styledselect-normal" id="class_names" name="class_names" >
				<?php
				$qry = mysql_query("select  id,class_name from std_class_config where branch_id='$branchid' "); 
				while ($row=mysql_fetch_array($qry))		{
					echo "<option value='" .$row[0]. "'>$row[1]</option>";
				}
                ?>				            
                </select></td>	
			<td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_rep">This field is required.</p></div>
			</td>	
		</tr>

		<tr>
			<th valign="top">Subject Code: &nbsp;&nbsp;</th>
				<td><input type="text" class="inp-form" id="sub_code" name="sub_code" /></td>	
			<td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_rep">This field is required.</p></div>
			</td>	
		</tr>		
		
		<tr>
				<th valign="top">Subject Name: &nbsp;&nbsp;</th>
				<td><input type="text" class="inp-form" id="subname" name="subname" /></td>	
			<td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_rep">This field is required.</p></div>
			</td>	
		</tr>
			
		<tr>
		<th valign="top">Mark: </th>
		<td>
		<select  class="styledselect-day" name="sub_mark" id="sub_mark">
					<option value="00">SUB</option>
					<?php
					for($i=10;$i<=100;$i=$i+10 )	{
								echo "<option value=\"$i\">$i</option>";
					}
					?>
				</select>
		
		<select class="styledselect-day" name="ct_mark" id="ct_mark">
					<option value="00">CT</option>
					<?php
					for($i=10;$i<=100;$i=$i+10 )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
				</select>
					<select  class="styledselect-month" name="ob_mark" id="ob_mark">
					<option value="00">OB</option>
					<?php
					for($i=10;$i<=100;$i=$i+10 )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
					
					</select>
					<select  class="styledselect-month" name="practical_mark" id="practical_mark">
					<option value="00">Practical</option>
					<?php
					for($i=10;$i<=100;$i=$i+10 )
					{
					echo "<option value=\"$i\">$i</option>";
					}
					?>
					
					</select>					
				</td>
				<td><div class="bubble-left"></div>
	<div class="bubble-inner">Select class time</div>
	<div class="bubble-right"></div></td>
	
				</tr>
		     <tr>
            	<td height="6"></td>
            </tr>
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="button" value="Submit" name="submit" class="form-submit" id="sub_btn" />
			<input type="button" value="Reset" name="reset" class="form-reset" id="reset_btn" />
		</td>
		<td></td>
	</tr>
	
		
	</table>


			 
					

</fieldset>

<?php
/*
<a href="includes/routine_function/demo.php?day_name=$day_name&routine_id=$id"  onclick="return GB_showCenter('Add Routine Details', this.href,250,550)">test</a>;
if (isset($_POST['submit']))
		{
		
		$sub_name=$_POST['subname'];
		$sub_mark=$_POST['sub_mark'];
		$ct_mark=$_POST['ct_mark'];
		$st_mark=$_POST['st_mark'];
		$full_mark=$sub_mark+$ct_mark+$st_mark;
		
		if ($sub_name!=="") 
		{
		$sel_sql="select count(*) as chk_count from std_subject_config where subject_name='$sub_name' and branch_id=$branchid";
		$res_sql=mysql_query($sel_sql);
		$row=mysql_fetch_array($res_sql);
		if($row['chk_count']<1)
		{
		$ins_sql="insert into std_subject_config set subject_name='$sub_name',sub_mark=$sub_mark,ct_mark=$ct_mark,st_mark=$st_mark,final_mark=$full_mark,branch_id=$branchid";
		mysql_query($ins_sql);
		echo "<p class=\"msg done\">Your data hasbeen entered successfully !!!</p>";
		}
		else
		{
		echo "<p class=\"msg warning\">Please enter another data.This data already entered.</p>";
		}
		}
		else
		{
		echo "<p class=\"msg error\">Please enter valid information.</p>";
		}
		
		}
else
{

}
	*/	
		
?>


<table width=100% id="jq_tbl">


     
		</table>
	

</div>

