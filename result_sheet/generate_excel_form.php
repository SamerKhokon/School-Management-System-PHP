	<script type="text/javascript">
	$(document).ready(function(){
	   
		 
		$("#class_id").change(function()
		{
		    var class_id = $("#class_id").val();
			var branchid = $("#branchid").val();
			if(class_id !="") 
			{
			  $.ajax({
			    type:"post" ,
				url:"includes/section_fetch.php",
				data:"class_id="+class_id+"&branch_id="+branchid ,
				success:function(st){
						$("#section_id").html(st);
				}
			  });
			}
		});
		
		$("#excel_generate").click(function()		
		{		
			   var term_id   = $("#term_id").val();
			   var class_id  = $("#class_id").val();
			   var branchid  = $("#branchid").val();
			   var section_id = $("#section_id").val();
			  
			   var dataStr    = "term_id="+term_id+"&class_id="+class_id+"&branchid="+branchid+"&section_id="+section_id;
			   
			   $.ajax({
			       type:"post" ,
				   url:"includes/generate_excel_mark_setting.php" ,
				   data:dataStr ,
				   success:function(st){
				        $("#status_span").html("Sccessfully generated excel file.");
				         $("#download_div").html(st);						 
				   }				   
			   });	
		});		
	});
	</script>
	<div id="content" class="box">
 <?php require_once("../db.php"); 
			session_start();
 $branchid = $_SESSION['LOGIN_BRANCH'];
			?>
	  <fieldset >
           <legend>	  <h3 >Generate Excel Mark</h3>	  	  </legend>
	  	    <input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	  
			<table  width="100%"  border="0" cellpadding="0" cellspacing="0">
			   <tr>
			     <th>Term </th>
				 <td>
						<select id="term_id"   class="styledselect-normal">
				                 <option value="Term1">Term 1 </option>
							     <option value="Term2">Term 2 </option> 
								 <option value="Term3">Term 3 </option> 
						</select>
					</td>
			     <th>Class</th >
				 <td>
						<select id="class_id"   class="styledselect-normal">
						 <option value="">Select Class</option> 
						   <?php  
									$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 				
									while ($row=mysql_fetch_array($qry))
									{						   
						   ?>						
				                 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>								 
							<?php } ?>	 
						</select>
					</td>																	
					
			     <th>Section </th>
				 <td>
						<select id="section_id"  class="styledselect-normal">				               							 
						</select>
				  </td>						

			   </tr>
			   <tr><td>&nbsp;</td></tr>
			   <tr>
				  <td>&nbsp;</td>
			     <td><input type="button" id="excel_generate" class="form-submit" value="generate"/></td>
				  <td>&nbsp;</td>
			   </tr>
			</table>
		</fieldset>
		
		<br/>
		<span id="status_span" style="font-size:14px;"></span>
		
		<br/>
		<div id="download_div"></div>	
</div>		