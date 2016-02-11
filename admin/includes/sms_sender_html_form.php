<div id="content" class="box">	
     <div class="tabs box">
        <ul>
          <li><a href="#tab01"><span>Parents</span></a></li>
          <li><a href="#tab02"><span>Office Stuff</span></a></li>		  
        </ul>
      </div>
      <!-- /tabs -->
	  
      <!-- Tab01 -->
	  <div id="tab01">
		<fieldset>
			<legend>SMS Send  to Student Parents</legend>						
			<table cellpadding="0" cellspaccing="0">
                <tr><td>Class</td>
					<td>
					<select id="class_id" class="styledselect-normal">
					<option value="">Select Class</option>
					<?php
						$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 				
						while ($row=mysql_fetch_array($qry))		{
							echo '<option value="'.$row[0].'">'.$row[1].'</option>';
						}					 
					?>
					</select>
					</td>
					<input type="hidden" id="parent_mobileno" value=""/>
				</tr>
				<tr>		
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>				
                <tr><td>SMS</td>
					<td><textarea id="parent_sms" rows="5" cols="30"></textarea></td>
				</tr>				
				<tr>		
				  <td>&nbsp;</td>
				  <td><input type="button" id="parent_sms_send_btn" class="form-submit" value="Submit"/></td>
				</tr>								
			</table>
			
			<br/><br/>
			<div id="parent_sms_datatable"></div>
			
			

		</fieldset>
		
		
      </div>
      <!-- /tab01 -->
      <!-- Tab02 -->
      <div id="tab02">
		<fieldset>
			<legend>SMS Send  to Office Stuff</legend>	
			<table>
				<tr>
				  <td>Stuff Type</td>
				  <td>
					  <select id="stuff_type" class="styledselect-normal">
						<option value="">Select Stuff Type</option>
						<option value="Teacher">Teacher</option>
						<option value="Employee">Employee</option>				
					  </select>
				  </td>
				  	<input type="hidden" id="stuff_mobileno" value=""/>
				</tr>
				<tr>		
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>  
				<tr>
				  <td>SMS</td>
				  <td><textarea id="office_stuff_sms" rows="5" cols="30"></textarea></td>
				</tr>
				<tr>		
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>		
				  <td>&nbsp;</td>
				  <td><input type="button" id="office_stuff_sms_send_btn" class="form-submit" value="Submit"/></td>
				</tr>				
			</table>
			<br/><br/>
		
			<div id="office_stuff_sms_datatable"></div>
			

			
		</fieldset>
      </div>
      <!-- /tab02 -->
    </div>
    <!-- /content 

	-->
	
<script type="text/javascript">
$(document).ready(function(){
    //alert('js');
	 $("#class_id").change(function(){
	   var class_id = $('#class_id').val();
	    $.ajax({
			type:"post",
			url:"includes/parents_mobileno_fetch_by_ajax.php" ,
			data:"class_id="+class_id ,
			success:function(st){
			     //alert(st);
				$("#parent_mobileno").val(" ");
				$("#parent_mobileno").val(st);			   
			}
		});
		
			$("#parent_sms_datatable").load("includes/parent_sms_datatable.php",
			{"class_id":class_id,"parent_sms":parent_sms,
			"parent_mobileno":parent_mobileno},function(){});
			$("#parent_sms").focus();
	});		
	
	$("#confirm_sms_send_to_parents").live("click",function(){
	   var c = confirm('Are you sure want to remove this data?');
	   if(c==true)
	    {
		 
		}else{
		  return false;
		}
	});	
	
	
	$("#stuff_type").change(function(){
		var stuff_type = $('#stuff_type').val();
		 $.ajax({
	      type:"post" ,
		  url:"includes/stuff_mobileno_fetch_by_ajax.php" ,
		  data:"stuff_type="+stuff_type ,
		  success:function(st) {
		     //alert(st);
			 $("#stuff_mobileno").val(" ");
			 $("#stuff_mobileno").val(st);
		  }
	   });	    
	   
	    $("#office_stuff_sms_datatable").load("includes/office_stuff_datatable.php",
			{"stuff_type":stuff_type,
			"stuff_mobileno":stuff_mobileno,
			"office_stuff_sms":office_stuff_sms},function(){});
		$("#office_stuff_sms").focus();
	});
	
	$("#confirm_sms_send_to_office_stuff").live("click",function(){
	   var c = confirm('Are you sure want to remove this data?');
	   if(c == true) {
	   }else{
	     return false;
	   }
	});	
	
	
	$("#parent_sms_send_btn").click(function(){
	 	  
		var class_id 		= $("#class_id").val();
		var	parent_sms 		= $("#parent_sms").val();	  
		
		if(class_id=="") 
		{
		  alert("Select Class");
		  return false;
		}
		else if(parent_sms=="") 
		{
		  alert("Enter Sms body");
		  $("#parent_sms").focus();
		  return false;
		}
		else
		{
		 var c= confirm("Are you sure want to send SMS?");     
		  if(c==true){
		  }else{
			 return false;
		  }
		}  
	});

	
	$("#office_stuff_sms_send_btn").click(function(){
	 	var stuff_type = $('#stuff_type').val();	   
	    var office_stuff_sms = $("#office_stuff_sms").val();	  
		
	  if(stuff_type=="")	 {
	    alert("Select Stuff Type");
		return false;
	  }else if(office_stuff_sms==""){
	    alert("Enter Sms body");
		$("#office_stuff_sms").focus();
		return false;
	  }else{
		  var c= confirm("Are you sure want to send SMS?");	
		  if(c==true){
		  }else{
			 return false;
		  }
	  }
	});	
});
</script>	