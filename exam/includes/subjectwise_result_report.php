<?php include("../db.php"); session_start();?>
<script type="text/javascript">
	$(document).ready(function()  
	{
		var search_report = function(class_id,sub_code,year_id,term_id)
		{
		//alert(class_id+"  "+sub_code+"  "+year_id +"  "+term_id);
			window.showModalDialog("../result_sheet/result_sheet3.php?class_id="+class_id+"&sub_code="+sub_code+"&year="+year_id+
			"&term_id="+term_id	, "mywindow" , "dialogWidth:1000px;dialogHeight:800px;");					
		}
		
        $('#term_result').click(function(){
		    var class_id = $("#class_id").val();
			var year_id  = $("#year_id").val();
			var sub_code = $("#subject_id").val();
			var term_id  = $("#term_id").val();
			search_report(class_id,sub_code,year_id,term_id);			
		});		
		
		$("#class_id").change(function(){
		   var class_id = $("#class_id").val();
		   $.ajax({
		      type:"post" ,
			  url:"includes/subjects_load.php" ,
			  data:"class_id="+class_id ,
			  success:function(st){
			    $("#subject_id option").remove();
			    $("#subject_id").html(st); 
			  }
		   });
		});
		
	});
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Subjectwise Term Result Report</legend>
			
			    <table  width="100%"  border="1" cellpadding="0" cellspacing="0">
				  <tr>
				  <td>Class</td>
				  <td>
					 <select id="class_id"  class="styledselect-normal">
					   <option value="">select class</option>
					 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
						while ($row=mysql_fetch_array($qry)){ ?>
							 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
						<?php }  ?>	 
						
					 </select>						 												  
				</td>	 
				<td>Subject</td>
				<td>
					 <select id="subject_id"  class="styledselect-normal">						
					 </select>						 												  
				</td>
				</tr>		
				<tr> <th>&nbsp;</th> </tr>	
				<tr>
				  <td>Session</td>
				  <td>
					 <select id="year_id"  class="styledselect-normal">
					   <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
					 <?php for($i=1998;$i<=2020;$i++){ ?>
							 <option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php }  ?>	 						
					 </select>						 												  
				</td>
				<td>Term</td>
				  <td>
					 <select id="term_id"  class="styledselect-normal">
					 <option value="1">First Term</option>
					 <option value="2">Second Term</option>
					 <option value="3">Final Term</option>
					 </select>						 												  
				</td>				
				</tr>
				<tr> <th>&nbsp;</th> </tr>	 
				<tr><td>&nbsp;</td>	
					 <td> 
					 <button type="button"  class="form-submit" id="term_result">Submit</button>
					 </td>												 
				</tr>		
				</table>		
			</fieldset>	
				<br/>		
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->