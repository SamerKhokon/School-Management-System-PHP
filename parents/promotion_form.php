<script type="text/javascript">
  $(document).ready(function()  {
        $('#promotion_datatable').load('includes/promotion_datatable_by_ajax.php',{'class_id':'all'},function(){});
		
		$("#class_id").change(function(){
		   var class_id  = $("#class_id").val();
		   if(class_id!="") {
		        $('#promotion_datatable').load('includes/promotion_datatable_by_ajax.php',{'class_id':class_id},function(){});
		   }else{
		        $('#promotion_datatable').load('includes/promotion_datatable_by_ajax.php',{'class_id':'all'},function(){});
		   }
		});
		
		$("#set_promotion").click(function(){
		        var class_id = $('#class_id').val();
				$('#promotion_datatable').load('includes/promotion_datatable_by_ajax.php',{'class_id':class_id},function(){});
		});
  });
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	
	  <fieldset><legend>Student Promotion</legend>
						<table width="100%"  border="0" cellpadding="0" cellspacing="0">	 
								<tr>
								
									 <th>Term</th>
									 <td>
									 <select id="term_id"  class="styledselect-normal">
											      <option value="1">Term1</option>										
											     <option value="2">Term2</option>										
											     <option value="3">Term3</option>										
									 </select>						 
									 <!--  class="inp-form" -->
									 </td>									 									 								
								
									 <th>Class</th>
									 <td>
									 <select id="class_id"  class="styledselect-normal">
									 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
										while ($row=mysql_fetch_array($qry)){ ?>
											 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
										<?php }  ?>	 
										
									 </select>						 
									 <!--  class="inp-form" -->
									 </td>
								</tr>			

                                <tr>									
									 <th>Section</th>
									 <td>
									 <select id="section_id"  class="styledselect-normal">
											      <option value="A">A</option>										
											     <option value="B">B</option>										
											     <option value="C">C</option>										
											     <option value="D">D</option>										
												 <option value="E">E</option>										
												  <option value="F">F</option>										
									 </select>						 
									 <!--  class="inp-form" -->
									 </td>									 

									 <th>Roll</th>
									 <td><input type="text" id="rollno" class="inp-form" /></td>									 

									 
								</tr>
								<tr><td colspan="5">&nbsp;</td></tr>
								<tr>	
									 <th colspan="3">&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="set_promotion">Promotion</button> </td>
								</tr>										
                        </table>		
	    </fieldset>
            <fieldset>
			        <legend>Promoted and Not Promoted History</legend>
         				<div  id="promotion_datatable"></div>
            </fieldset>
	
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->