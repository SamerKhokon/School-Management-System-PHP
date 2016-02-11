	<script type="text/javascript">
	 $(document).ready(function(){    
		 $('#voucher_detail_show').load('includes/voucher_list_display.php',{ 'class_id' : ''  ,  'roll' : ''  },function(){});				
		
        $("#class_id").change(function(){
		    var class_id = $("#class_id").val();
			var roll = $("#roll").val();	
			$('#voucher_detail_show').load('includes/voucher_list_display.php',{ 'class_id' : class_id  ,  'roll' : roll  },function(){});							
		});

		$("#voucher_submit").click(function() {
		        var class_id = $("#class_id").val();
				var roll = $("#roll").val();				 
                var dataStr = 'class_id='+class_id +'&roll='+roll;
				
				if(class_id=="" ) 
				{
					class_id = 0;
				}else {
					class_id = class_id;
				}
				if(roll == "0") {
					roll = 0;
				} else 
				{
					roll = roll;
				}
				//window.open("../fee_voucher_new.php","_blank");
			    $('#voucher_detail_show').load('includes/voucher_list_display.php',
				{ 'class_id' : class_id  ,  'roll' : roll  },function(){});				
		});		
	 });
	</script>	
<div id="content" class="box">
	
<fieldset>
	<legend>Student Fee Collection</legend>	
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
								<tr>	
									 <th>Roll</th> 
									 <td> <input type="test"  class="inp-form" id="roll"/> </td>
								</tr>								
								<tr>	
									 <td> &nbsp; </td>
								</tr>									
								<tr>	
									 <th>&nbsp;</th> 
									 <td> 
									 <input type="button" id="voucher_submit" class="form-submit"/>
									 </td>
								</tr>										
				</table>
				 
				 <br/> 
				 
                <br/> 
				<div id="voucher_detail_show"></div>
	</fieldset>	
</div>