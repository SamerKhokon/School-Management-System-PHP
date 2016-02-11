<script type="text/javascript">
 $(document).ready(function(){
			$("#class_name").focus();
			var branchid=$("#branchid").val();
																
			$("#jq_tbl").load('includes/table/class_config_tbl.php?branchid='+branchid);						  
			
			$("#class_name").keydown(function(event)    {
					 if(event.keyCode == 13 )	{											
						if($("#class_name").val()=="")   {
								$("#err_sml_1").fadeOut(200);												
								$("#err_sml_1").fadeIn(1200);
						} else  {  											
							$("#student_capacity").focus();
						}											
					}									
			});
			$("#student_capacity").keydown(function(event)   {
					if(event.keyCode == 13 ) {											 
						 if($("#student_capacity").val()=="")   {
									$("#err_sml_2").fadeOut(200);												
									$("#err_sml_2").fadeIn(1000);
						 } else   {
									$("#daily_class").focus();
						 }
					}									
			});
			$("#daily_class").keydown(function(event)    {
					if(event.keyCode == 13 )	{
							 if($("#daily_class").val()=="")   {
									$("#err_sml_3").fadeOut(200);												
									$("#err_sml_3").fadeIn(1000);
							 } else  {												
									$("#class_hour").focus();
							 }
					}
				});
				$("#class_hour").keydown(function(event)    {
					if(event.keyCode == 13 )	{											
							 if($("#class_hour").val()=="")      {
								   $("#err_sml_4").fadeOut(200);												
								   $("#err_sml_4").fadeIn(1000);
							 }else  {									
									$("#class_min").focus();
							  }									  
					 }
				 }) 
				$("#class_min").keydown(function(event)    {
					if(event.keyCode == 13 )	{									
						$("#class_btn").focus();									  
						} 									  
				});
				$("#class_btn").click(function(event)		    {
				
				         
								var class_name=$("#class_name").val();
								var student_capacity=$("#student_capacity").val();
								var daily_class= $("#daily_class").val();
								var class_hour= $("#class_hour").val();
								var class_min=$("#class_min").val();													
								var section_system = $("#section_system").val();
								var branchid=$("#branchid").val();
								
								
							if(class_name==""){
							   alert('Enter class name');
							   $('#class_name').focus();
							   return false;
							}else if(student_capacity==""){
							   alert('Enter student capacity');
							   $('#student_capacity').focus();
							   return false;
							}else if(daily_class==""){
							   alert('Enter daily class');
							   $('#daily_class').focus();
							   return false;
							}else
							{
								//alert(branchid);
								   $.ajax({
										  url:'includes/table/class_config_tbl_insert.php',
										  type:'post',
										  data:'&class_name='+class_name+'&student_capacity='+student_capacity+'&daily_class='+daily_class+'&class_hour='+class_hour+'&class_min='+class_min+'&branchid='+branchid+'&section_system='+section_system,
										  success:function(htmData)   {
												  alert(htmData);															  
												  $('#class_name').val('');
												  $('#student_capacity').val('');
												  $('#daily_class').val('');
												  $('#class_hour').val('');
												  $('#class_min').val('');
													//  $('#address').val('');
													//  $("#name").focus();
													$("#jq_tbl").load('includes/table/class_config_tbl.php?branchid='+branchid);														   
												  },
												 error:function(FData)  {
												 alert(FData);
											   } 
								   });
							}	   
						 
				});
	});	
</script>
<?php require_once("../db.php"); 
  session_start();
  $branchid = $_SESSION["LOGIN_BRANCH"];
  
?>

<input type="hidden" id="branchid" value="<?php echo $branchid;?>"/>

