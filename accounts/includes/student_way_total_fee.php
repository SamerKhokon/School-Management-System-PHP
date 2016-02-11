<script type="text/javascript">
$(document).ready(function(){
	$("#month_id").focus();		  
	$("#month_id").keydown(function(event){
		if(event.keyCode == 13 )	   
		{
				$("#year_id").focus();
		}	
	});  
	$("#year_id").keydown(function(event){
		if(event.keyCode == 13 )	   
		{	
			$("#class_name").focus();
		}	
	});			  
	
	$("#class_name").change(function()
	{
	    var class_name = $("#class_name").val();
		var branch_id =  $("#branch_id").val();
		var dataStr = "class_id="+class_name+"&branch_id="+branch_id;
		if(class_name != "" )	   
		{
           $.ajax({
		     type:"post" ,
			 url:"includes/section_fetch.php" ,
			 data:dataStr ,
			 success:function(st){
			   $("#sec_name").html(st);				
			 }
		   });		
		}else{
			$("#sec_name").html("");
		}	
	});
	
	
	$("#class_name").keydown(function(event)
	{
		if(event.keyCode == 13 )	   
		{	
			$("#sec_name").focus();
		}	
	});
	
	
	
	
	
	 $("#sec_name").keydown(function(event)
	 {
		if(event.keyCode == 13 )	   
		{
			$("#roll_id").focus();
		}	
	});
	 $("#roll_id").keydown(function(event)
	 {
		if(event.keyCode == 13 )
	   	{
			$("#sub_btn").focus();
		}	
	});
	
	
	$("#sub_btn").click(function(event)	{
		var class_id =$("#class_name").val();
		var sec_id   =$("#sec_name").val();
		var roll     =$("#roll_id").val();
		var branch_id=$("#branch_id").val();	
		var mon=$("#month_id").val();
		var year=$("#year_id").val();
		
		if(class_id=="") {
		  alert('select class');
		  return false;
		}else if(sec_id=="") {
		  alert('select section');
		  return false;
		}else if(roll=="") {
		   alert('Enter student id');
		   $("#roll_id").focus();
		   return false;
		}
		else{
			$("#jq_tbl").load('includes/table/student_way_fee_tbl.php?branch_id='+branch_id+'&class_id='+class_id+'&sec_id='+sec_id+'&roll='+roll+'&mon='+mon+'&year='+year); 				
		}
	});					
});	
</script>
<?php require_once("../db.php"); session_start(); $branchid = $_SESSION["LOGIN_BRANCH"]; ?>
<div id="content" class="box">
<fieldset class="login">
<legend>Student Total Fee Details</legend>

<input type="hidden" id="branch_id" value="<?php echo $_SESSION["LOGIN_BRANCH"];?>"/>

<table border="0" cellpadding="0"  cellspacing="0" >
            <tr><th valign="top">Month</th>
            
                <td>
                  <select id="month_id" name="month_name" class="styledselect-year">
				  <option><?php  echo date('M') ?> </option>
				  <option value="1">Jan</option>
				  <option value="2">Feb</option>
				  <option value="3">Mar</option>
				  <option value="4">Apr</option>
				  <option value="5">May</option>
				  <option value="6">Jun</option>
                   <option value="7">Jul</option>
				  <option value="8">Aug</option>
				  <option value="9">Sep</option>
				  <option value="10">Oct</option>
				  <option value="11">Nov</option>
				  <option value="12">Dec</option>
				  
		     </select>
             <?php			 
			 $year = date("Y");			 
			 $pre = $year - 10;			 
			 $next = $year + 10;
			 ?>
                  <select id="year_id" name="year_name" class="styledselect-year">
				  <option ><?php  echo $year;  ?></option>
				  <?php
				    for($i=$pre;$i<=$next;$i++)
					{						
						echo "<option value=\"$i\">$i</option>";
					}
				  ?>
		     </select>
                </td>            
            </tr>
			<tr>
				<th valign="top">Class Name:</th>
				<td>				
				<select id="class_name" name="class_id" class="styledselect-normal">
                <option value="">select class</option>
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
			<th valign="top">Section Name:&nbsp;&nbsp;</th>
			<td>
			<select id="sec_name" name="section_name" class="styledselect-normal">
				  			  
		     </select>
			</td>
	        <td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_rep2">This field is required.</p></div>
			</td>	
		    </tr>
			</td>
		<tr>
        <tr>
            <th valign="top">
             Roll:
            </th>
             <td>
                 <input type="text" name="roll_name" id="roll_id" class="inp-form" />
             </td>
            
	        <td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_rep2">This field is required(Student ID).</p></div>
			</td>	
		    
            
        </tr>
             <tr>
            	<td height="6"></td>
            </tr>
        <tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="button" value="sub" name="submit" class="form-submit" id="sub_btn" />
			<input type="reset" value="sub" name="con" class="form-confirm" id="con_btn"  />
		</td>
		<td></td>
	</tr>		
	</table>
</fieldset>

<table width=100% id="jq_tbl">	
</table>
<div id="for_con_btn">
</div>
</div>