<script type="text/javascript">
$(document).ready(function(){

	$('#class_name').change(function(){
		var class_name = $('#class_name').val();
        var branch_id  = $('#branch_id').val();		
		if(class_name!='') {
		  $('#class_fee_datatable').load('includes/class_fee_config_datatable_by_ajax.php',
		   {'class_name':class_name,'branch_id':branch_id},
		   function(){});   		
		}   
	   
	});  
});
</script>

<div id="content" class="box">

<fieldset class="login">
<legend>Class Ways Fee Details</legend>
<form name="frm1" id="frm1" method="post" action="">

<input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>

<table border="0" cellpadding="0"  cellspacing="0" >
	<tr>
		<th valign="top">Class Name:</th>
		<td>
 		    <select id="class_name" name="class_id" class="styledselect-normal">
            <option value="">select any class</option>
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
</form>
</fieldset>


<div id="class_fee_datatable"></div>


</div>