<script type="text/javascript">
 $(document).ready(function(){
	
	$("#email_notification_btn").click(function(){	
		var class_id      = $("#class_id").val();
		var ur_mobileno   = $("#ur_mobileno").val();
		var ur_message    = $("#ur_message").val();
	});	
});	
</script>

<div id="content" class="box">

  <input type="hidden" id="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH']; ?>"/>
  
  
  
  
  
  
      <fieldset>
		    <legend>SMS Notification</legend>
			
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
							<tr> <th>&nbsp;</th> </tr>	 
							<tr>		
								 <th>Mobileno:</th> 
								 <td><textarea id="mobileno_id"  rows="4" cols="20"></textarea></td> 
							</tr>
								 
							<tr>	
								 <th >Message:</th> 
								 <td ><textarea rows="4" cols="20" id="subjective_mark"></textarea></td>
							</tr>
							<tr> <th>&nbsp;</th> </tr>	 
							<tr>	<td>&nbsp;</td>
							
								<input type="hidden" id="slno" value=""/> 
								 <td > <button type="button"  class="form-submit" id="mart_set">Submit</button>
									<button type="button"  class="form-reset" id="mart_reset">Reset</button>
								 </td>																 
							</tr>		
						</table>  <!-- end form -->
					</fieldset>							
  
  
  
  
  
  
  

</div>



