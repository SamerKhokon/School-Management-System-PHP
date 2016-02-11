<?php 		require_once("../db.php");	
			session_start();				
					$branchid = $_SESSION['LOGIN_BRANCH'];

?>	
<div  id="content" class="box">        
		<fieldset >
		<legend>Subject Syllabus </legend>
		<table  widhth="100%" cellpadding="0" cellspacing="0">
					<tr>
							<th>Class Name : </th>
							<td> 
								  <select id="class_name" name="class_name" class="styledselect-normal">
									<option value="0">select class</option>
										<?php 
											$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 										
											while ($row=mysql_fetch_array($qry))		{
											echo "<option value=\"$row[0]\">$row[1]</option>";
											}
										?>
									</select>
							</td>
							<th>Term : </th>
							<td> 
								  <select id="term_id" name="term_id" class="styledselect-normal">
										<option value="0">select term</option>								  
										<option value="1">Term1</option>
										<option value="2">Term2</option>
										<option value="3">Term3</option>									
									</select>
							</td>
                    </tr>
				<tr><td colspan="4">&nbsp;</td></tr>
                    <tr> 					
							<th>Subject : </th>
							<td> 
								  <select id="subject_id" name="subject_id" class="styledselect-normal" multiple="multiple">
									</select>
							</td>
                            <th>&nbsp;</th>           							
							<td>&nbsp;</td>																					
					</tr>
					<tr><td colspan="4">&nbsp;</td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><input type="button" value="Submit" id="subject_syllabus_button" class="form-submit" />  </td>
					</tr>                
			</table>			
		</fieldset>				
		<fieldset>
					<div id="subject_syllabus_display_databale"></div>	
		</fieldset>
</div>			

<script type="text/javascript">
$(document).ready(function(){        
		$("#subject_syllabus_display_databale").load("includes/subject_syllabus_list_datable.php", 
		{   'class_id': 0 , 'subject_id':0 , 'term_id' : 0	},	function(){});	
		
		$("#class_name").change(function(){
				var class_name =$("#class_name").val();
					if(class_name =="" || class_name ==0) {
					   alert("Select Class");
					   return false;
					}else{					
						   $.ajax({
							  type:"post" ,
							  url: "includes/get_subject_by_classid.php" ,
							  data:"class_id=" +class_name ,
							  cache:false ,
							  success:function(st)  {
								   $("#subject_id").html(st);
							  }
						   });
					}
		});
			
		$("#subject_syllabus_button").click(function(){
				 var class_id    = $("#class_name").val();
				 
                var subjects = [];  
				
                $("#subject_id option:selected").each(function(){
				        subjects.push($(this).val());
				});

				var term_id     =  $("#term_id").val();
				
			   //var dataStr = "class_id="+class_id+"&subject_id="+subjects+"&term_id="+term_id;
			   
			   
				$("#subject_syllabus_display_databale").load(
				"includes/subject_syllabus_list_datable.php", 
				{ 
   				   'class_id': class_name , 
				   'subject_id' : subjects ,
                   'term_id': term_id 				   
				},
				function(){});				   								
   		});
});
</script>