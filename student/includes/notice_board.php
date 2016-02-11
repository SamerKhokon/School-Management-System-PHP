<div id="content" class="box">
	<?php  require_once("../db.php"); session_start();  $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>


    <fieldset>
		    <legend>Notice Board</legend>
					

			    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
				             
					<tr><td>		 
						<table width="60%"  border="0" cellpadding="0" cellspacing="0">	 
						        <tr>	
									 <th>Notice type</th> 
									 <td> <select id="notice_type" class="styledselect-normal">
									        <option value="all">All</option>
									        <option value="custom">Custom</option>											
									 </select> </td>
									 <td>&nbsp;</td>
									 <td>&nbsp;</td>
								</tr>															
								<tr id="custom" style="display:none;">	
									 <th>From</th> 
									 <td> 
									 <input type="text" onclick='scwShow(this,event);'  class="inp-form"  
									id="notice_date_from" name="notice_date_from" value="<?php echo date('d-m-Y');?>" readonly="readonly" /> 
									</td>
									
									 <th>To</th> 
									 <td> <input type="text" onclick='scwShow(this,event);'  class="inp-form"  
									id="notice_date_to" name="notice_date_to" value="<?php echo date('d-m-Y');?>" readonly="readonly" /> </td>									
								</tr>															
								<tr>	
									 <td> &nbsp; </td>
								</tr>									
								<tr>	
									 <th>&nbsp;</th> 
									 <td> <button type="button"  class="form-submit" id="notice_search">Submit</button> </td>
									 <td>&nbsp;</td><td>&nbsp;</td>
								</tr>										
							</table>	 
						</td>		 
						<td>		 
					</td>
                </tr>
             </table>		

					
			<br/>						
			<br/>		
			<br/>		
				
			<div id="notice_list_table"></div>
	
	</fieldset>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){   
 
	var data_table = function(notice_type , date_from , date_to) 
	{
		$("#notice_list_table").load("includes/notice_list.php",
		{'notice_type':notice_type,
		'date_from':date_from,
		'date_to':date_to 
		},
		function(){});
	}       
    data_table('' , '' , '');
   
    $("#notice_type").change(function(){
	    var notice_type = $("#notice_type").val();     
		if(notice_type=="all") 
		{
		  $("#custom").hide();
		}
		else if(notice_type="custom") 
		{
		  $("#custom").show();
		}
		else
		{
		  $("#custom").hide();
		}
	}); 
   
    $("#notice_search").click(function(){
        var notice_type = $("#notice_type").val();
		var date_from  = $("#notice_date_from").val();
		var date_to    = $("#notice_date_to").val();
		
		//var dataStr ="notice_type="+notice_type+"&date_from="+date_from+"&date_to="+date_to;
		//alert(dataStr);
	    data_table(notice_type,date_from , date_to);   		
    });
});
</script>