<script type="text/javascript">
    $(document).ready(function(){			   
			  /*  $('#example').dataTable({
					"sPaginationType": "full_numbers"				
				});			   */
				$("#class_name").focus();										  
				$("#class_name").keydown(function(event) {
					    if(event.keyCode == 13 ){
						$("#sec_name").focus();
					}								
				});
			   	$("#sec_name").keydown(function(event)	     {
					if(event.keyCode == 13 )	{
						 $("#sub_btn").focus();
					}
				});									
				$("#sub_btn").click(function(event)    {
                    var class_name = $("#class_name").val();
					var sec_name   = $("#sec_name").val(); 				
					var dataStr = 'class_name='+class_name+'&sec_name='+sec_name;
					
					$.ajax({
					   type:'post' ,
					   url: 'includes/student_class_detail.php' ,
					   data:dataStr ,
					   cache:false ,
					   success:function(st){
					     $('#data_load_div').load('includes/student_class_detail.php',
						  {'class_name':$('#class_name').val(),
						    'sec_name':$('#sec_name').val()
						  }, function(){});
						  //alert(st);
					   }
					});
				    //alert(dataStr);
					
				});														
	});	

</script>

<div id="content" class="box">
<?php 	$branchid = $_SESSION['LOGIN_BRANCH']; 
include('db.php');
		$_SESSION['menuid'] = $_GET['menu_id'];	
		$_SESSION['SM_id']  = $_GET['SM_id'];
 ?>
<fieldset class="login">
<legend>Student Class Details</legend>
<form name="frm1" id="frm1" method="post" action="">
<input type="hidden" value="<?php echo $branchid;?>"/>
<table border="0" cellpadding="0"  cellspacing="0"  >
			<tr>
				<th >Class Name:</th>
				<td>				
				<select id="class_name" name="class_id" class="styledselect-normal">
				<?php 
				 //echo "select id,class_name from std_class_config where branch_id=$branchid";
			 
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
				  <option value="A">A</option>
				  <option value="B">B</option>
				  <option value="C">C</option>
				  <option value="D">D</option>
				  <option value="E">E</option>
				  <option value="F">F</option>				  
		     </select>
			
			
			</td>
	        <td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_rep2">This field is required.</p></div>
			</td>	
		    </tr>
		
		<tr>
             <tr>
            	<td height="6"></td>
            </tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="button" value="" name="submit" class="form-submit" id="sub_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>
		
	</table>

</form>
</fieldset>
<?php   ?>
<div id="data_load_div"></div>


<!--
<table width=100% id="jq_tbl">	
			<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
							<thead>
								<tr>
								  <th>Roll</th>          
								  <th>Student&nbspName</th>
								  <th>Class </th>
								  <th>Section</th>
								  <th>Open Day </th>  
								  <th>Attend</th>        
								  <th>Absent</th>
								  <th>Leave </th>         
								  <th>Status</th>
								  <th>Present Result</th>
								<!--  <th>Action&nbsp&nbsp</th>
								</tr>
							</thead>
							<tbody>-->
						 <?php 
						 /*
						 $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';
						 

							  $class_name=$_REQUEST['class_id'];
							  $sec_name=$_REQUEST['section_name'];

						if (isset($_POST['submit'])){ 
						$qry = mysql_query("SELECT  * from std_class_info where class_id='$class_name' and class_sec='$sec_name' and branch_id='$branchid'");
								$count=1;
								while ($row=mysql_fetch_array($qry))
								{
									$mod=$count%2;
									if ($mod==0)	{
										echo "<tr>";
									}else{
										echo "<tr class=\"bg\">";
									}
								  $stu_id=$row['id'];
								  $roll=$row['class_roll'];
								  $student_name=$row['stu_name'];
								  $class_name=$row['class_name'];
								  $class_sec=$row['class_sec'];
								  $total_open_day=$row['total_open_day'];
								  $total_atten=$row['total_atten'];
								  $total_leave=$row['total_leave'];
								  $total_abs=$row['total_abs'];
								  $status=$row['stuts'];
								  $result=$row['result'];
								echo  "<td>$roll</td>";
								//echo  "<td><a href=\"includes/routine_function/student_profile_info_chng.php?stu_id=$stu_id\" onclick=\"return GB_showCenter('Delete Data', this.href,650,650)\"> $student_name</a></td>";	
							//	echo "<td>$student_name</td>";		
								
								echo  "<td><a href= \"$url\">$student_name</a></td>";
								echo  "<td>$class_name</td>";
								echo  "<td>$class_sec</td>";
								echo  "<td>$total_open_day</td>";
								echo  "<td>$total_atten</td>";	
								echo  "<td>$total_leave</td>";
								echo  "<td>$total_abs</td>";
								echo  "<td>$status</td>";
								echo  "<td>$result</td>";
						// echo "<td><a href=\"includes/routine_function/student_info_chng.php?sub_action=delete&id=$id\" id=\"img1\"  onclick=\"return GB_showCenter('Delete Data', this.href,150,250)\"><img src=\"custom_css/delete_image.png\" width=\"16\" /> </a><a href=\"includes/routine_function/student_info_chng.php?id=$id&sub_action=detail&roll=$roll&student_name=$student_name&class_name=$class_name&class_sec=$class_sec&total_open_day=$total_open_day&total_atten=$total_atten&total_leave=$total_leave&total_abs=$total_abs&status=$status&result=$result\" id=\"img2\"  onclick=\"return GB_showCenter('Detail Data', this.href,350,550)\"><img src=\"custom_css/process_info.png\" width=\"16\" /> </a><a href=\"includes/routine_function/student_info_chng.php?id=$id&sub_action=edit&roll=$roll&student_name=$student_name&class_name=$class_name&class_sec=$class_sec&total_open_day=$total_open_day&total_atten=$total_atten&total_leave=$total_leave&total_abs=$total_abs&status=$status&result=$result\" id=\"img1\"  onclick=\"return GB_showCenter('Edit Data', this.href,350,450)\"><img src=\"custom_css/001_45.png\" width=\"16\" /> </a></td>";
						//	<a href="includes/routine_function/demo.php?day_name=$day_name&routine_id=$id"  onclick="return GB_showCenter('Add Routine Details', this.href,250,550)">test</a>       ;	
						// <a href=\"javascript:chng('img');\"><img src=\"s.png\" name=\"img\"></a> 
							   echo "</tr>";		
								$count++;
								}			
							}	*/		
							?>
						<!--	</tbody>
							<tfoot>
								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>			
									<th>&nbsp;</th> 
								</tr>
							</tfoot>
				</table>
			</div>  end demo div 
		</table>
		
		-->
		
</div>  <!-- end box div -->