<script type="text/javascript">
	$(document).ready(function()  
	{
		var search_report = function(month_id)
		{
			window.showModalDialog("../result_sheet/salary_sheet_result.php?month_id="+month_id	,
			"mywindow" , "dialogWidth:1400px;dialogHeight:600px;");					
		}
		
        $("#salary").click(function(){		   
			var month_id  = $("#month_id").val();
			if(month_id == "")
			{
			  alert("Please select month");
			  return false;
			 }else{
				search_report(month_id);			
			}
		});		
		
		
	});
</script>
<div id="content" class="box">
 <?php session_start();
	  require_once("../db.php");?>
	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Salary Sheet</legend>
			
			    <table  width="100%"  border="1" cellpadding="0" cellspacing="0">
				<tr>
				  <td>Month</td>
				  <td>
				     <?php   
						$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
					 
					 ?>
					 <select id="month_id"  class="styledselect-normal">
					 <?php for($i=0;$i<count($months);$i++){ ?>
							 <option value="<?php echo $months[$i]."-".date('Y');?>"><?php echo $months[$i]."-".date('Y');?></option>
						<?php }  ?>	 						
					 </select>						 												  
				</td>
				</tr>
				<tr> <th>&nbsp;</th> </tr>	 
				<tr>	<th>&nbsp;</th> 
			 <td colspan="4"> 
			 <button type="button"  class="form-submit" id="salary">Submit</button>
			 </td>												 
				</tr>		
				</table>		
			</fieldset>	
				<br/>		
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->