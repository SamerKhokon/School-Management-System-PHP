



   <link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />
   <link id="skin-win2k" title="Win 2K" type="text/css" rel="alternate stylesheet" href="src/css/win2k/win2k.css" />
   <link id="skin-steel" title="Steel" type="text/css" rel="alternate stylesheet" href="src/css/steel/steel.css" />
   <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="src/css/gold/gold.css" />
   <link id="skin-matrix" title="Matrix" type="text/css" rel="alternate stylesheet" href="src/css/matrix/matrix.css" />




 <script src="src/js/jscal2.js"></script>
 <script src="src/js/lang/en.js"></script>
    
<script type="text/javascript">
jQuery(document).ready(function(){  





	    $("#class_id").click(function()
		{
		var class_id=$("#class_id").val();
		$("#section_id").load('includes/phpfunction.php?fn_name=std_fee_generator_form_section_id&parm='+class_id);		
		});
		
		
	    $("#section_id").click(function()
		{
		var section_id=$("#section_id").val();
			var class_id=$("#class_id").val();
		
		$("#student_roll").load('includes/phpfunction.php?fn_name=std_fee_generator_form_student_roll&parm='+class_id+'-'+section_id);		
		});
		
	
	
	
	
$("#gen_fixed_fee").click(function()
  {
  
  
var dataString="";

var btn_value=jQuery("#gen_fixed_fee").val();
  
var class_id=jQuery("#class_id").val();
var sec_id=jQuery("#section_id").val();
var yearmonth=jQuery("#yearmonth").val();
var branchid=jQuery("#branchid").val();

    var val = [];
	var check="";
    $(':checkbox:checked').each(function(i){
      val[i] = $(this).val();
	  check=check +","+ val[i];
    });


  
  
  
  
   dataString="field="+check+"&yearmonth="+yearmonth+"&class_id="+class_id+"&sec_id="+sec_id+"&branchid="+branchid+"&btn_value="+btn_value;

//   alert(dataString);
//   alert(btn_value);

   $.ajax({  
     type: "POST",  
     url: "includes/edit_std_fee_generator.php",  
     data: dataString,  
     success: function()
	 {  
	 alert("Data sucessfully updated......");
				   
     }  
   });  
    return false;
  });
  
  
  
  
  
  
  $("#btn_abs_day").click(function()
  {
  
  
var dataString="";
 var btn_value=jQuery("#btn_abs_day").val();
 
 var std_abs_day=jQuery("#abs_day").val();
var class_id=jQuery("#class_id").val();
var sec_id=jQuery("#section_id").val();
var yearmonth=jQuery("#yearmonth").val();
var branchid=jQuery("#branchid").val();
var std_roll=jQuery("#student_roll").val();
  
   dataString="yearmonth="+yearmonth+"&class_id="+class_id+"&sec_id="+sec_id+"&branchid="+branchid+"&btn_value="+btn_value+"&std_roll="+std_roll+"&std_abs_day="+std_abs_day;
   alert(dataString);
   alert(std_abs_day);
   
   
      $.ajax({  
     type: "POST",  
     url: "includes/edit_std_fee_generator.php",  
     data: dataString,  
     success: function()
	 {  
	 alert("Data sucessfully updated......");
				   
     }  
   });  
   

});


$("#gen_pay_slip").click(function()
{


var dataString="";
 var btn_value=jQuery("#gen_pay_slip").val();
alert(btn_value); 
 
var class_id=jQuery("#class_id").val();
var sec_id=jQuery("#section_id").val();
var yearmonth=jQuery("#yearmonth").val();
var branchid=jQuery("#branchid").val();

  
   dataString="yearmonth="+yearmonth+"&class_id="+class_id+"&sec_id="+sec_id+"&branchid="+branchid+"&btn_value="+btn_value;
   alert(dataString);
   //alert(std_abs_day);
   
   
      $.ajax({  
     type: "POST",  
     url: "includes/edit_std_fee_generator.php",  
     data: dataString,  
     success: function()
	 {  
	 alert("Data sucessfully updated......");
				   
     }  
   });  
   

  
});
  
  
  



		

});
	</script>
	<div id="content" class="box">
	
      
      
	  
     
	  
	  
	  <h3 class="tit" align="right">Generate Student Fee</h3>
	  <hr/>
	  
	  <?php
	  echo date('Ymd-s-',time()).rand(10,1000);
	  ?>
	  
	  
	  <div class="tit">
	  <fieldset>
	  <legend>Select Fee info</legend>
<table width="100%" border=1>
<tr>

<td width="50%">		
			


         		<div>
				<label for="name">Payment Generate For</label>			
				<input  type="text" id="yearmonth" name="yearmonth" readonly="readonly" value="<?php echo date('Y-m')?>">		
               <script type="text/javascript">
                  new Calendar({
                          inputField: "yearmonth",
                          //dateFormat: "%Y-%m-%d",
						  dateFormat: "%Y-%m",
                          trigger: "yearmonth",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                 
                </script>								
				</div>
			
						
			<div>
				<label for="Name"> Class Name*</label> 				
				<select id="class_id" name="class_id">
				<?php 
		$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 		
		
		while ($row=mysql_fetch_array($qry))
		{
		echo "<option value=\"$row[0]\">$row[1]</option>";
		}
		?>
		</select>
		</div> 
			   
			   
			   <div>
				<label for="Name">Section Name*</label> 				
				<select id="section_id" name="section_id">
				
				
				  
		     </select>
			</div>
			
			<div>
								
				<input type="hidden" id="branchid" name="branchid" value="<?php echo $branchid;?>">

				</div>
			
		
			

				
			
</td>

		
		
		</tr>
		</table>	
		
		</fieldset>
		
		
		
		
		
		
		<div class="tabs box">
        <ul>
          <li><a href="#fixed_fee"><span>Generate Fixed Fee</span></a></li>
          <li><a href="#ind_fee"><span>Enter Absent day</span></a></li>
          <li><a href="#gen_pay_slip"><span>Genarate payment Slip</span></a></li>
		  
        </ul>
      </div>
	  
	  <div id="fixed_fee">
	
				<div>
				
			
			
			
	  
	    <?php 
		$qry = mysql_query("show columns from std_class_config where field like '%fee'"); 				
		while ($row=mysql_fetch_array($qry))
        {
        echo "<input type=\"checkbox\" name=\"$row[0]\" value=\"$row[0]\">$row[0]<br>";
        }			
		
		?>		
				
			</div>
			
	   <button id="gen_fixed_fee" value="fixed_fee">
 Generate payment Slip
 </button>
	  
	  
	  
      </div>
		
		<div id="ind_fee">
	  <fieldset>
		<legend>Enter Student Individual Info</legend>
		<table>
		<tr>
		<td>
		
			   <div>
				<label for="roll">Roll*</label> 				
				<select id="student_roll" name="student_roll">					  
		        </select>
			 
			</div>
		
		
		
			   <div>
				<label for="roll">Days of absent*</label> 				
		
		
		<input id="abs_day" type ="text" name="abs_day"/>
		
		 <button id="btn_abs_day" value="btn_abs_day">
roll
 </button>
		
		</div>
		
		
		</td>
		</tr>
		</table>
		
		</fieldset>
		
		
		
	  
      </div>
	  
		<div id="pay_slip">

	  
	  <button id="gen_pay_slip" value="gen_pay_slip">
      Generate Payslip
      </button>
	  
	  
      </div>
	  
		
		
		
		
			
	


   
     </div>
    </div>
    <!-- /content -->
	
	