<div id="content" class="box">
<fieldset class="login">
<legend>Add New Class Details</legend>
<table border="0" cellpadding="0"  cellspacing="0"  >
		<tr>
			<th valign="top">Class Name:</th>
			<td><input type="text" class="inp-form" name="class_name" id="class_name" /></td>
	
			<td><div class="bubble-left"></div>
	<div class="bubble-inner"><p id="err_sml_1">Enter Class Name</p> </div>
	<div class="bubble-right"></div></td>	
		</tr>
		<tr>
			<th valign="top">Student Capacity:</th>
			<td><input type="text" class="inp-form-error" name="student_capacity" id="student_capacity"/></td>
			<td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_sml_2">This field is required.</p></div>
			</td>
		</tr>		
		<tr>
			<th valign="top">Daily class :</th>
			<td><input type="text" class="inp-form-error" name="daily_class" id="daily_class"/></td>
			<td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_sml_3">This field is required.</p></div>
			</td>
		</tr>		
		
		<tr>
		<th valign="top">Class Start Time:</th>
			<td><select id="class_hour" class="styledselect-day" name="hour">					
				<?php
                for($i=1;$i<=12;$i++ ){
					$h=$i;
					if($i<10)
						$h='0'.$i;
                    echo "<option value=\"$h\">$h</option>";
                }
                ?>
				</select>
                <select id="class_min" class="styledselect-month" name="minute">
				<?php		
				for($i=0;$i<60;$i=$i+5 ){
					$m=$i;
					if($i<10)
						$m='0'.$i;
					echo "<option value=\"$m\">$m</option>";
				}
                ?>					
                </select>
			</td>
				<td><div class="bubble-left"></div>
				<div class="bubble-inner"><p id="err_sml_4">Select class time</p></div>
				<div class="bubble-right"></div></td>
		</tr>
		
		 <tr>
				<th valign="top">Section System:</th>
				<td><select class="styledselect-month" id="section_system">
							<option value="E">E</option>
							<option value="Z">Z</option>
						</select></td>
				<td>&nbsp;</td>
		 </tr>			
		
         <tr><td height="6"></td></tr>
			 
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="button" value="" name="submit" class="form-submit" id="class_btn" />
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
		
		$class_name=$_POST['class_name'];
		$student_capacity=$_POST['student_capacity'];
		$daily_class=$_POST['daily_class'];
		$start_time=$_POST['hour'].":".$_POST['minute'];
		
		if ($class_name!=="" and $student_capacity!="" and $daily_class!="" and $start_time!="") 
		{
		$sel_sql="select count(*) as chk_count from std_class_config where class_name='$class_name' and branch_id=$branchid";
		$res_sql=mysql_query($sel_sql);
		$row=mysql_fetch_array($res_sql);
		if($row['chk_count']<1)
		{
		$ins_sql="insert into std_class_config set class_name='$class_name',no_of_student='$student_capacity',daily_class=$daily_class,class_start_time='$start_time',branch_id=$branchid";
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



		<table  width=100% id="jq_tbl">
        <tr>
          
		
		  
		 
		  
		  
        </tr>
        
		
		<?php 
		
		/*
		
		$url_par='?SM_id='.$_GET['SM_id'].'&menu_id='.$_GET['menu_id'].'&nev=action_pos_deposit';
		//$url_par=$_SERVER['PHP_SELF'];
		//$url_par=$_SERVER['QUERY_STRING'];
		$where ="where 1=1 and branch_id=$branchid";
		
		$qry = mysql_query("SELECT  * from std_class_config $where  $pages->limit"); 		
		$count=1;
		while ($row=mysql_fetch_array($qry))
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
		  
		  $class_id=$row['id'];
		  $class_name=$row['class_name'];
		  $no_of_student=$row['no_of_student'];
		  $account_number=$row['account_number'];
		  $daily_class=$row['daily_class'];
		  $class_start_time=$row['class_start_time'];
		  
        
		echo  "<td>$class_name</td>";
		echo  "<td>$no_of_student</td>";
	
		echo  "<td>$daily_class</td>";
		echo  "<td>$class_start_time</td>";
		echo  "<td><a href=\"$url_par&deposit_id=$deposit_id\">Details</a> Edit Delete</td>";
		
        echo "</tr>";
		
		$count++;
		}
	*/
	
		?>
		</table>
	




</div>