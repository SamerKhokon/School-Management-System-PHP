<?php require_once("../db.php"); session_start(); $branchid = $_SESSION["LOGIN_BRANCH"]; ?>
	<div id="content" class="box">
					<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>">
       <fieldset>
		   <legend>Select Fee Report</legend>
			  <table width="60%"  border="0" cellpadding="0" cellspacing="0">
			  
			  <tr><td>
			  
			  <table>
                <tr>  
                     <th>Class: &nbsp;&nbsp;</th> 				
					 <td>	
							<select id="class_id" name="class_id"  class="styledselect-normal" >
							<option value="">select class</option>
							 <?php 
								$qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
								while ($row=mysql_fetch_array($qry)){ ?>
									<option value="<?php echo $row[0];?>"><?php echo $row[1];?> </option>
								<?php }				 ?>
					 </select>
					 </td>
               </tr>	
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>			   
			    <tr>				
                   <th valign="top">Month:</th>
                     <td>
							 <select id="month_id" name="month_name" class="styledselect-year">
									<?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Aug","Sep","Oct","Nov","Dec"); ?>
									<option value="<?php  echo date('M') ?>"><?php  echo date('M') ?> </option>
									<?php for($i=0;$i<count($months);$i++){ ?>
											<option value="<?php echo $months[$i];?>"><?php echo $months[$i];?></option>
									<?php } ?>
							 </select>
							 <select id="year_id" name="year_name" class="styledselect-year">
									<option value="<?php echo date('Y');?>"><?php  echo date('Y');  ?></option>
									<?php	for($i=1980;$i<=2030;$i++)  { ?>									
													<option value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php	} 	 ?>
							 </select>
               		 </td>
               </tr>  
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>			   
                <tr>  
                     <th>Stutus: &nbsp;&nbsp;</th> 				
					 <td>	
                     <select id="status_id" name="status_id"  class="styledselect-normal">
							<option value="">select status</option>
							<option value="paid">Paid</option>
							<option value="due">Due</option>
					 </select>
					 </td>
               </tr>
			   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr>  
                     <th> &nbsp;&nbsp;</th> 				
					 <td>	<input type="button" class="form-submit" id="report_search_btn" value="Search"/>
					 </td>
               </tr>			   
		</table>	
		
		</td>
		<td>&nbsp;</td>
				<td>&nbsp;</td>
						<td>&nbsp;</td>
		<td>
			<table>
				<tr>
					<th>Total Amount:</th>
					<td><input type="text" class="inp-form" id="total" readonly="readonly" value=""/></td>
				</tr>
				<tr>
					<th>Due Amount:</th>
					<td><input type="text" class="inp-form" id="total_due" readonly="readonly" value=""/></td>
				</tr>
				<tr>
					<th>Paid Amount:</th>
					<td><input type="text" class="inp-form" id="total_paid" readonly="readonly" value=""/></td>
				</tr>	
			</table>            
		</td></tr>
		</table>
		<br/><br/><br/>
		<div id="fee_collection_table"></div>
		
	    </fieldset>		   
    </div>
	
    <!-- /content
		fee_collection_report_search_by_ajax.php
	-->
			    <script type="text/javascript">
				$(document).ready(function(){
				
					$("#class_id").change(function(){
						var month_id = $("#month_id").val();
						var year_id = $("#year_id").val();
						var month_year = month_id+'-'+year_id;
						var class_id = $("#class_id").val();
						var dataStr = "class_id="+class_id+"&month_year="+month_year;
						if(class_id!=""){
						$.ajax({
						    type:"post",
							url:"includes/summary_fetch.php",
							data:dataStr,
							success:function(st){
							   var p = st.split("|");
							   //alert(p);
	                           $("#total_paid").val(p[0]);
								$("#total_due").val(p[1]);
								$("#total").val(p[2]);
							}
						});
						//$total_paid."|".$total_due."|".$total
						}else{
						     $("#total_paid").val('');
								$("#total_due").val('');
								$("#total").val('');
						}
				    });
					
				    $("#report_search_btn").click(function(){					      
							var class_id = $("#class_id").val();
							var status_id = $("#status_id").val();
							var month_id = $("#month_id").val();
							var year_id = $("#year_id").val();
							var month_year = month_id+'-'+year_id;
							var branchid = $("#branchid").val();
							
							//alert(class_id+" "+status_id+" "+month_year+" "+branchid);
							

							
							if(class_id=="") {
								alert("select class");
								return false;
							}else if(status_id=="") {
								alert("select status");
								return false;
							}else{
							     //alert(dataStr);
								  $("#fee_collection_table").load("includes/fee_collection_report_search_by_ajax.php",
								  {
								  'class_id':class_id,
								  'month_year':month_year,
								  'status_id':status_id,
								  'branchid':branchid
								  }
								  ,function(){});
							}					 
					   });
				});
				</script>	