	<script type="text/javascript">
	$(document).ready(function(){
	     $("#excel_generate").click(function(){
		        var branchid    = $("#branchid").val();
				var term_id      = $("#term_id").val();
				var section_id = $("#section_id").val();
				var class_id     = $("#class_id").val();
				var dataStr = "branchid = "+branchid+"&term_id="+term_id+"&section_id="+section_id+"&class_id="+class_id;
				
		 });
	});
	</script>
	<div id="content" class="box">

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
			     <th>Section </th>
				 <td>
						<select id="section_id"  class="styledselect-normal">
				                 <option value="A">A </option>
							     <option value="B">B </option> 
								 <option value="C">C </option> 
								 <option value="D">D </option> 								 
								 <option value="E">E </option> 
								 <option value="F">F </option> 								 
						</select>
				  </td>						
			     <th>Class</th >
				 <td>
						<select id="class_id"   class="styledselect-normal">
						   <?php  
									$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 				
									while ($row=mysql_fetch_array($qry)){						   
						   ?>						
				                 <option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>								 
							<?php } ?>	 
						</select>
					</td>												
			   </tr>
			   <tr><td>&nbsp;</td></tr>
			   <tr>
				  <td>&nbsp;</td>
			     <td><input type="button" id="excel_generate" value="generate"/></td>
				  <td>&nbsp;</td>
			   </tr>
			   
			   
			</table>
		</fieldset>
</div>		