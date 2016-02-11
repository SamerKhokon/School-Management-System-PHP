<!-- mark_distribution.php -->
<script type="text/javascript">
$(document).ready(function(){
  $("#exam_name").focus();									
  $("#list").load('includes/table/mark_distribution_tbl.php');
  
	$("#sb").keydown(function(event)
	{
		if(event.keyCode == 13 )
		{
			if($("#sb").val()=="")
			{	
					alert("Enter Subjective mark");
				  $('#sb').focus();
				  return false;			
			}
			else
			{
				$("#ob").focus();
			}
		}
	});
	$("#ob").keydown(function(event)
	{
		if(event.keyCode == 13 )
		{
			if($("#ob").val()=="")
			{	
					alert("Enter Objective mark");
				  $('#ob').focus();
				  return false;			
			}
			else
			{
				$("#ct").focus();
			}
		}
	});	
	$("#ct").keydown(function(event)
	{
		if(event.keyCode == 13 )
		{
			if($("#ct").val()=="")
			{	
					alert("Enter Class Test mark");
				  $('#ct').focus();
				  return false;			
			}
			else
			{
				$("#mark_distribution_btn").focus();
			}
		}
	});	
	
			
		
			$("#mark_distribution_btn").click(function(event)
			{
				var class_name=$("#class_name").val();
				var sb=$("#sb").val();				
				var ob=$("#ob").val();
				var ct= $("#ct").val();			
				var branchid=<?php echo $branchid; ?>;
				var dataStr = 'class_name='+class_name+'&sb='+sb+'&ob='+ob+'&ct='+ct+'&branchid='+branchid;			
					
                if(class_name==""){
				  alert("Select Class");
				  $('#class_name').focus();
				  return false;
				}else if(sb==""){
				  alert("Enter Subjective mark");
				  $('#sb').focus();
				  return false;
				}else if(ob==""){
				  alert("Enter Objective mark");
				  $('#ob').focus();
				  return false;
				}else if(ct==""){
				  alert("Enter Class Test mark");
				  $('#ct').focus();
				  return false;
				}else{   					
					$.ajax({
						url:'includes/mark_distribution_insert.php',
						type:'post',
						data:dataStr,
						success:function(htmData)
					    {
						  alert(htmData);		
						  $('#class_name').val(0);
						  $('#sb').val('');									
						  $('#ob').val('');
						  $('#ob').val('ct');
						  $("#list").load('includes/table/mark_distribution_tbl.php');	
						}							   
					});
				}
					 
			});
		});	

</script>


<div id="content" class="box">

<fieldset class="login">
<legend>Exam Details</legend>
<table border="0" cellpadding="0" cellspacing="0" >
			
		
			    
			<tr>	<th valign="top">Class name:</th> 				
			<td>	<select id="class_name" name="class_name" class="styledselect-normal">		
                        <option value="">select class</option>			
						<?php 
								$qry = mysql_query("select  id,class_name from std_class_config where branch_id='$branchid' "); 				
								while ($row=mysql_fetch_array($qry))		{
										echo "<option value='" .$row[0]. "'>$row[1]</option>";
								}
						?>				           			             
			        </select>
			</td>
			<td>
			    <div class="error-left"></div>
			    <div class="error-inner"><p id="err_rep_2">This field is required.</p></div>
			</td></tr>
                 <tr>
            	<td height="6"></td>
            </tr>
			    
			<tr>	<th valign="top">Subjective:</th>
					<td>	<input  type="text" id="sb" name="sb" class="inp-form">	</td>
			</tr>		
			
			<tr>	<th valign="top">Obective:</th>
					<td>	<input  type="text" id="ob" name="ob" class="inp-form">	</td>
			</tr>		
	
			<tr>	<th valign="top">Class Test:</th>
					<td>	<input  type="text" id="ct" name="ct" class="inp-form">	</td>
			</tr>		
				
			
				
				
				
				<input type="hidden" id="branchid" name="branchid" value="<?php echo $branchid;?>">
				
				     <tr>
            	<td height="6"></td>
            </tr>
			<tr><td>	 <button id="mark_distribution_btn" class="form-submit">submit</button></td>
			             <td> <button id="res_btns" class="form-reset">submit</button></td>
			</tr>
		</table>		
			
</fieldset>



<table id="list" width="100%">


</table>  
<div id="pager" class="x3" width=100%"></div>  
 

</div>
