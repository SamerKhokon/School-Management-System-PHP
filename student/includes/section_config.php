
<script type="text/javascript">

               $(document).ready(function(){
						
						  $("#class_name").focus();
							
							 var branchid="<?php echo $branchid; ?>";

															
						  $("#jq_tbl").load('includes/table/section_config_tbl.php?branchid='+branchid);
						  
						           	$("#class_name").keydown(function(event)
								     {
									     if(event.keyCode == 13 )
									   
								   			{
											

									              $("#section_name").focus();
										       	 
											
											}
									
									});
						
									
									$("#section_name").keydown(function(event)
								    {
									  if(event.keyCode == 13 )
									   
								   			{
							
											
									  $("#teacher_id").focus();
									  }
									
									});
									$("#teacher_id").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
									   
								   			{
									
									  $("#sub_id").focus();
									
									  
									  }
									 }) 
									$("#sub_id").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
									   
								   			{
										
									
									        $("#total_stu").focus();

									        } 
									  
									});
								$("#total_stu").keydown(function(event)
								    {
									    if(event.keyCode == 13 )
								   			{
									
									        $("#sec_btn").focus();
									  
									        } 
									  
									});
									$("#sec_btn").click(function(event)
								    {
									
									
									      var result = window.confirm("Click OK or Cancel.");
											 
											 if(result)
											    {
												    var class_name=$("#class_name").val();
												    var section_name=$("#section_name").val();
												    var teacher_id= $("#teacher_id").val();
											  		var sub_id= $("#sub_id").val();
													var total_stu= $("#total_stu").val();
													
										           var branchid="<?php echo $branchid; ?>";
													
												
														  
											   $.ajax({
				                             	 	  url:'includes/table/section_config_tbl_insert.php',
		  				 							  type:'post',
										 data:'&class_name='+class_name+'&section_name='+section_name+'&teacher_id='+teacher_id+'&sub_id='+sub_id+'&branchid='+branchid+'&total_stu='+total_stu,
										// alert("hello");
													 
													  success:function(htmData)
														   {
													 		  alert(htmData);
															  
															  $('#class_name').val('');
															  $('#section_name').val('');
															  $('#teacher_id').val('');
															  $('#sub_id').val('');
															  $('#total_stu').val('');
															  
															  
														 //  $("#name").focus();
						  $("#jq_tbl").load('includes/table/section_config_tbl.php?branchid='+branchid);
										$("#class_name").focus();				   

							 								  },
		 				 							  error:function(FData)
														   {
															 alert(FData);
		  												   } 
				       								   });
												
												
												
											 
									  
									        } 
									  
									});
														
                          
							   
							    });	





</script>






<div id="content" class="box">

<fieldset class="login">
<legend>Add New Section Details</legend>


<table border="0" cellpadding="0" cellspacing="0" >
		<tr>
			<th valign="top">Class Name:</th>
			<td>
				<select id="class_name" name="class_id" class="styledselect-normal">
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
		<td>			
				<select id="section_name" name="section_name" class="styledselect-day">
				
				  <option value="A">A</option>
				  <option value="B">B</option>
				  <option value="C">C</option>
				  <option value="D">D</option>
				  <option value="E">E</option>
				  <option value="F">F</option>
				  
		     </select>

		</td>
		<td></td>
		</tr> 
		<tr>
            	<td height="6"></td>
            </tr>
		<tr>
		<th valign="top">Teacher Name:</th>
		<td>			
		
		
		<select id="teacher_id" name="teacher_id" class="styledselect-normal">
				<?php 
        		$qry = mysql_query("select id,teacher_name from std_teacher_info where branch_id=$branchid "); 				
		        while ($row=mysql_fetch_array($qry))		{
		        echo "<option value=\"$row[0]\">$row[1]</option>";
		         }
		          ?>
		</select>
		</td>
		<td></td>
		</tr> 
        <tr>
            	<td height="6"></td>
            </tr>
		<tr>
		<th valign="top">Subject Name:</th>
		<td>			
		
				<select id="sub_id" name="sub_id" class="styledselect-normal">
				<?php 
        		$qry = mysql_query("select id,subject_name from std_subject_config  where branch_id=$branchid"); 				
		        while ($row=mysql_fetch_array($qry))		
				{
		        echo "<option value=\"$row[0]\">$row[1]</option>";
		         }
		          ?>
		</select>
		
		</td>
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
		<th>&nbsp;</th>
		<td valign="top">
			<input type="button" value="" name="submit" class="form-submit" id="sec_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>

		
</table>


</fieldset>

<?php
/*

if (isset($_POST['submit']))
		{
		
		$class_id=$_POST['class_id'];
		$sec_name=$_POST['section_name'];
		$teacher_id=$_POST['teacher_id'];
		$sub_id=$_POST['sub_id'];
		$total_student=$_POST['total_student'];
		
		if ($total_student!=="") 
		{
		$sel_sql="select count(*) as chk_count from std_class_section_config where class_id=$class_id and section_name='$sec_name'";
		$res_sql=mysql_query($sel_sql);
		$row=mysql_fetch_array($res_sql);
		if($row['chk_count']<1)
		{
		$ins_sql="insert into std_class_section_config(class_id,section_name,class_teacher_id,no_of_student) values($class_id,'$sec_name',$teacher_id,$total_student)";
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
        
		
		<?php 
		/*
		
		$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev=section_config';
		//$url_par=$_SERVER['PHP_SELF'];
		//$url_par=$_SERVER['QUERY_STRING'];
		$where ="where 1=1 and branch_id=$branchid";
		$class_name ="(select class_name from std_class_config where id=class_id and branch_id=$branchid) as class_name";
		$teacher_name="(select teacher_name from std_teacher_info where id=class_teacher_id and branch_id=$branchid) as teacher_name";
		$qry ="SELECT $class_name,section_name,$teacher_name,no_of_student  from std_class_section_config $where  $pages->limit"; 		
		$result=mysql_query($qry);
		$count=1;
		while ($row=mysql_fetch_array($result))
		{
			        			$mod=$count%2;
								
								if ($mod==0)
								{
								//$chk_class='odd';
								echo "<tr>";
								}
								else
								{
								//$chk_class='even';
								echo "<tr class=\"bg\">";
								}
				
		  $deposit_id=$row['id'];
		  
		  
		  $class_name=$row['class_name'];
		  $section_name=$row['section_name'];
		  $teacher_name=$row['teacher_name'];
		  $total_student=$row['no_of_student'];
		  
		  
        
		echo  "<td>$class_name</td>";
		echo  "<td>$section_name</td>";	
		echo  "<td>$teacher_name</td>";
		echo  "<td>$total_student</td>";
		
		echo  "<td><a href=\"$url_par&deposit_id=$deposit_id\">Details</a> Edit Delete</td>";
		
        echo "</tr>";
		
		$count++;
		}
	*/
	
		?>
		</table>
	







</div>