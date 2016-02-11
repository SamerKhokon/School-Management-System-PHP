<?php session_start();  require_once("../db.php");
$branch_id = $_SESSION['LOGIN_BRANCH'];	
?>
<div id="content" class="box">	
	<fieldset>
    	<legend>Result SMS Send  to Students</legend>	
		<table>
            <tr>
                <td>Class</td>
                <td>
                <select id="class_id" class="styledselect-normal">
                	<option value="">Select Class</option>
                	<?php 
					$str = "select id,class_name from std_class_config where branch_id=$branch_id";
					$sql = mysql_query($str);
					while($rs = mysql_fetch_assoc($sql)) 
					{
						?>
						<option value="<?php echo $rs['id'];?>"><?php echo $rs['class_name'];?></option>
						<?php 
					} 
					?>
                </select>
                </td>
            </tr>
            <tr>		
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>		
                <td>SMS</td>
                <td><textarea rows="5" cols="30" id="notice_sms"></textarea></td>
            </tr>				
            <!--<tr>		
                <td>&nbsp;</td>
                <td><input type="button" id="office_stuff_sms_send_btn" class="form-submit" value="Submit"/></td>
            </tr> -->				
        </table>
        <br/><br/>
        <div id="parants_datatable"></div>
    </fieldset>
</div>		
<script type="text/javascript">
$(document).ready(function(){
	$("#class_id").focus();
	$("#class_id").change(function(){
		var branch_id = '<?php echo $branch_id;?>';
		var class_id = $(this).val();
		$.ajax({
			type:"post" ,
			url:"includes/parants_mobileno_fetch_by_ajax.php" ,
			data:"class_id="+class_id+"&branch_id="+branch_id ,
			success:function(st) {
				//alert(st);
				$("#parants_datatable").html('');
				$("#parants_datatable").html(st);
			}
		});	    
	});
	
	$("#confirm_notice_sms_send_to_parants").live("click",function(){
		var c = confirm('Are you sure want to send SMS?');
	   	if(c == true) {
	   		send_notice_sms($('#mobile_nos').val());	
	   	}else{
			return false;
	   	}
	});	
});
function send_notice_sms(mobile_nos)
{
	if(mobile_nos=='')
	{
		alert('No numbers to send SMS. Select other class.');
		$('#class_id').focus();
		return;		
	}
	else if($('#notice_sms').val()=='')
	{
		alert('Please enter Notice!');
		$('#notice_sms').focus();
		return;
	}
	else
	{
		$.ajax({
			type:"post" ,
			url:"includes/sms_function.php" ,
			data:"mobile_nos="+mobile_nos+"&notice_sms="+$('#notice_sms').val()+'&flag=notice' ,
			success:function(st) {
				//alert(st);
				$("#parants_datatable").html('');
				$("#parants_datatable").html(st);
			}
		});
		
	}
}
</script>