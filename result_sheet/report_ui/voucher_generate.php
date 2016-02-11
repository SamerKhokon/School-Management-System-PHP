<script type="text/javascript">
	$(document).ready(function()  
	{
		var search_report = function(class_id,month_id)
		{
		//alert(class_id+"  "+sub_code+"  "+year_id +"  "+term_id);
			window.showModalDialog("../result_sheet/voucher.php?class_id="+class_id+
			"&month_id="+month_id	, "mywindow" , "dialogWidth:1000px;dialogHeight:800px;");					
		}
		
        $('#term_result').click(function(){
		    var class_id = $("#class_id").val();
			var month_id  = $("#month_id").val();
			search_report(class_id,month_id);			
		});		
		
		
	});
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Term Result Report</legend>
			
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
				<tr>	
			 <td colspan="4"> 
			 <button type="button"  class="form-submit" id="term_result">Submit</button>
			 </td>												 
				</tr>		
				</table>		
			</fieldset>	
				<br/>		
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->