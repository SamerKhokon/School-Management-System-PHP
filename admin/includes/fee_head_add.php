<script type="text/javascript">
<script type="text/javascript">
 function data_loading() {
     $('#data_loading_div').load('includes/fee_head_list.php',function(){});
 }
 $(document).ready(function(){
    data_loading();
    $("#feename").focus();
	$("#feename").keydown(function(event){
		if(event.keyCode == 13 ){									
			$("#category").focus();									  
		} 
	});
	$("#category").keydown(function(event){
		if(event.keyCode == 13 ){									
			$("#class").focus();									  
		} 
	});	
	$("#class").keydown(function(event){
		if(event.keyCode == 13 ){									
			$("#amount").focus();									  
		} 
	});
	$("#amount").keydown(function(event){
		if(event.keyCode == 13 ){									
			$("#search_btn").focus();									  
		} 
	});	
	$("#search_btn").click(function(event){
	   var feename = $('#feename').val();
	   var category = $('#category').val();
	   var branch_id = $('#branch_id').val();
	   var dataStr = 'feename='+feename+'&category='+category+'&branch_id='+branch_id;
	   alert(dataStr);
	   data_loading();
	});
});	
</script>

<div id="content" class="box">
    <fieldset>
        <legend>Fee Adding</legend>
        <table width="30%" border="0" cellpadding="0" cellspacing="0" >
		<tr>
            <th width="5%" valign="top">Fee Name:</th>
			<td width="5%"><input size="10%" type="text" name="feename" id="feename" class="inp-form"/></td>
		</tr>
		<tr>	
            <th width="5%" valign="top">Category:</th>
			<td width="5%"><input size="10%" type="text" name="category" id="category" class="inp-form"/></td>
        </tr>
		<tr>	
            <th width="5%" valign="top">Class:</th>
			<td width="5%"><select name="class" id="class" class="inp-form">
			  <option selected=selected>select class</option>
			  <option value="1">class 1</option>
			  <option value="2">class 2</option>
			  <option value="3">class 3</option>
			  <option value="4">class 4</option>
			  <option value="5">class 5</option>
			  <option value="6">class 6</option>
			  <option value="7">class 7</option>
			  <option value="8">class 8</option>
			  <option value="9">class 9</option>
			</select>
			</td>
        </tr>		
		<tr>	
            <th width="5%" valign="top">Amount:</th>
			<td width="5%"><input size="10%" type="text" name="amount" id="amount" class="inp-form"/></td>
			<input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
        </tr>				
		<tr>
		 <th width="5%" valign="top"></th>
		 <td>
		 <input type="button" id="search_btn" name="sub_btn" class="form-submit" />
		 </td>
		</tr>
		</table>
		
</fieldset>    
    
	<div id="data_loading_div"></div>
	
</div>