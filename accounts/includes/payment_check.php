<script type="text/javascript">
	$(document).ready(function()
	{ 
	    $('#authenticate_all').hide();	 
		$("#payment_check_submit").click(function() {
		    var class_id  = $("#class_id").val();
			var class_sec = $("#class_sec").val();
			var mm        = $("#month").val();
			var yy        = $("#year").val();
			var month     = mm+'-'+yy;
			var roll      = $("#roll").val();
			var branch_id = $("#branch_id").val();				
				
            if(class_id=="") 
			{
				alert("select class");
				return false;
			}
			else if(class_sec=="") 
			{
				alert("select section");
				return false;
			}
			else 
			{				  				    
				$('#payment_check_table').load('includes/payment_check_total_amount.php',
				{'class_id':class_id ,'class_sec':class_sec,'month':month,'roll':roll,'branch_id':branch_id},					
				function(){});
					
				$('#authenticate_all').show();
					
				//$('#payment_check_table').load('includes/payment_check_list_display.php',
				//{'class_id':class_id ,'class_sec':class_sec,'month':month,'roll':roll,'branch_id':branch_id},					
				//function(){});					
			}
		});		
		
		
		$("#class_id").change(function(){
			var class_id = $("#class_id").val();
			var branch_id = $("#branch_id").val();	
			var dataStr = "class_id="+class_id+"&branch_id="+branch_id;
			if(class_id!=""){
			   $.ajax({
			     type:"post" ,
				 url:"includes/section_fetch.php" ,
				 data:dataStr ,
				 success:function(st){
					$("#class_sec").html(st);				 
				 }
			   });
			}else{
			 $("#class_sec").html("");
			}
		});
		
		$("#authenticate_all").live('click',function()	{
			var class_id  = $("#class_id").val();
			var class_sec = $("#class_sec").val();
			var mm        = $("#month").val();
			var yy        = $("#year").val();
			var month     = mm+'-'+yy;
			var branch_id = $("#branch_id").val();	                
			var dataStr   = "class_id="+class_id+"&class_sec="+class_sec+"&month="+month+"&branch="+branch_id;
				
			$.ajax({
				type:"post" ,
				url:"includes/fee_authenticate_all_student.php",
				data:dataStr ,
				success:function(st)
				{
				    alert(st);
					$("#authenticate_all").fadeIn().fadeOut('slow');
				}
			});	
		});		
	});
</script>	
<div id="content" class="box">
<?php require_once("../db.php"); 
session_start();
 $branchid= $_SESSION["LOGIN_BRANCH"];	 
 ?>
	<input type="hidden" id="branch_id" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
<fieldset>
	<legend>Student Fee Checking</legend>	
	<!-- fee_details_list_display.php -->		
	
				<table width="60%"  border="0" cellpadding="0" cellspacing="0">	 
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
					 </td>
				</tr>	
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>			   				
				<tr>
					 <th>Section</th>
					 <td>
							 <select id="class_sec"  class="styledselect-normal">
							 							
							 </select>						 
					 </td>
				</tr>
				<tr><td>&nbsp;</td><td>&nbsp;</td></tr>			   
				<tr>	
					 <th>Month</th> 
					 <td><select id="month" class="styledselect-day">
							<option value="<?php echo date('M');?>"><?php echo date('M');?></>					          
					    <?php   $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
						        for($i=0;$i<count($months);$i++) 
								{
						?>	 
							<option value="<?php echo $months[$i]?>"><?php echo $months[$i]?></>
						<?php	}						   ?>
					 </select >
                     <select id="year" class="styledselect-day">
					     <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
					    <?php for($i=1980;$i<= 2070;$i++) 
						      {	
					    ?>	 
							<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php }						   ?>
					 </select>                 

					 </td>
				</tr>	
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>			   				
                
				<!--<tr>
				   <th>Roll</th>
				   <td><input type="test"  class="inp-form" id="roll"/> </td>
				</tr> -->
				
				<tr><td>&nbsp;</td><td>&nbsp;</td></tr>			   									
				<tr>	
					 <th>&nbsp;</th> 
					 <td> 
					 <input type="button" id="payment_check_submit" class="form-submit"/>
					 </td>
				</tr>										
				</table>
				

				<br/><br/>
				<div id="payment_check_table"></div>
	</fieldset>	
</div>