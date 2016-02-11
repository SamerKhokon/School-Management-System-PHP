<?php session_start(); require_once("../db.php"); 
$branch_id = $_SESSION['LOGIN_BRANCH']; 
$current_year = date('Y');
?>
<div id="content" class="box">	
	<fieldset>
		<legend>Result SMS Send  to Parents</legend>	
        <table>
            <tr>		
                <td>Year</td>
                <td><select id="year_id" class="styledselect-normal">
                <?php 
				for($i=2000;$i<=2020;$i++) 
				{    
				?>
                	<option value="<?php echo $i;?>" <?php if($current_year==$i){ echo 'selected="selected"';}?>><?php echo $i;?></option>
                <?php 
				}   
				?>
                </select><input type="hidden" name="branch_id" id="branch_id" value="<?php echo $branch_id;?>" /></td>
            </tr> 							
            <tr>		
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>  
            <tr>		
                <td>Term</td>
                <td><select id="term_id"  class="styledselect-normal">
                 	<option value=""></option>
                 	<option value="1">Term1</option>
                 	<option value="2">Term2</option>
                 	<option value="3">Term3</option>									 
                </select></td>
            </tr> 
            <tr>		
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>  
            <tr>
                <td>Class</td>
                <td>
                <select id="class_id" class="styledselect-normal">
                <option value="">Select Class</option>
                <?php $str = "select id,class_name from std_class_config where branch_id=$branch_id";
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
	$("#year_id").focus();
	$("#year_id").change(function(){
		var year_id = $(this).val();
		var branch_id = $('#branch_id').val();
		$.ajax({
			type:"post" ,
			url:"includes/exam_name_fetch_by_ajax.php" ,
			data:'year_id='+year_id+'&branch_id='+branch_id,
			success:function(st) {
				//alert(st);
				$("#term_id").html(st);
			}
		});	    

	});
	$('#class_id').change(function(){
		if($('#class_id').val()=='')
		{
			alert('Please Select Class.');
			$("#parants_datatable").html('');
			$('#class_id').focus();
			return;
		}
		else
		{
			if($('#term_id').val()=='')
			{
				alert('Please Select Exam');
				$("#parants_datatable").html('');
				$('#term_id').focus();
				return;
			}
			else
			{
				$.ajax({
					type:"post" ,
					url:"includes/parants_mob_nos_for_result_sms.php" ,
					data:'year='+$("#year_id").val()+'&term_id='+$('#term_id').val()+'&class_id='+$('#class_id').val()+'&branch_id='+$('#branch_id').val(),
					success:function(st) {
						//alert(st);
						$("#parants_datatable").html('');
						$("#parants_datatable").html(st);
					}
				});
			}
		}
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
	//alert(mobile_nos);
	if(mobile_nos=='')
	{
		alert('No numbers to send SMS. Select other class.');
		$('#class_id').focus();
		return;		
	}
	else
	{
		var dataA = 'year='+$("#year_id").val()+'&term_id='+$('#term_id').val()+'&class_id='+$('#class_id').val()+'&branch_id='+$('#branch_id').val()+'&flag=result_sms';
		//alert(dataA);
		$.ajax({
			type:"post" ,
			url:"includes/sms_function.php" ,
			data:dataA,
			success:function(st) {
				//alert(st);
				$("#parants_datatable").html('');
				$("#parants_datatable").html(st);
			}
		});
		
	}
}
</script>