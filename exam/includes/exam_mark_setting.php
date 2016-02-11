<?php session_start(); include('db.php');
$academic_year = date('Y');
?>
<script type="text/javascript">
  $(document).ready(function()  {
  
        $('#exam_mark_datatable').load('includes/exam_mark_setting_datatable_by_ajax.php',
		{'roll':0,'class_id':0,'year':0,'term':0 , 'subject_id':0},function(){});
	
		$("#subject_id").change(function(){ 
			
			
			var sub_code = $("#subject_id").val();
			var class_id = $("#class_id").val();
			marks_label(class_id,sub_code);
		    $("#subjective_mark").focus();
			$("#roll_id").focus();
		});
		
	
		$("#class_id").change(function(){
		    var class_id = $("#class_id").val();
			var branchid = $("#branchid").val();
			var sub_code = $("#subject_id").val();
						
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

				secion_fetch(class_id,branchid);				
				marks_label(class_id,sub_code);
				
			}else{
			   $("#subject_id").html("");
			   $("#section_id").html("");
			   
				$("#sb_mark_label").text(""); 
				$("#ob_mark_label").text(""); 
				$("#ct_mark_label").text("");
				$("#pt_mark_label").text("");
			}   
		});
			
			
		var secion_fetch = function(class_id,branchid) {
				$.ajax({
				   type:"post",
				   url:"includes/section_fetch.php" ,
				   data:"class_id="+class_id+"&branch_id="+branchid ,
				   success:function(st){
				     $("#section_id").html(st);
				   }
				});
		}	
		
		var marks_label = function(class_id,sub_code) {
		    if(class_id!="") {
				 $.ajax({
			      type:"post" ,
				  url:"includes/fetch_subject_config_marks_for_show_in_span_label.php" ,
				  data:"class_id="+class_id+"&sub_code="+sub_code ,
				  success:function(st) {
				     //alert(st);
					 var prs = st.split(",");					 
					 $("#sb_mark_label").text(prs[0]); 
					 $("#ob_mark_label").text(prs[1]); 
					 $("#ct_mark_label").text(prs[2]);
					 $("#pt_mark_label").text(prs[3]);					 
				  }
			   });		
			}else{
					 $("#sb_mark_label").text(""); 
					 $("#ob_mark_label").text(""); 
					 $("#ct_mark_label").text("");
					 $("#pt_mark_label").text("");					 
			}   
		}	
			
		var data_grid = function() {
				$('#exam_mark_datatable').load('includes/exam_mark_setting_datatable_by_ajax.php',									{
						'roll':$("#roll_id").val(),
						'class_id': $("#class_id").val(),
						'year':$("#year_id").val(),
						'term': $("#term_id").val(),
						'subject_id':$("#subject_id").val()
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
							    
							    if (st==0)
								{	
									$("#year_id").val($("#year_id").val());
									$("#term_id").val($("#term_id").val());
									$("#subjective_mark").val('');
									$("#objective_mark").val('');
									$("#ct_mark").val('');
									$("#pt_mark").val('');	
									data_grid();										
								}
								else
								{
									var parse = st.split("|");
									var sb = parse[0];
									var ob = parse[1];
									var ct = parse[2];
									var yr = parse[3];
									var pr = parse[4];
									
									$("#year_id").val(year);
									$("#term_id").val(pr);
									$("#subjective_mark").val(sb);
									$("#objective_mark").val(ob);
									$("#ct_mark").val(ct);
									$("#pt_mark").val(ct);									
									$("#term_id").val(term_id);
									data_grid();										
								}											
															
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
					else if(subjective_mark > parseFloat($("#sb_mark_label").text())){
						alert("Subjective mark must be <="+$("#sb_mark_label").text());			   
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
				  }else if(objective_mark > parseFloat($("#ob_mark_label").text())){
				    alert("Objective mark must be <="+$("#ob_mark_label").text());			   
				}else{
				    $("#ct_mark").focus();
				}
			   }
		});
		$("#ct_mark").keypress(function(ex){
		       if(ex.which == 13) {
				var ct_mark = $("#ct_mark").val();
					
				if(ct_mark=="")
			    {
				  alert("Enter Class test mark");
				  $("#ct_mark").focus();
				  return false;
				}else if(ct_mark > parseFloat($("#ct_mark_label").text())){
				    alert("Class test mark must be <="+$("#ct_mark_label").text());			   
				}else{
				    $("#pt_mark").focus();
				}
			}	
		});	  		
		
		$("#pt_mark").keypress(function(ex){
		    if(ex.which == 13) 
			{   			      
				  var year_id       = $("#year_id").val();
				   var pt_mark = $("#pt_mark").val();				  
				  var class_id             =  $("#class_id").val();
				  var section_id          = $("#section_id").val();
				  
				  
				  if(pt_mark == "") {
				     alert("Enter practical mark");
					 $("#pt_mark").focus();
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
							 var ct_mark = $("#ct_mark").val();	
							var year_id              = $("#year_id").val();
							var tag_name = "pt";
							
							
                            var dataStr  = 'branchid='+branchid+'&term_id='+term_id+
							'&class_id='+class_id+'&section_id='+section_id+
							'&roll_id='+roll_id+'&subect_id='+subject_id+
							'&subjective_mark='+subjective_mark+
							'&objective_mark='+objective_mark+'&ct_mark='+ct_mark+
							'&pt_mark='+pt_mark+'&year_id='+year_id;
                           
						    if( pt_mark <= parseFloat($("#pt_mark_label").text()) ) 
							{							
														    
								if(roll_id!="" && subjective_mark!="" && year_id!="" && objective_mark!="" && pt_mark !="") 
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
													$("#pt_mark").val('');
													$("#year_id").val(year_id);
													$("#subject_id").focus();
													
													data_grid();
													$("#subjective_mark").focus();
											   }
										   });						
								}else{
								   alert("Please select year");
								} 
							}else{
							  alert("Practical mark must be <="+$("#pt_mark_label").text());
							}	
				  }
			}			
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
				$("#pt_mark").val('');
		});
				
	/*
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
							$("#pt_mark").val('');
							data_grid();
					   }
				   });	

				   
			return false;				
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
		*/
  });
