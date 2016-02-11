<script type="text/javascript">
jQuery(document).ready(function(){  
    $("#class_id").click(function(){
       var class_id  = $("#class_id").val();
   	   var branch_id = "<?php echo $branchid; ?>";
   	   //alert(branch_id);	
		$("#section_id").load('includes/acc/phpfunction.php?fn_name=std_fee_generator_form_section_id&parm='+class_id+'-'+branch_id);		
    });   
    $("#section_id").click(function()    {
       var section_id = $("#section_id").val();
       var class_id   = $("#class_id").val();
       var branch_id  = "<?php echo $branchid; ?>";		
		$("#gene_chkbox").load('includes/acc/gene_fee_chkbox.php?&class_id='+class_id+'&section_id='+section_id+'&branch_id='+branch_id);		
		$("#student_roll").load('includes/acc/phpfunction.php?fn_name=std_fee_generator_form_student_roll&parm='+class_id+'-'+section_id+'-'+branch_id);	
		$("#amnt").load('includes/acc/phpfunction.php?fn_name=std_fee_generator_form_amount_id&parm='+class_id+'-'+branch_id);		
    	$("#student_roll").keydown(function(event)    {
			if(event.keyCode == 13 ) {
				$("#abs_day").focus();
			}
		});
		$("#abs_day").keydown(function(event)   {
			if(event.keyCode == 13 ) {
			  $("#btn_abs_day").focus();
		    }
		});							
		$("#roll").load('includes/acc/phpfunction.php?fn_name=std_fee_generator_form_student_roll&parm='+class_id+'-'+section_id+'-'+branch_id);	
    });
    $("#gen_fixed_fee").click(function() {
		var btn_value = $("#gen_fixed_fee").val();
		var class_id  = $("#class_id").val();
		var sec_id    = $("#section_id").val();
		var month     = $("#month_id").val();
		var year      = $("#year_id").val();
		var pay_date  = $("#pay_date").val();
	  	var branch_id = "<?php echo $branchid; ?>";
		var val = [];
		var check = "";		
	    var cnt=0;	
		
		 $(':checkbox:checked').each(function(i){
				//val[i] = $(this).val();
				//check=check +","+ val[i];
				val.push($(this).val());
                check = val;				
				cnt++;
         });	 	

		var dataString = 'field='+check+'&month='+month+'&year='+year+'&pay_date='+pay_date+'&class_id='+class_id+'&sec_id='+sec_id+'&branch_id='+branch_id+'&btn_value='+btn_value+'&cnt='+cnt;
      	//alert(dataString);
		// alert(btn_value);

		$.ajax({  
			 type: "POST",  
			 url: "includes/edit_std_fee_generator.php",  
			 data: dataString,  
			 success: function(htmData) {  
				//alert(htmData);
				alert("Data sucessfully updated......");						   
			 }  
		});  
		return false;
});

$("#btn_abs_day").click(function()	{
	var btn_value   = jQuery("#btn_abs_day").val();
	var std_abs_day = $("#abs_day").val();
	var class_id    = $("#class_id").val();
	var sec_id      = $("#section_id").val(); 
	var month       = $("#month_id").val();
    var year        = $("#year_id").val();
	var pay_date    = $("#pay_date").val(); 
    var branch_id   = "<?php echo $branchid; ?>";
	var std_roll    = $("#student_roll").val();
	
	var dataString  = 'std_abs_day='+std_abs_day+'&month='+month+'&year='+year+'&pay_date='+pay_date+'&class_id='+class_id+'&sec_id='+sec_id+'&branch_id='+branch_id+'&btn_value='+btn_value+'&std_roll='+std_roll;
	//alert(dataString);
	//alert(std_abs_day);
	
	$.ajax({  
		type: "POST",  
		url: "includes/edit_std_fee_generator.php",  
		data: dataString,  
		success: function(htmData)	{  
			alert(htmData);
		}  
		//  $('#student_roll').val('');
	});
	$('#abs_day').val('');
});

    $("#btn_other").click(function(){
		var btn_value = jQuery("#btn_other").val();
		var class_id  = $("#class_id").val();
		var sec_id    = $("#section_id").val(); 
		var month     = $("#month_id").val();
		var year      = $("#year_id").val();
		var pay_date  = $("#pay_date").val(); 
		var branch_id = "<?php echo $branchid; ?>";
		
		var std_roll    = $("#roll").val();
		var head_name   = $("#head_name").val();
		var head_amount = $("#head_amount").val();
		var dataString  = 'month='+month+'&year='+year+'&pay_date='+pay_date+'&class_id='+class_id+'&sec_id='+sec_id+'&branch_id='+branch_id+'&btn_value='+btn_value+'&std_roll='+std_roll+'&head_name='+head_name+'&head_amount='+head_amount;
		//alert(dataString);
		//alert(std_abs_day);
		$.ajax({  
			type: "POST",  
			url: "includes/edit_std_fee_generator.php",  
			data: dataString,  
			success: function(htmData){  
				alert(htmData);	
		    }  
		});
		  $('#roll').val('');
		  $('#head_name').val('');
		  $('#head_amount').val('');
	});	
	$("#gen_pay_slip").click(function(){
			var btn_value = $("#gen_pay_slip").val();
			//alert(btn_value); 

			var class_id  = $("#class_id").val();
			var sec_id    = $("#section_id").val();
			
			var monthid  = $('#month_id').val();
			var yearid   = $('#year_id').val();
			
			var yearmonth = monthid+"-"+yearid;
			var branchid  = $("#branchid").val();
			
			var dataString = "yearmonth="+yearmonth+"&class_id="+class_id+"&sec_id="+sec_id+"&branchid="+branchid+"&btn_value="+btn_value;
			//alert(dataString);
			//alert(std_abs_day);
			$.ajax({  
				 type: "POST",  
				 url: "includes/edit_std_fee_generator.php",  
				 data: dataString,  
				 success: function(st) {  
					alert("Data sucessfully updated......");							   
					//alert(st);
				 }  
			});
    });
});
</script>
<div id="content" class="box">
	<?php echo date('Ymd-s-',time()).rand(10,1000);  ?>
       <fieldset>
		   <legend>Select Fee info</legend>
			  <table  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <th>Payment Date:</th>
                     <td><input onclick='scwShow(this,event);'  id="pay_date" name="pay_date" value="<?php echo date('d-m-Y') ?>"  readonly="readonly" class="inp-form"/></td>
               </tr>
			    <tr>
                   <th valign="top">Pyament for :</th>
                     <td>
                 	 <select id="month_id" name="month_name" class="styledselect-year">
				 	 <option><?php  echo date('M') ?> </option>
				 	 <option value="Jan">Jan</option>
				 	 <option value="Feb">Feb</option>
				 	 <option value="Mar">Mar</option>
				 	 <option value="Apr">Apr</option>
				 	 <option value="May">May</option>
				  	 <option value="Jun">Jun</option>
                 	 <option value="Jul">Jul</option>
				 	 <option value="Aug">Aug</option>
				  	 <option value="Sep">Sep</option>
				  	 <option value="Oct">Oct</option>
				  	 <option value="Nov">Nov</option>
				  	 <option value="Dec">Dec</option>
		    	  	 </select>
                     <?php
			   			 $year = date("Y");
						 $pre = $year - 10;
						 $next = $year + 10;
					 ?>
                     <select id="year_id" name="year_name" class="styledselect-year">
				     <option><?php  echo $year;  ?></option>
				     <?php
				     for($i=$pre;$i<=$next;$i++)
					    {
						 echo "<option value=\"$i\">$i</option>";
						}
				 	 ?>
		   			 </select>
               		 </td>
            		 <td>
                     <div class="bubble-left"></div>
					 <div class="bubble-inner">Select class time</div>
					 <div class="bubble-right"></div>
                     </td>	
               </tr>        
                <tr>	
                     <th>
                     Class Name:
                     </th> 
	                 <td>   
    		         <select id="class_id" name="class_id"  class="styledselect-normal" >
                   	 <option>select</option>
					 <?php 
						$qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
					    while ($row=mysql_fetch_array($qry)){
							echo "<option value=\"$row[0]\">$row[1] </option>";
                        }
					 ?>
					 </select>*
                     </td> 
					 <td>
					 <div class="error-left"></div>
					 <div class="error-inner"><p id="err_rep">This field is required.</p></div>
					 </td>	
                </tr>
                 <tr>  
                     <th>Section Name: &nbsp;&nbsp;</th> 				
					 <td>	
                     <select id="section_id" name="section_id"  class="styledselect-normal">
					 </select>*
					 </td>
					 <td>
					 <div class="error-left"></div>
					 <div class="error-inner"><p id="err_rep">This field is required.</p></div>
					 </td>	
               </tr>
				<tr>	
                     <td>
					<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>">
					</td>
				</tr>
		</table>	
	</fieldset>		
		<div class="tabs box">
        <ul>
          <li><a href="#fixed_fee"><span>Generate Fixed Fee</span></a></li>
          <li><a href="#ind_fee"><span id="ead">Enter Absent day</span></a></li>
          <li><a href="#other_fee"><span >Enter Other fee</span></a></li>
          <li><a href="#generate_pay_slip"><span>Genarate payment Slip</span></a></li>
		</ul>
        </div>  
