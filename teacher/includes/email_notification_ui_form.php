<script type="text/javascript">
 $(document).ready(function(){
    var email_field = $("#ur_email");
	$(email_field).attr("disabled",true);
	
	$("#email_notification_btn").click(function(){	
		var class_id      = $("#class_id").val();
		var email_subject = $("#email_subject").val();
		var ur_email      = $("#ur_email").val();  
		var ur_message    = $("#ur_message").val();  
		var dataStr = "class_id="+class_id+"&email_subject="+email_subject+"&ur_email="+
		ur_email+"&ur_message="+ur_message;
				
		if(class_id=="0"){
		   alert("Select Class");
		   return false;
		}else if(email_subject==""){
		   alert("Email Subject");
		   $("#email_subject").focus();
		   return false;
		}else if(ur_message=="") {
		   alert("Enter ur message");
		   $("#ur_message").focus();
		   return false;
		}else{
		
		   /*
		   $.ajax({
		      type:"post" ,
			  url: "includes/email_notification_send.php" ,
			  data:dataStr ,
			  cache:false,
			  success:function(st){
			      alert(st);
			  }
		   });*/
		}
		
		
		//alert(dataStr);
	});	
});	
</script>

<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Email Notification</legend>
			
						<table width="50%"  border="1" cellpadding="0" cellspacing="0">
							<tr>	
									 <th>Class</th>
									 <td>
									 <select id="class_id"  class="styledselect-month">
									   <option></option>
									 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
										while ($row=mysql_fetch_array($qry)){ ?>
											 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
										<?php }  ?>	 
										
									 </select>						 
									 <!--  class="inp-form" -->
									 
									 </td>
							</tr>
                            <tr>							
								 <th>Subject</th>
								 <td><textarea id="ur_subject" rows="4" cols="20"></textarea>											 </td>
							</tr>   						
							<tr> <th>&nbsp;</th> </tr>	 
							<tr>		
								 <th>Email:</th> 
								 <td><textarea id="email_id"  rows="4" cols="20"></textarea></td> 
							</tr>
								 
							<tr>	
								 <th >Message:</th> 
								 <td ><textarea rows="4" cols="20" id="subjective_mark"></textarea></td>
							</tr>
							<tr> <th>&nbsp;</th> </tr>	 
							<tr>
                                 <td>&nbsp;</td>							
								<input type="hidden" id="slno" value=""/> 
								 <td > <button type="button"  class="form-submit" id="mart_set">Submit</button>
									<button type="button"  class="form-reset" id="mart_reset">Reset</button>
								 </td>																 
							</tr>		
						</table>  <!-- end form -->
					</fieldset>							
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->