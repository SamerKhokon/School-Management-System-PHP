<?php include("../db.php"); session_start();?>
<script type="text/javascript">
  $(document).ready(function()  {
     
		$("#set_promotion").click(function(){
		        var class_id = $('#class_id').val();
				var term_id  = $('#term_id').val();
				var rollno   = $('#rollno').val();
				var branchid = $('#branchid').val();
				$('#promotion_datatable').load('includes/promotion_datatable_by_ajax.php',
				{'class_id':class_id,'branchid':branchid},
				function(){});
		});
  });
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	
	<fieldset>
		<legend>Student Promotion</legend>
		<table width="100%"  border="0" cellpadding="0" cellspacing="0">	 
			<tr>			
				<th>Class</th>
				<td>
					 <select id="class_id"  class="styledselect-normal">
					 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
						while ($row=mysql_fetch_array($qry)){ ?>
							 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
						<?php }  ?>	
					 </select>						 
				</td>
			</tr>			
			
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr>	
				 <th >&nbsp;</th> 
				 <td> <button type="button"  class="form-submit" id="set_promotion">Promotion</button> </td>
			</tr>										
		</table>		
	</fieldset>		
		<div  id="promotion_datatable"></div>
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->