<div id="content" class="box">
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php  $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>SMS Notification </legend>
			    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
				             
					<tr><td>		 
						<table width="60%"  border="0" cellpadding="0" cellspacing="0">	 
								<tr>
									 <th>Class</th>
									 <td>
									 <select id="class_id"  class="styledselect-normal">
									 <option></option>
									 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
										while ($row=mysql_fetch_array($qry)){ ?>
											 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
										<?php }  ?>	 										
									 </select>						 
									 </td>
								</tr>
                                 <tr>								
									 <th>Guardian Mobileno</th> 
									 <td> <textarea   id="mobileno" readonly="true"></textarea></td>
								</tr>	
								<tr>	
									 <td> &nbsp; </td>
								</tr>									
								<tr>	
									 <th>&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="sms_notification_send">Submit</button> </td>
								</tr>										
							</table>	 
						</td>		 
						<td>		 
					</td>
                </tr>
             </table>				
				<br/>		
	</fieldset>	
	
	
    </div>
</div>
<!-- /content -->
<script type="text/javascript">
 $(document).ready(function(){
        //guardian_mobileno_fetch_by_ajax.php
		
		$("#class_id").change(function(){
			   var class_id = $("#class_id").val();		   
			   if(class_id == "" ) {
				  alert("Please select any class");
				  return false;
			   } else{
					   $.ajax({
							  type:"post" , 
							  url:"includes/guardian_mobileno_fetch_by_ajax.php" ,
							  data:"class_id="+class_id ,
							  cache:false , 
							  success:function(st) {
									$("#mobileno").val(st);  
							  }
					   });
				}	   
		});	
		$("#sms_notification_send").click(function(){	
		     var class_id = $("#class_id").val();
			 var mobileno = $("#mobileno").val();
		}); 
 });
</script>