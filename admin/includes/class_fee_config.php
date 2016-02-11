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
	   //$('#fee_name').focus();
	}); 

	$('#fee_name').change(function(ex){	    
		var fee_head_id = $('#fee_name').val();
		var class_name = $('#class_name').val();
        var branch_id  = $('#branch_id').val();
		if(fee_head_id!='')
		{		
			if(class_name!='') {
			  $('#class_fee_datatable').load('includes/class_fee_config_datatable_by_ajax.php',
			   {'class_name':class_name,'branch_id':branch_id,'fee_head_id':fee_head_id},
			   function(){});   			
			}   
		}		
	});
	
	/*$('#fee_amount').keypress(function(ex){
	   if(ex.which == 13){
	    var fee_amount = $('#fee_amount').val();
		if(fee_amount==""){
		  alert('Enter Fee amount');
		  $('#fee_amount').focus();
		  return false;
		}else{
		  $('#sub_btn').focus();
		}
	   }
	});
	
	
	
	$('#sub_btn').click(function(){
	   var class_name  = $('#class_name').val();
	   var fee_name  = $('#fee_name').val();
	   var fee_amount  = $('#fee_amount').val();
	   var branch_id  = $('#branch_id').val();
	   
	   
	   var dataStr = 'class_name='+class_name+'&fee_name='+fee_name+'&fee_amount='+fee_amount+'&branch_id='+branch_id;
	    if(fee_name=='') 
		{
		   alert('Please select fee name!');
		}
		else if(fee_amount=='') {
		  alert('Please enter fee amount');
		  $('#fee_amount').focus();
		  return false;
		}
		else if(fee_name!='' && fee_amount!='') {
             
            $.ajax({
			  type:'post' ,
			  url:'includes/fee_head_add_by_ajax.php' ,
			  data:dataStr,
			  success:function(st){
			       alert(st);
					$('#class_fee_datatable').load('includes/class_fee_config_datatable_by_ajax.php',
					{'class_name':class_name,'branch_id':branch_id},
					function(){});
					//$('#fee_amount').val('');
			   }
			});   
	    } 
	});*/	
});
</script>

<div id="content" class="box">
<?php require_once("../db.php"); 
  session_start();
  $branchid = $_SESSION["LOGIN_BRANCH"];
  
?>
<fieldset class="login">
<legend>Class Ways Fee Details</legend>

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
		<th valign="top">Fee Name:</th>
		<td>
		<select id="fee_name" name="fee_name" class="styledselect-normal">
		    <option value=''>select fee name</option> 
		    <?php  
				  $fee_str = "SELECT id,fee_head FROM `tbl_class_feehead` WHERE branch_id=".$_SESSION['LOGIN_BRANCH'];
				  $fee_res = mysql_query($fee_str);
                   while( $rs = mysql_fetch_array($fee_res)  )
				   {
			?>
						<option	value="<?php echo $rs[0];?>"> <?php echo $rs[1]; ?> </option>
		    <?php  } ?>
		
		</select>
		</td>
	    <td>
			<div class="error-left"></div>
			<div class="error-inner"><p id="err_rep">This field is required.</p></div>
		</td>	
	</tr>	
	
	<!--<tr>
		<th valign="top">Fee Amount:</th>
		<td><input type="text" class="inp-form" id="fee_amount"/>
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
	</tr> -->		
	</table>

</fieldset>


<div id="class_fee_datatable"></div>


</div>