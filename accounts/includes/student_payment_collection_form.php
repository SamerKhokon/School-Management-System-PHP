<script type="text/javascript">
$(document).ready(function(){   
	$("#gen_pay_slip").click(function(){
			var btn_value = $("#gen_pay_slip").val();
			var class_id  = $("#class_id").val();
			var sec_id    = $("#section_id").val();
			var yearmonth = $("#yearmonth").val();
			var branchid  = $("#branchid").val();
			var dataString = "yearmonth="+yearmonth+"&class_id="+class_id+"&sec_id="+sec_id+"&branchid="+branchid+"&btn_value="+btn_value;
			$.ajax({  
				 type: "POST",  
				 url: "includes/edit_std_fee_generator.php",  
				 data: dataString,  
				 success: function(st) {  
					alert("Data sucessfully updated......");							   
				 }  
			});  
    });
});
</script>
<div id="content" class="box">
	<?php echo date('Ymd-s-',time()).rand(10,1000);  ?>
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $branchid;?>">
	  <fieldset>
		<legend>Fee Collection</legend>
		<table>
			<tr>
			   <th>Pay Slip Number: &nbsp;&nbsp;</th> 				
			   <td><input type="text" class="inp-form"/></td>
		    </tr>
	    </table>		
	  </fieldset>
    <input type="button" id="btn_abs_day" value="submit" class="form-submit"/>
</div>
<!-- /content -->