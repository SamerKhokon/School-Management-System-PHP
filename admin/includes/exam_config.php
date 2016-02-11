
<script type="text/javascript">

$(document).ready(function(){
  $("#exam_name").focus();
									
  $("#list").load('includes/table/exam_config_tbl.php');
			$("#exam_name").keydown(function(event)
			 {
				 if(event.keyCode == 13 )
					{
					if($("#exam_name").val()=="")
					  {
					   
					   $("#err_rep_1").fadeOut(200);
					   $("#err_rep_1").fadeIn(1200);

					   
					  }
					
					
					else
					{
					$("#period").focus();
					}
					}
			});
			$("#period").keydown(function(event)
			{
			  if(event.keyCode == 13 )
					{
			 		 if($("#period").val()=="")
					 
					    {
						    $("#err_rep_2").fadeOut(200);
					 	    $("#err_rep_2").fadeIn(1200);
						}
					 
					 else
					 {
					 $("#period").focus();
			  		 }
					}
			});
			$("#period").keydown(function(event)
			{
				if(event.keyCode == 13 )
					{
			  $("#prefix").focus();
			  }
			 }) 
			$("#prefix").keydown(function(event)
			{
				if(event.keyCode == 13 )
					{
					    if($("#prefix").val()=="")
						  {
						    $("#err_rep_3").fadeOut(200);
					 	    $("#err_rep_3").fadeIn(1200);
						  
						  }
					
						else
						{
						$("#exam_btn").focus();
						}
					} 
			});
		
			$("#exam_btn").click(function(event)
			{
			 var result = window.confirm("Click OK or Cancel.");
					 
					 if(result)
						{
							var exam_name=$("#exam_name").val();
							var period=$("#period").val();
							var prefix= $("#prefix").val();
						
							var branchid=<?php echo $branchid; ?>;
							//alert(branchid);
							
								  
					   $.ajax({
							  url:'includes/table/exam_config_tbl_insert.php',
							  type:'post',
				 data:'&exam_name='+exam_name+'&prefix='+prefix+'&period='+period+'&branchid='+branchid,
							 
							  success:function(htmData)
								   {
									  alert(htmData);
									  
									
									  $('#exam_name').val('');
									  $('#period').val('');
									
									  
									  
									  $('#prefix').val('');
									//  $('#address').val('');
									 //  $("#name").focus();
					$("#jq_tbl").load('includes/table/exam_config_tbl.php');	
								   

									  },
							  error:function(FData)
								   {
									 alert(FData);
								   } 
							   });
					} 
			});
		});	

</script>


<div id="content" class="box">

<fieldset class="login">
<legend>Exam Details</legend>
<table border="0" cellpadding="0" cellspacing="0" >
			
		
			    
			<tr>	<th valign="top">Exam name:</th> 				
			<td>	<input  type="text" id="exam_name" name="final_mark" class="inp-form"></td>
				<td>
			    <div class="error-left"></div>
			    <div class="error-inner"><p id="err_rep_2">This field is required.</p></div>
			</td></tr>
                 <tr>
            	<td height="6"></td>
            </tr>
			    
			<tr>	<th valign="top">Period:</th>
			<td>	<input  type="text" id="period" name="period" class="inp-form">	</td>
			
			
			
			</tr>		
			
	
				
			<tr>	<th valign="top">Prefix:</th>
			<td>	<input  type="text" id="prefix" name="prefix" class="inp-form">	</td>
			
						<td><div class="bubble-left"></div>
						<div class="bubble-inner" id="err_rep_4">Select class time</div>
						<div class="bubble-right"></div></td>
			
			</tr>	
				
				
				
				<input type="hidden" id="branchid" name="branchid" value="<?php echo $branchid;?>">
				
				     <tr>
            	<td height="6"></td>
            </tr>
			<tr><td>	 <button id="exam_btn" class="form-submit">submit</button></td>
			             <td> <button id="res_btn" class="form-reset">submit</button></td>
			</tr>
		</table>		
			
</fieldset>



<table id="list" width="100%">


</table>  
<div id="pager" class="x3" width=100%"></div>  
 

</div>