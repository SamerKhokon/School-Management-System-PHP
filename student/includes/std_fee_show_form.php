<div id="content" class="box">
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php  $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Student Fee </legend>
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
									 <!--  class="inp-form" -->
									 </td>
								</tr>
								<tr>	
									 <th>Roll</th> 
									 <td> <input type="test"  class="inp-form" id="roll"/> </td>
								</tr>	
								<tr>	
									 <th>Month</th> 
									 <td> <input   class="inp-form" id="month_name"  onclick='scwShow(this,event);' 
									 value="<?php echo date('d-m-Y') ?>"   readonly="readonly"/>
									                  
									 </td>
								</tr>									
								<tr>	
									 <td> &nbsp; </td>
								</tr>									
								<tr>	
									 <th>&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="fee_see">Submit</button> </td>
								</tr>										
							</table>	 
						</td>		 
						<td>		 
					</td>
                </tr>
             </table>				
				<br/>		
	</fieldset>	
	

	<fieldset>
	      <div id="fee_history_display"></div>
	</fieldset>
	
    </div>
</div>
<!-- /content -->
<script type="text/javascript">
   $(document).ready(function() {
      $("#fee_see").click(function() {	  
				 var class_id         = $("#class_id").val();
				 var branchid         = $("#branchid").val();
				 var roll                  = $("#roll").val();
				 var month_name = $("#month_name").val();
				 
				 var dataStr = "class_id="+class_id +"&branchid="+branchid+"&roll="+roll+"&month_name="+month_name;
				 
				 if( class_id == "" )   {
					alert("selecte any class");
					return false;
				 } else if( month_name == "" )   {
					alert("select any month");
					return false;
				 } else {					
                        $.ajax({
						    type:"post" ,
							url:"includes/std_fee_show_form_action_by_ajax.php",
							data:dataStr , 
							cache:false ,
							success: function(st)  {
									//alert(st);		
								 $("#fee_history_display").html(st);
							}
						});				 
						
				 }
	  });
   });
</script>