</script>
<div id="content" class="box">
<?php  require_once('../db.php'); $branchid = $_SESSION['LOGIN_BRANCH']; ?>
<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
<fieldset>
	<legend>Exam Marks Entry</legend>
        <table  width="100%"  border="1" cellpadding="0" cellspacing="0">
        	<tr>
            	<td colspan="4">
                	<table width="100%" border="0">
                    	<tr>
                        	<th>Class</th>
                            <td>
                            <select id="class_id"  class="styledselect-normal">
                                <option value="">select class</option>
                                <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
                                while ($row=mysql_fetch_array($qry)){ ?>
                                 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                                <?php }  ?>	 
                            </select>						 
                            <!--  class="inp-form" -->
                            </td>
                            <th>&nbsp;Section&nbsp;</th>
                            <td>
                            <select id="section_id"   class="styledselect-normal">													                                </select>						 
                            </td>
                            <th>Year</th>
                            <td><select id="year_id" class="styledselect-normal">
                                <option value="">select year</option>
                                <?php for($i= 2000; $i<= 2025; $i++ ) {   ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                
                                <?php } ?>
                            </select></td>
                            <th>Term</th>
                            <td><select  id="term_id"  class="styledselect-normal">
                                <option value="">select term</option>										                                <?php
								$sql_exam = "select `id`, `exam_name` from `std_exam_config_new` where `flag`=1 and `academic_year`=$academic_year";
								$res_exam = mysql_query($sql_exam);
								while($row_exam = mysql_fetch_array($res_exam))
								{
								echo '<option value="'.$row_exam[0].'">'.$row_exam[1].'</option>';
								}
								?>
								</select>
                            </th>
                        </tr>
                    </table>
                </td>	
            </tr>
			<tr> <td colspan="4"  style="height:5px;">&nbsp;</td> </tr>
			<tr> <td colspan="4"  style="border-top:1px solid #ccc;"></td> </tr>
			<tr> <td colspan="4"  >&nbsp;</td> </tr>
            <tr>
            	<td width="65%"><div  id="exam_mark_datatable"></div></td>						  													
                <td>&nbsp;</td>
			    <td width="35%"><br/>						
					<fieldset>
				 		<legend>Marks Entry form</legend>
						<table >
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
                                <td colspan="3"><input type="text" class="inp-form" id="subjective_mark"/> <span id="sb_mark_label"  style="font-weight:bold;font-size:15px;"></span></td>
                            </tr>
                            <tr>
                                <th  colspan="1">Objective:</th> 
                                <td  colspan="3"><input type="text"  class="inp-form" id="objective_mark"/> <span id="ob_mark_label"   style="font-weight:bold;font-size:15px;"></span></td>
                            </tr>
                            <tr>
                                <th  colspan="1">Class Test:</th> 
                                <td  colspan="3"> <input type="text"  class="inp-form" id="ct_mark"/><span id="ct_mark_label"   style="font-weight:bold;font-size:15px;"></span></td>
                            </tr>		
                            <tr>
                                <th  colspan="1">Practical:</th> 
                                <td  colspan="3"> <input type="text"  class="inp-form" id="pt_mark"/> <span id="pt_mark_label"   style="font-weight:bold;font-size:15px;"></span>  </td>
                            </tr>									
                            <tr> <th>&nbsp;</th> </tr>	 
                            <tr>	
                                <input type="hidden" id="slno" value=""/> 
                                <td colspan="4"> <button type="button"  class="form-submit" id="mart_set">Submit</button>
                                <button type="button"  class="form-reset" id="mart_reset">Reset</button>
                                <!--<button type="button"  class="form-delete" id="mart_update" name="">Update</button> -->
                                </td>
                            </tr>		
						</table>  <!-- end form -->
					</fieldset>	
                </td>
            </tr>                		
		</table>		
		<br/>		
</fieldset>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->