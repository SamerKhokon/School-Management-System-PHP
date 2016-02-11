<?php session_start(); require_once("../db.php");
$branch_id = $_SESSION['LOGIN_BRANCH']; 
$current_year = date('Y');
?>
<div id="content" class="box">	
	<fieldset>
    	<legend>Fee SMS Send  to Students</legend>	
        <table>
            <tr>		
                <td>Year</td>
                <td><input type="text" name="year" id="year" value="<?php echo $current_year;?>" readonly="readonly" /><input type="hidden" name="branch_id" id="branch_id" value="<?php echo $branch_id;?>" /></td>
            </tr> 							
            <tr>		
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>  
            <tr>		
                <td>Month</td>
                <td><select id="month" class="styledselect-normal">
                	<?php
                    $current_month = date('n', time());
					for($i=1; $i<=12; $i++)
					{
						$selected = '';
						if($i==$current_month)
							$selected = ' selected="selected"';
						$mon = date("F", mktime(0, 0, 0, $i+1, 0, 0, 0));
						$m=$i;
						echo '<option value="'.$m.'"'.$selected.'>'.$mon.'</option>';	
					}
					?>
                </select></td>
            </tr> 							
            <tr>		
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>  							
            <tr>
                <td>Class</td>
                <td><select id="class_id" class="styledselect-normal">
                    <option value="">Select Class</option>
                    <?php $str = "select id as class_id,class_name as class_name from std_class_config";
                    $sql = mysql_query($str);
                    while($rs = mysql_fetch_assoc($sql)) {
                    ?>
                    <option value="<?php echo $rs['class_id'];?>"><?php echo $rs['class_name'];?></option>
                    <?php } ?>
                </select>
                </td>
            </tr>
            <tr>		
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr> 
        </table>
        <br/><br/>
        <div id="parants_datatable"></div>
    </fieldset>
</div>		
<script type="text/javascript">
	$(document).ready(function(){
		$("#class_id").change(function(){
			var class_id = $('#class_id').val();
			if(class_id=='')
			{
				$("#parants_datatable").html('');
				$('#class_id').focus();
				return;
			}
			else
			{
				var dataA = 'class_id='+class_id+'&year='+$('#year').val()+'&month='+$('#month').val()+'&branch_id='+$('#branch_id').val();
				$.ajax({
					type:"post" ,
					url:"includes/parants_mob_nos_for_fee_sms.php" ,
					data:dataA,
					success:function(st) {
						//alert(st);
						$("#parants_datatable").html('');
						$("#parants_datatable").html(st);
					}
				});	    
			}			
		});
		$("#month").change(function(){
			$("#parants_datatable").html('');
			$('#class_id').val('');
			return;
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
			var dataA = 'class_id='+$('#class_id').val()+'&year='+$('#year').val()+'&month='+$('#month').val()+'&branch_id='+$('#branch_id').val()+'&flag=fee_sms';
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