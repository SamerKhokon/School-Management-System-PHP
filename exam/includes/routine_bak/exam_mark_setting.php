<script type="text/javascript">
  $(document).ready(function()  {
        $('#exam_mark_datatable').load('includes/exam_mark_setting_datatable_by_ajax.php',
		{'roll':0,'class_id':0,'year':0,'term':0},function(){});
		$("#subject_id").change(function(){     $("#subjective_mark").focus();		});
		$("#subject_id").change(function(){	$("#roll_id").focus();		});
		$("#class_id").change(function(){
		    var class_id = $("#class_id").val();
			var branchid = $("#branchid").val();
			var dataStr = "class_id="+class_id+"&branchid="+branchid;
			if(class_id !="") {
				$.ajax({
				     type:"post" ,
					 url: "includes/class_loading_by_ajax.php" ,
					 data: dataStr , 
					 cache:false ,
					 success:function(st){
					    $("#subject_id").html(st);
						$("#roll_id").focus();
					 }
				});       					
			}else{
			   $("#subject_id").html("");
			}   
		});
		
		
		var data_grid = function() {
				$('#exam_mark_datatable').load('includes/exam_mark_setting_datatable_by_ajax.php',									{
						'roll':$("#roll_id").val(),
						'class_id': $("#class_id").val(),
						'year':$("#year_id").val(),
						'term': $("#term_id").val()
				},function(){});		
		}
		
	    $("#roll_id").keypress(function(ex)  {
		    if(ex.which == 13 )   
			{
			        var year       = $("#year_id").val();
			        var class_id   = $("#class_id").val();
					var subject_id = $("#subject_id").val();
					var branchid   = $("#branchid").val();
					var roll       = $("#roll_id").val();
					var term_id    = $("#term_id").val();
			        var dataStr    = "roll_id="+roll+"&class_id="+class_id+"&subject_id="+subject_id+"&branchid="+branchid;
					
					
					
					if(roll==""){
					  alert('Enter roll');
					  $('#roll_id').focus();
					  return false;
					}else if(class_id==""){
					   alert('Select class');
					   return false;
					}else if(year==""){
					  alert('Select year');
					  return false;
					}else if(term_id==""){
					  alert('Select term');
					  return false;
					}else			
					{
						data_grid();
					    $.ajax({
						     type: "post" ,
							 url:    "includes/mark_check_by_roll.php"  ,
							 data:  dataStr , 
							 cache: false ,
							 success: function(st)    
							 {
							    if (st==0){	
									$("#year_id").val($("#year_id").val());
									$("#term_id").val($("#term_id").val());
									$("#subjective_mark").val(' ');
									$("#objective_mark").val(' ');
									$("#ct_mark").val(' ');																	    
								}else{
									var parse = st.split("|");
									var sb = parse[0];
									var ob = parse[1];
									var ct = parse[2];
									var yr = parse[3];
									var pr = parse[4];
									
									$("#year_id").val(yr);
									$("#term_id").val(pr);
									$("#subjective_mark").val(sb);
									$("#objective_mark").val(ob);
									$("#ct_mark").val(ct);
									
								}											
								data_grid();								
							}
						});					
					}
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
					} 
					else{
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
				  var year_id       = $("#year_id").val();
				  var class_id             =  $("#class_id").val();
				  var section_id          = $("#section_id").val();
				  if(ct_mark == "") {
				     alert("enter ct mark");
					 $("#ct_mark").focus();
				      return false;
				  }else if(year_id==""){
				     alert("Please select year");
					 $("#year_id").focus();
					 return false;
				  }else if(class_id==""){
				     alert("select class");
					 return false;
				  }else if(section_id=="") {
				     alert("select section");
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
							var year_id              = $("#year_id").val();
                            var dataStr  = 'branchid='+branchid+'&term_id='+term_id+'&class_id='+class_id+'&section_id='+section_id+'&roll_id='+roll_id+'&subect_id='+subject_id+'&subjective_mark='+subjective_mark+'&objective_mark='+objective_mark+'&ct_mark='+ct_mark+"&year_id="+year_id;
                           
						if(roll_id!="" && subjective_mark!="" && year_id!="" && objective_mark!="") 
						{
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
											$("#year_id").val(year_id);
											$("#subject_id").focus();
											
											data_grid();
											$("#subjective_mark").focus();
									   }
								   });						
						}else{
						   alert("Please select year");
						} 
                    //return false;
				  }
			   }
			data_grid();
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
					var year_id             =  $("#year_id").val();
					
					var dataStr =  'branchid='+branchid+'&term_id='+term_id+'&class_id='+class_id+'&section_id='+section_id+'&roll_id='+roll_id+'&subect_id='+subject_id+'&subjective_mark='+subjective_mark+'&objective_mark='+objective_mark+'&ct_mark='+ct_mark+"&year_id="+year_id;
                           				
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
							
							data_grid();
					   }
				   });	

				   
			return false;				
		});
		$("#mart_reset").click(function(){
		        $("#class_id").val(0);
				$("#term_id").val(0);
				$("#year_id").val(0);
				$("#subject_id").html(' ');
				$("#roll_id").val('');
		       	$("#subject_id").val(0);
				$("#subjective_mark").val('');
				$("#objective_mark").val('');
				$("#ct_mark").val('');
		});
		
		$(".exam_mark_trace").live("click",function(){
		          var _id = $(this).attr('id');

				  $.ajax({
				     type: "post" ,
					 url: "includes/exam_mark_setting_single_row_fetching_by_ajax.php" ,
					 data:"id="+_id ,
					 cache:false ,
					 success:function(st) {
					    $("#subject_id option").remove(); 
					    //$class_id."|".$section."|".$stu_roll."|".$subject_code."|".$subjective."|".$objective."|".$ct."|".$year
						var parse = st.split("|");
						var classid   = parse[0];
						var sec        = parse[1];
						var stroll       = parse[2];
						var subcode = parse[3];
						var subname = parse[4];
						var sb          = parse[5];
						var ob          = parse[6];
						var ct           = parse[7];
                        var yr           =  parse[8];		
					    var subs      = parse[9];	
						var slsno = parse[10];
                        $("#slno").val(_id);
						$("#class_id").val(classid);
						$("#section_id").val(sec);
						$("#subject_id").html(subs);
						$("#subjective_mark").val(sb);
						$("#objective_mark").val(ob);
						$("#roll_id").val(stroll);
						$("#ct_mark").val(ct);
						$("#year_id").val(yr);
						
						data_grid();
					 }
				  }); 				 
		});
		
		$("#mart_update").click(function(){
					var slno                     = $("#slno").val();
					var class_id              = $("#class_id").val();
					var section_id           = $("#section_id").val();
					var subject_id           = $("#subject_id").val();
					var subjective_mark = $("#subjective_mark").val();
					var objective_mark   = $("#objective_mark").val();
					var ct_mark               = $("#ct_mark").val();
					var year_id                = $("#year_id").val();
					var stu_roll                = $("#roll_id").val();
					var branchid              = $("#branchid").val();
					var dataStr = "slno="+slno+"&class_id="+class_id+"&section_id="+section_id+"&subject_id="+subject_id+"&subjective_mark="+subjective_mark+"&objective_mark="+objective_mark+"&ct_mark="+ct_mark+"&year_id="+year_id+"&roll="+stu_roll+"&branchid="+branchid;
					
					$.ajax({
							type : "post" ,
							url : "includes/exam_mark_update_by_ajax.php" ,
							data : dataStr,
							cache : false ,
							success:function(st) {
								alert(st);
								data_grid();
							}
					});
		});
  });
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Exam Marks Entry</legend>
			
			    <table  width="100%"  border="1" cellpadding="0" cellspacing="0">
				  <tr>
				             <td><div  id="exam_mark_datatable"></div></td>						  						  
				             <td>&nbsp;</td>
			            <td ><br/>						
						<fieldset>
						   <legend>Marks Entry form</legend>
						
						<table width="50%"  border="1" cellpadding="0" cellspacing="0">
									<tr>	
                 							 <th>Class</th>
											 <td>
											 <select id="class_id"  class="styledselect-month">
											   <option value="">select class</option>
											 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
												while ($row=mysql_fetch_array($qry)){ ?>
													 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
												<?php }  ?>	 
												
											 </select>						 
											 <!--  class="inp-form" -->
											 </td>
											 <th>Section</th>
											 <td>
											 <select id="section_id"   class="styledselect-month">
													 <option value="A">A</option>
													 <option value="B">B</option>
													 <option value="C">C</option>
											 </select>						 
											 </td>
							        </tr>   						
							        <tr>         
							             <th>Year</th>
							             <td><select id="year_id" class="styledselect-month">
										            <option value="">select year</option>
										                 <?php for($i= 2000; $i<= 2025; $i++ ) {   ?>
														 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
														 
											<?php } ?>
										 </select></td>
							
										  <th>Term</th>
										  <td><select  id="term_id"  class="styledselect-month">
										            <option value="">select term</option>										                  
														<option  value="1">Term1</option>
														<option  value="2">Term2</option>
														<option  value="3">Term3</option>
													</select>
											</th>
											
							        </tr>
									<tr>		
											 <th colspan="1">Subject</th> 
											 <td colspan="3"><select id="subject_id"  name="subject_id" class="styledselect-normal"></select></td>										
									</tr>
									<tr> <th>&nbsp;</th> </tr>	 
									<tr>		
											 <th colspan="1">Roll:</th> 
											 <td  colspan="3"><input type="text" id="roll_id"  name="roll_id" class="inp-form"/></td> 
									</tr>
										 
										<tr>	
											 <th colspan="1">Subjective:</th> 
											 <td colspan="3"><input type="text" class="inp-form" id="subjective_mark"/></td>
										</tr>
										<tr>
											 <th  colspan="1">Objective:</th> 
											 <td  colspan="3"><input type="text"  class="inp-form" id="objective_mark"/></td>
										</tr>
										<tr>
											 <th  colspan="1">Class Test:</th> 
											 <td  colspan="3"> <input type="text"  class="inp-form" id="ct_mark"/></td>
																					  
										</tr>		
											<tr> <th>&nbsp;</th> </tr>	 
										<tr>	
											<input type="hidden" id="slno" value=""/> 
											 <td colspan="4"> <button type="button"  class="form-submit" id="mart_set">Submit</button>
												<button type="button"  class="form-reset" id="mart_reset">Reset</button>
												<button type="button"  class="form-delete" id="mart_update" name="">Update</button>
											 </td>
																			 
										</tr>		
						</table>  <!-- end form -->
					</fieldset>	
						
                    </td></tr>                		
				</table>		
				<br/>		
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->