<div id="fixed_fee">
	<div id="gene_chkbox" ></div>
		<button id="gen_fixed_fee" class="form-submit" value="fixed_fee">     
		    submit <!--Generate payment Slip -->
		</button>
</div>		
    <div id="ind_fee">
	  <fieldset>
		<legend>Enter Student Individual Info</legend>
		<table>
		   <tr>
			   <th>Roll* &nbsp;&nbsp;</th> 				
			   <td>
			    <select id="student_roll" name="student_roll" 
				class="styledselect-normal">					  
		        </select>
			   </td>
		  </tr>
		   <tr>
			   <th>Days of absent*</th> 				
				  <td><input id="abs_day" type ="text" name="abs_day" class="inp-form"/></td>
                   <td>
                     <div class="bubble-left"></div>
					 <div class="bubble-inner">Select class time</div>
					 <div class="bubble-right"></div>
                 </td>	
           </tr>		
            <tr><th>Amount:</th> <td><div id="amnt">  </div> </td></tr>   
            <tr><td><button id="btn_abs_day" class="form-submit" value="btn_abs_day">submit
            </button></td></tr>
	    </table>
	  </fieldset>
    </div>
    <div id="other_fee">
    <fieldset> <legend>Enter the fee name</legend>
    <table>  
           <tr> <th> Roll *</th><td><select id="roll" name="roll" class="styledselect-normal">					  
		              </select>
                 </td> 
           </tr>
              <tr>
			   <th>Fee head name*</th> 				
				  <td><input id="head_name" type ="text" name="head_name" class="inp-form"/></td>
                   <td>
                     <div class="bubble-left"></div>
					 <div class="bubble-inner">Select class time</div>
					 <div class="bubble-right"></div>
                     </td>	
           </tr>
              <tr>
			   <th>Amount*</th> 				
				  <td><input id="head_amount" type ="text" name="head_amount" class="inp-form"/></td>
                   <td>
                     <div class="bubble-left"></div>
					 <div class="bubble-inner">Select class time</div>
					 <div class="bubble-right"></div>
                     </td>	
           </tr>
		 <tr><td>     <button id="btn_other" class="form-submit" value="btn_other">submit
                  </button></td></tr>    
    </table>    
    </fieldset>    
    </div>	<div id="generate_pay_slip">
               <!--    hello -->
			   
			   <input type="button" value="Generate Payslip" id="gen_pay_slip" class="form-submit"/>
	       <!--     <button id="gen_pay_slip" value="gen_pay_slip">
                  Generate Payslip
                </button>	  
	          -->
        </div>
      </div>
    </div>
    <!-- /content -->