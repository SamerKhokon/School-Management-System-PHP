<script type="text/javascript">
 $(document).ready(function(){
    $('#fail_student_list').load('includes/fail_student_list_by_ajax.php',function(){});
});	
</script>

<div id="content" class="box">
				<input type="hidden" id="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH']; ?>"/>
				<fieldset>
					<legend>Fail Student List</legend>
								<table width="81%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<th width="24%" valign="top">Class :&nbsp;&nbsp;</th>
											<td width="18%"><select  id="employeeid" class="inp-form">
											   <option value="0" selected>select class</option>
											  <?php  $str = "select id,class_name from std_class_config";
											  $sql = mysql_query($str);
											  while($res = mysql_fetch_array($sql)) { ?>
											  <option value="<?php echo $res[0];?>"><?php echo $res[1];?></option>
											  <?php } ?>
											</select></td>
											<td width="17%"></td>
											<th width="20%" valign="top"> Year:</th>
											<td width="21%"><select id="medical" class="inp-form">
											<option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
											<?php for($i=2000;$i<=2050;$i++) { 
																if($i != date('Y')) {
											?>
											<option value="<?php echo $i;?>"><?php echo $i;?></option>											
											<?php }   
											} ?>
											</select></td>
										</tr>
								</table>					
				</fieldset>    
				<input type="button" id="sub_btn" name="sub_btn" class="form-submit" />	
				<div id="fail_student_list"></div>	
</div>