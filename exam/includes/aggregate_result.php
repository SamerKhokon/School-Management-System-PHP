<?php include("../db.php"); session_start();?>
<script type="text/javascript">
	$(document).ready(function()  
	{		
		$(".tabs > ul").tabs();
		var search_report = function(class_id,stu_id,year_id)
		{
			window.showModalDialog("../result_sheet/result_sheet2.php?class_id="+class_id+"&stu_id="+stu_id+"&year="+year_id
			, "mywindow" , "dialogWidth:1000px;dialogHeight:800px;");					
		}		
        $('#term_result').click(function(){
		    var class_id = $("#class_id").val();
			var stu_id   = $("#stu_id").val();
			var year_id  = $("#year_id").val();
            if(class_id=="") {
				alert("Select Class");
				return false;
			}else{			
				search_report(class_id,stu_id,year_id);
			}
		});
        $('#custom_term_result').click(function(){
		    var class_id = $("#class_id2").val();
			var stu_id   = $("#stu_id2").val();
			var year_id  = $("#year_id2").val();
            if(class_id=="") {
				alert("Select Class");
				return false;
			}else{			
				search_report(class_id,stu_id,year_id);
			}
		});		
		
	});
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>

			<div class="tabs box">
				<ul>
					<li><a href="#all"><span>All</span></a></li>
					<li><a href="#custom"><span>Custom</span></a></li>			
				</ul>
			</div>
		
		    <div id="all"> 
                <fieldset>
					<legend>Agregate Result Report</legend>
			
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
							</tr>
							<tr> <th>&nbsp;
							<input type="hidden" id="stu_id" value=""/>
							</th> </tr>	 
							<tr>	
								<th>&nbsp;</th>
								<td> 
									<button type="button"  class="form-submit" id="term_result">Submit</button>
								</td>												 
							</tr>		
						</table>
				</fieldset>
			</div>
			
		    <div id="custom">
                <fieldset>
				<legend>Agregate Result Report</legend>			
				<table  width="100%"  border="1" cellpadding="0" cellspacing="0">
					<tr>
						<td>Class</td>
						<td>
						 <select id="class_id2"  class="styledselect-normal">
						   <option value="">select class</option>
						 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
							while ($row=mysql_fetch_array($qry)){ ?>
								 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
							<?php }  ?>
						 </select>						 												  
						</td>
						<td >Student ID</td>
						<td ><input type="text" id="stu_id2" class="inp-form" /></td>
					</tr>		
					<tr> <th>&nbsp;</th> </tr>	
					<tr>
						<td>Session</td>
						<td>
						 <select id="year_id2"  class="styledselect-normal">
						   <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
						 <?php for($i=1998;$i<=2020;$i++){ ?>
								 <option value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php }  ?>	 						
						 </select>						 												  
						</td>
									
					</tr>
					<tr> <th>&nbsp;</th> </tr>	 
					<tr>	
						<th>&nbsp;</th>
						<td> 
							<button type="button"  class="form-submit" id="custom_term_result">Submit</button>
						</td>												 
					</tr>		
				</table>
				</fieldset>
			</div>

		
	</fieldset>	
			<br/>		
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->