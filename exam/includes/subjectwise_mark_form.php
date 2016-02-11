<div id="content" class="box">
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php 							 $branchid = $_SESSION['LOGIN_BRANCH']; 																	?>
    <fieldset>
		    <legend>Marks </legend>
					<table width="60%"  border="0" cellpadding="0" cellspacing="0">	 
							<tr>
								  <th>Term</th>
									<td><select  id="term_id"  class="styledselect-normal">
									           <option  value="0" selected>Select Term</option>
												<option  value="1">Term1</option>
												<option  value="2">Term2</option>
												<option  value="3">Term3</option>
											</select>
									</td>					
									 <th>Class</th>
									 <td>
									 <select id="class_id"  class="styledselect-normal">
											<option value="0" selected>select class</option>
											<?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
														while ($row=mysql_fetch_array($qry) ) 		{      ?>
															<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
											<?php  }  ?>	 										
									 </select>						 
									 <!--  class="inp-form" -->
									 </td>
							</tr>
								
							<tr>	
									 <th>Roll</th> 
									 <td> <input type="test"  class="inp-form" id="roll"/> </td>
									 <th>Year</th> 
									 <td> 
											<select class="styledselect-normal" id="year_id">
											    <?php  $i = 2000;
													 while($i <= 2050)    {         ?>
															<option value="<?php echo $i;?>"><?php echo $i;?></option>
												<?php   }                        ?>
											</select>
									 </td>									 
							</tr>	
								
							<tr><td colspan="4"> &nbsp; </td></tr>									
								
							<tr>	
									 <th colspan="3">&nbsp;</th> 
									 <td><button type="button"  class="form-submit" id="mark_see">Submit</button></td>
							</tr>										
					</table>	 
							
				<br/>			
	     				<div  id="mark_see_datatable"></div>
            </fieldset>	
</div>

<!-- /content -->

<script type="text/javascript">
 $(document).ready(function()   {
         
   
		$("#mark_see").click(function()  {		
				var term_id  = $("#term_id").val();
				var class_id = $("#class_id").val();				
				var roll          = $("#roll").val();
				var year_id   = $("#year_id").val();
				var branchid = $("#branchid").val();
				var dataStr   = "term_id="+term_id+"&class_id="+class_id+"&roll="+roll+"&year_id="+year_id+"&branchid="+branchid;
				$("#mark_see_datatable").load("includes/subjectwise_mark_list_by_ajax.php",
				{  "term_id":term_id,"class_id":class_id,"roll":roll,"year_id":year_id,"branchid":branchid	 }
				,function(){});
		});
		
 });
</script>