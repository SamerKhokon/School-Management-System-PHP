<?php session_start(); require_once("../db.php");?>
<div id="content" class="box">

	<input type="hidden" id="branch_id" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Exam Marks Detail</legend>
			
			    <table  width="100%"  border="1" cellpadding="0" cellspacing="0">
				  <tr>
				             <td><div  id="exam_mark_detail_datatable"></div></td>						  						  
				             <td>&nbsp;</td>
			            <td ><br/>						
						<fieldset>
						   <legend>Marks Search form</legend>
						
						<table width="50%"  border="1" cellpadding="0" cellspacing="0">
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
											 <th>Section</th>
											 <td>
											 <select id="section_id"   class="styledselect-normal">													
											 </select>						 
											 </td>
							        </tr>   
									<tr> <th>&nbsp;</th> </tr>	 									
							        <tr>         
							             <th>Year</th>
							             <td><select id="year_id" class="styledselect-normal">
										            <option value="">select year</option>
										                 <?php for($i= 2000; $i<= 2025; $i++ ) {   ?>
														 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
														 
											<?php } ?>
										 </select></td>
							
										  <th>Term</th>
										  <td><select  id="term_id"  class="styledselect-normal">
										            <option value="">select term</option>										                  
														<option  value="1">Term1</option>
														<option  value="2">Term2</option>
														<option  value="3">Term3</option>
													</select>
											</th>
											
							        </tr>
									
									<tr> <th>&nbsp;</th> </tr>	 
									<tr>		
											 <th colspan="1">Student Roll:</th> 
											 <td  colspan="3"><input type="text" id="roll_id"  name="roll_id" class="inp-form"/></td> 
									</tr>
										 
												
											<tr> <th>&nbsp;</th> </tr>	 
										<tr>	<th>&nbsp;</th>
											<input type="hidden" id="slno" value=""/> 
											 <td colspan="4"> <button type="button"  class="form-submit" id="mark_search_btn">Submit</button>
												<button type="button"  class="form-reset" id="mart_reset">Reset</button>
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
<script type="text/javascript">
$(document).ready(function(){
  var data_grid = function(class_id,section_id,year_id,term_id,roll_id){
	$("#exam_mark_detail_datatable").load("includes/subjectwise_mark_list_by_ajax.php",
	{
		'class_id':class_id,
		'section_id':section_id,
		'year_id':year_id,
		'term_id':term_id,
		'roll_id':roll_id
	}
	,function(){});
  }
  
    $("#class_id").change(function(){
        var class_id = $("#class_id").val();
	    var branch_id = $("#branch_id").val();
		
	    if(class_id!="") 
		{
			$.ajax({
			   type:"post" ,
			   url:"includes/section_fetch.php" ,
			   data:"class_id="+class_id+"&branch_id="+branch_id ,
			   success:function(st){
				  $("#section_id").html(st);
			   }
			});
		}else{
			$("#section_id").html('');
		}
    });
  
  
    data_grid("","","","","");
	
	$("#mark_search_btn").click(function(){
		var class_id   = $("#class_id").val();
		var section_id = $("#section_id").val();
		var year_id    = $("#year_id").val();
		var term_id    = $("#term_id").val();
		var roll_id    = $("#roll_id").val();
		
		if(class_id==""){
		  alert("Select class");
		  return false;
		}else if(section_id==""){
		  alert("Select section");
		  return false;
		}else if(year_id == "") {
		  alert("Select year");
		  return false;
		}else if(term_id =="") {
		  alert("Select term");
		  return false;
		}else{
			data_grid(class_id,section_id,year_id,term_id,roll_id);
		}
	});
});
</script>