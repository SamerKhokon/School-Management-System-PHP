<?php  
	 require_once("../db.php");  session_start();
	$branchid = $_SESSION['LOGIN_BRANCH']; 
?>

<script type="text/javascript">
 $(document).ready(function(){
		$('#referer_name').focus();
		
		
		$("#referer_name").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#referer_no").focus();
			}
		});		
		$("#referer_no").keydown(function(event)    {
			if(event.keyCode == 13 ){
				$("#referer_sub_btn").focus();
			}
		});	
					
	$("#referer_sub_btn").click(function(event){
		 
			var referer_name  = $('#referer_name').val();  
			var referer_no      = $('#referer_no').val();
			
			if(referer_name=="") {
			  alert("Enter referer name");
			  $('#referer_name').focus();
			  return false;			
			}else if(referer_no=="")  {
			  alert("Enter referer contact number");
			  $("#referer_no").focus();
			  return false;
			}else
			{
				var dataStr = 'referer_name='+referer_name+'&referer_no='+referer_no;						
				$.ajax({
					url:'includes/new_referer_insert.php',
					type:'post',
					data:dataStr,
					success:function(st)  {										
						alert(st);			
						reset_fields();
					} 
				});   
		    }
	});
	var reset_fields = function() {
		//$('#employeeid').val('');
		$('#referer_name').val('');
		$('#referer_no').val('');
		
		$('#referer_name').focus();
		
	}
});	
</script>

<div id="content" class="box">

		<input type="hidden" id="branchid" value="<?php echo $branchid; ?>"/>
<fieldset>
	<legend>New Refferer </legend>
    <table width="81%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th width="0%" valign="top">Name:&nbsp;&nbsp;</th>
			<td width="0%"><input size="30%" type="text" name="referer_name" id="referer_name" class="inp-form"/></td>
			<td width="0%"></td>
			<th width="0%" valign="top"> Contanct No:</th>
		    <td width="0%"><input size="30%" type="text" name="referer_no" id="referer_no" class="inp-form"/></td>
		</tr>
    </table>				
	
</fieldset>    
    <input type="button" id="referer_sub_btn" name="referer_sub_btn" class="form-submit" />
</div>