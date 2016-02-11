<script type="text/javascript">
  $(document).ready(function()  {

        $('#exam_mark_datatable').load('includes/exam_mark_setting_datatable_by_ajax.php',function(){});
  
  
		$("#roll_id").keypress(function(ex)  {
		       if(ex.which == 13 )   {
			       $("#subject_id").focus();
			   }
		});
		$("#subject_id").change(function(){
		     $("#subjective_mark").focus();
		});
		$("#subject_id").keypress(function(ex){
		       if(ex.which == 13 ) {
					$("#subjective_mark").focus();	
			   }
		});
		$("#subjective_mark").keypress(function(ex){
               if(ex.which == 13) {
			        var subjective_mark = $("#subjective_mark").val();
					if(subjective_mark=="") {
					  alert("enter subjective mark");
					  $("#subjective_mark").focus();
					  return false;
					}else{
					  $("#objective_mark").focus();
					}
			   }		
		});
		$("#objective_mark").keypress(function(ex){
		       if( ex.which == 13) {
			      var objective_mark = $("#objective_mark").val();
				  if(objective_mark == "") {
				     alert("enter objective mark");
                     $("#objective_mark").focus();					 
					 return false;
				  }else{
				     $("#ct_mark").focus();
				  }
			   }
		});
		$("#ct_mark").keypress(function(ex){
		       if(ex.which == 13) {
			      var ct_mark = $("#ct_mark").val();
				  if(ct_mark == "") {
				     alert("enter ct mark");
					 $("#ct_mark").focus();
				      return false;
				  }else{
							var branchid            = $("#branchid").val();
							var term_id              = $("#term_id").val();
							var class_id             =  $("#class_id").val();
							var section_id          = $("#section_id").val();
							var roll_id                = $("#roll_id").val();
							var subject_id          = $("#subject_id").val();
							var subjective_mark = $("#subjective_mark").val();
							var objective_mark   = $("#objective_mark").val();
                            var dataStr  = 'branchid='+branchid+'&term_id='+term_id+'&class_id='+class_id+'&section_id='+section_id+'&roll_id='+roll_id+'&subect_id='+subject_id+'&subjective_mark='+subjective_mark+'&objective_mark='+objective_mark+'&ct_mark='+ct_mark;
                           
						   $.ajax({
						       type:'post' ,
							   url:'includes/exam_mark_setting_entry_by_ajax.php' ,
							   data:dataStr ,
							   cache:false,
							   success:function(st) {
							        alert(st);
								   	$("#subject_id").val(0);
									$("#subjective_mark").val('');
									$("#objective_mark").val('');
									$("#ct_mark").val('');
									$("#subject_id").focus();
							   }
						   });						
							 
                    return false;
				  }
			   }
		});
        $("#mart_set").click(function() {
					var branchid            = $("#branchid").val();
					var term_id              = $("#term_id").val();
					var class_id             =  $("#class_id").val();
					var section_id          = $("#section_id").val();
					var roll_id                = $("#roll_id").val();
					var subject_id          = $("#subject_id").val();
					var subjective_mark = $("#subjective_mark").val();
					var objective_mark   = $("#objective_mark").val();
					var ct_mark             = $("#ct_mark").val();
					
					var dataStr =  'branchid='+branchid+'&term_id='+term_id+'&class_id='+class_id+'&section_id='+section_id+'&roll_id='+roll_id+'&subect_id='+subject_id+'&subjective_mark='+subjective_mark+'&objective_mark='+objective_mark+'&ct_mark='+ct_mark;
                           				
				   $.ajax({
					   type:'post' ,
					   url:'includes/exam_mark_setting_entry_by_ajax.php' ,
					   data:dataStr ,
					   cache:false,
					   success:function(st) {
							alert(st);
							$("#subject_id").val(0);
							$("#subjective_mark").val('');
							$("#objective_mark").val('');
							$("#ct_mark").val('');
							$("#subject_id").focus();
					   }
				   });										 
			return false;				
		});
  });
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Exam Marks Entry</legend>
			    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
								<tr>
								  <th>Term</th>
									<td><select  id="term_id"  class="styledselect-normal">
												<option  value="1">Term1</option>
												<option  value="2">Term2</option>
												<option  value="3">Term3</option>
											</select>
									</td>					
									 <th>Class :</th>
									 <td>
									 <select id="class_id"  class="styledselect-normal">
									 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
										while ($row=mysql_fetch_array($qry)){ ?>
											 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
										<?php }  ?>	 
										
									 </select>						 
									 <!--  class="inp-form" -->
									 </td>
									 <th>Section :</th>
									 <td>
									 <select id="section_id"   class="styledselect-normal">
											 <option value="A">A</option>
											 <option value="B">B</option>
											 <option value="C">C</option>
									 </select>						 
									 </td>
							   </tr>   
							   <tr><td colspan="9">&nbsp;</td></tr>
								<tr>	
									 <th>Roll:</th> 
									 <td >   
											 <select id="roll_id"  name="roll_id" class="styledselect-normal">
											  <?php   
											        $str = mysql_query("SELECT class_roll FROM std_class_student_info WHERE branch_id=$branchid");
													 while($rs = mysql_fetch_array($str) )  {
											  ?>
													<option value="<?php echo $rs[0];?>"><?php echo $rs[0];?></option>
													<?php   } ?>
											 </select>
									 </td> 
									 <th>Subject:</th> 
									 <td>   
											<select id="subject_id"  name="subject_id" class="styledselect-normal">							
											<?php     
													$str = mysql_query("SELECT id,subject_name FROM std_subject_config WHERE branch_id=$branchid");
													while($res = mysql_fetch_array($str) )    {                                              
											?>
													<option value="<?php echo $res[0];?>"><?php echo $res[1];?></option>
											<?php } ?>		
											</select>
									 </td>
								 </tr>
								 							   <tr><td colspan="9">&nbsp;</td></tr>
								<tr>	
									 <th>Subjective:</th> 
									 <td><input type="text" class="inp-form" id="subjective_mark"/></td>
								
									 <th>Objective:</th> 
									 <td><input type="text"  class="inp-form" id="objective_mark"/></td>
								</tr>
								<tr>	
									 <th>Class Test:</th> 
									 <td> <input type="text"  class="inp-form" id="ct_mark"/></td>
									 <td colspan="4"></td>					                      
								</tr>		
								<tr>	
									 <th>&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="mart_set">Submit</button> </td>
									 <td colspan="4"></td>					                     
								</tr>		
				</table>					
				<br/>		
				<!-- <img src="./../upload/Penguins.jpg" /> -->
				 <!-- <form method="post" action="?menu_id=11&nev=exam_mark_setting_file_upload" enctype="multipart/form-data">				   				
				    <table>
						    <tr>				      
								 <td>Uload your file: &nbsp; &nbsp;</td>
								 <td><input type="file" name="excel_file"/></td>
								 <td colspan="4"></td>
						    </tr>
						   <tr><td colspan="6"><input type="submit" value="upload"/></td></tr>				   
				    </table>
				</form> -->
	</fieldset>	
            <fieldset>
			        <legend>Exam Marks</legend>
         				<div  id="exam_mark_datatable"></div>
            </fieldset>
	
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->