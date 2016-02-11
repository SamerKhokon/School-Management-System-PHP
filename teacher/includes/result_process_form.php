<script type="text/javascript">
  $(document).ready(function()  {
		
		$("#result_process_btn").click(function() {
		
		        var class_id = $('#class_id').val();
				var term_id  = $('#term_id').val();
                var year_id  = $("#year_id").val();				
				var branchid = $('#branchid').val();
				 if(term_id==0) {
				    alert("Please select term");
					return false;				
				}else if(class_id==0){
				    alert("Please select class");
					return false;
				}else {
					$('#result_process_datatable').load('includes/result_process_by_ajax.php',
					{ 
					  'term_id':term_id,					
					  'class_id':class_id,
					  'year_id':year_id,
					  'branchid':branchid
					},
					function(){});					
					//alert(dataStr);
				}		    	
		});
  });
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	
	  <fieldset><legend>Student Result Processing</legend>
						<table width="100%"  border="0" cellpadding="0" cellspacing="0">	 

								<tr>								
									 <th>Term</th>
									 <td>
											 <select id="term_id"  class="styledselect-normal">
														 <option value="0" selected>select term</option>
														  <option value="1">Term1</option>										
														 <option value="2">Term2</option>										
														 <option value="3">Term3</option>										
											 </select>						 
											 <!--  class="inp-form" -->
									 </td>									 									 																
									 <th>Class</th>
									 <td>
										 <select id="class_id"  class="styledselect-normal">
													 <option value="0" selected>select class</option>									 
										 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
											while ($row=mysql_fetch_array($qry)){ ?>
												 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
											<?php }  ?>	 
											
										 </select>						 
										 <!--  class="inp-form" -->
									 </td>
								</tr>											
                                <tr><td colspan="4">&nbsp;</td></tr>
								<tr>								
									 <th>Year</th>
									 <td>
											 <select id="year_id"  class="styledselect-normal">
														 <option value="<?php echo date('Y');?>" selected><?php echo date('Y');?></option>
														 <?php
														     for($i=2000;$i<=2050;$i++) {
															      if($i != date('Y')){  ?>
														    <option value="<?php echo $i;?>" ><?php echo $i;?></option>																    
															<?php	  }
															 }
														 ?>
											 </select>						 
											 <!--  class="inp-form" -->
									 </td>
                                     <td colspan="2">&nbsp;</td>									 
								</tr>											
								
								
      						<tr><td colspan="4">&nbsp;</td></tr>
							<tr>	
								     <td>&nbsp;</td>
									 <td> <button type="button"  class="form-submit" id="result_process_btn">Promotion</button> </td>
									 <th colspan="2">&nbsp;</th> 
								</tr>										
                        </table>		
	    </fieldset>
            <fieldset>
			        <legend>Result History</legend>
         				<div  id="result_process_datatable"></div>
            </fieldset>	
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->