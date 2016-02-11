<div id="content" class="box">
<?php require_once("../db.php"); session_start(); $branchid = $_SESSION['LOGIN_BRANCH'];?>
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php  $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Results </legend>
			    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
				             
					<tr><td>		 
						<table width="60%"  border="0" cellpadding="0" cellspacing="0">	 
								<tr>
								  <th>Term</th>
									<td><select  id="term_id"  class="styledselect-normal">
												<option  value="1">Term1</option>
												<option  value="2">Term2</option>
												<option  value="3">Term3</option>
											</select>
									</td>					
									 <th>Class</th>
									 <td>
									 <select id="class_id"  class="styledselect-normal">
									 <option></option>
									 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
										while ($row=mysql_fetch_array($qry)){ ?>
											 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
										<?php }  ?>	 
										
									 </select>						 
									 <!--  class="inp-form" -->
									 </td>
								</tr>
								<tr>	
									 <th>Roll</th> 
									 <td> <input type="test"  class="inp-form" id="roll"/> </td>
								</tr>	
								<tr>	
									 <td> &nbsp; </td>
								</tr>									
								<tr>	
									 <th>&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="result_see">Submit</button> </td>
								</tr>										
							</table>	 
						</td>		 
						<td>		 
					</td>
                </tr>
             </table>				
				<br/>		
	</fieldset>	
	
            <fieldset>
			        <legend>Exam Marks</legend>
         				<div  id="result_mark_datatable"></div>
            </fieldset>
	
    </div>
</div>
<!-- /content -->
<script type="text/javascript">
   $(document).ready(function(){
      $("#result_see").click(function(){
	     var term_id  = $("#term_id").val();
	     var class_id = $("#class_id").val();
		 var branchid = $("#branchid").val();
		 var roll = $("#roll").val();
		 var dataStr = "term_id="+term_id +"&class_id="+class_id +"&branchid="+branchid+"&roll="+roll;
		 if(term_id=="") {
		   alert("select term");
		   return false;
		 }else if(class_id=="") {
		   alert("select class");
		   return false;
		 }
		 else{
		       $.ajax({
			       type:"post" ,
				   url:"includes/result_making.php" ,
				   data:dataStr , 
				   cache:false ,
				   success:function(st)    {
				         $("#result_mark_datatable").html(st);
				   }
			   });
				//alert(dataStr);
		 }
	  });
   });
</script>