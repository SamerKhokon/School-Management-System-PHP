<script type="text/javascript">
 $(document).ready(function(){
		$("#fee_name").focus();              
		var branchid="<?php echo $branchid ?>";              
		$("#jq_tbl").load('includes/table/class_feehead_tbl.php?branchid='+branchid);
		$("#fee_name").keydown(function(event)                      {
			 if(event.keyCode == 13 ){
					$("#cate_id").focus();
				}                        
		});
		 $("#cate_id").keydown(function(event)                     {
			 if(event.keyCode == 13 ){
					 $("#sub_btn").focus();
				}                        
		});
		$("#sub_btn").click(function(event)    {
			var result=window.confirm("click Ok or Cancel");                            
			if(result)  {
				var fee_name=$("#fee_name").val();
				var category=$("#cate_id").val();
				var branch_id=	"<?php echo $branchid; ?>";                            
			
				$.ajax({
						url:'includes/table/class_fee_insert.php',
						type:'post',
						data:'&fee_name='+fee_name+'&category='+category+'&branch_id='+branch_id,
					   success:function(htmData)     {                                
						   alert(htmData);                                   
						   $("#jq_tbl").load('includes/table/class_feehead_tbl.php?branchid='+branchid);
						   $("#fee_name").val('');
						   $("#cate_id").val('');
						   }, error:function(FData)      {
							alert(FData);
					   }
				});
			}                    
		});
 });	
</script>
<div id="content" class="box">
<fieldset class="login">
<legend>Student Class Details</legend>
<table border="0" cellpadding="0"  cellspacing="0">
			<tr>
				<th valign="top">Fee Name: &nbsp;&nbsp;</th>
				<td>
				<input type="text" id="fee_name" name="fee_name" class="inp-form" />		         
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
			 <th valign="top">Category</th>
			 <td>
			       <select class="styledselect-normal" id="cate_id" name="cate_id">
				   <option>Fixed</option>
				   <option>others</option>
				   </select> 			 
			 </td>			 
			 </tr>		
			<tr>
            	<td height="6"></td>
            </tr>		
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" name="submit" class="form-submit" id="sub_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>		
	</table>
</fieldset>

<table width=100% id="jq_tbl">
</table>
</div>