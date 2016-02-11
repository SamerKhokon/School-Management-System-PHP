<script type="text/javascript">
  $(document).ready(function()  {
		
		$("#fee_collection_btn").click(function() {
		        var class_id     = $('#class_id').val();
				var roll_id        = $('#roll_id').val();
                var month_id   = $("#month_id").val();
			    var amount_id = $("#amount_id").val();				
				var branchid    = $('#branchid').val();
				var dataStr = "class_id="+class_id+"&roll_id="+roll_id+"&month_id="+month_id+
				"&amount_id="+amount_id+"&branchid="+branchid;
				alert(dataStr);
				
		      /*
		   
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
				}		    	*/
		});
  });
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	
	  <fieldset><legend>Student Result Processing</legend>
						<table width="100%"  border="0" cellpadding="0" cellspacing="0">	 

								<tr>								
									 <th>Roll</th>
									 <td>
											<input type="text" class="inp-form" id="roll_id"/>						 
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
									   <th>Month : </th>
									   <td><input onclick='scwShow(this,event);'  class="inp-form"  
									   id="month_id" name="month_id" value="<?php echo date('d-m-Y') ?>" readonly="readonly" /></td>
									   <td>                          
										<td >Amount</td>									 
										<td><input type="text" class="inp-form" id="amount_id"/></td>						 										
								</tr>											
								
								
      						<tr><td colspan="4">&nbsp;</td></tr>
							<tr>	
								     <td>&nbsp;</td>
									 <td> <button type="button"  class="form-submit" id="fee_collection_btn">Fee Collection</button> </td>
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