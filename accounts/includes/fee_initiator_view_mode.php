<script type="text/javascript">
    $(document).ready(function(){ 
        $('#example').dataTable( {
			"sPaginationType": "full_numbers"	
   	    });
		$("#class_name").focus();
		$("#class_name").keydown(function(event) {
	        if(event.keyCode == 13 )		
				$("#sec_name").focus();
		});
		$("#sec_name").keydown(function(event)    {
			if(event.keyCode == 13 )			   
			{
			 $("#month_id").focus();
			}			
		});
		$("#month_id").keydown(function(event)
		{
		    if(event.keyCode == 13 )
			{
			 $("#year_id").focus();
			}
		});
		$("#year_id").keydown(function(event)
		{
			if(event.keyCode == 13 )
			{
				$("#sub_btn").focus();
			}									
		});									
		$("#sub_btn").click(function(event) {									
			var class_name= $("#class_name").val();
			var sec_name  = $("#sec_name").val();
			var year_id   = $("#year_id").val();
			var month_id  = $("#month_id").val();
			var branch_id = $("#branch_id").val();
			
			if(class_name=="") {
			  alert("Select Class");
			  return false;
			}else if(sec_name=="") {
			  alert("Select Section");
			  return false;
			}else{			
				$("#class_way_total_fee_datatable").load("includes/fee_initiator_view_mode_datatable.php",
				{"class_name":class_name , "sec_name":sec_name , "year_id":year_id,
				"month_id":month_id,"branch_id":branch_id},function(){});
			}
		});														
	});	
</script>

<div id="content" class="box">
<?php //echo $_SESSION['LOGIN_BRANCH']?>
<fieldset class="login">
<legend>Fee Initiator View</legend>
<input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
<table border="0" cellpadding="0"  cellspacing="0" >
	<tr>
		<th valign="top">Class Name:</th>
		<td>
 		    <select id="class_name" name="class_id" class="styledselect-normal">
				<option value="">Select Class</option>
				<?php 
					$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 				
					while ($row=mysql_fetch_array($qry)){
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
		<th valign="top">Section Name: &nbsp;&nbsp;</th>
		<td>
			<select id="sec_name" name="section_name" class="styledselect-normal">
			   <option value="">Select Section</option>
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
        <td height="6"></td>
    </tr>
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
				  <option><?php  echo $year;  ?></option>
				  <?php 	for($i=$pre;$i<=$next;$i++){						
						        echo "<option value=\"$i\">$i</option>";
						    }
				  ?>				  
		     </select>
        </td>            
    </tr>
    <tr>
        <td height="6"></td>
    </tr>		
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="button" value="" name="submit" class="form-submit" id="sub_btn" />
			<input type="button" value="" name="confirm" class="form-confirm" id="con_btn"  />
		</td>
		<td></td>
	</tr>		
	</table>

    <br/>
	<br/>
	<br/>
    <div id="class_way_total_fee_datatable"></div>

</fieldset>
</div>

