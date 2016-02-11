<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	
	  <fieldset><legend>Teacher Attendance Info</legend>
						<table width="100%"  border="0" cellpadding="0" cellspacing="0">	 

								<tr>								
									 <th>Class</th>
									 <td>
										 <select id="class_id"  class="styledselect-normal">
													 <option value="0" selected>select class</option>									 
										 <?php $qry = mysql_query("select id,class_name from std_class_config where branch_id='$branchid'"); 
											while ($row=mysql_fetch_array($qry)){ ?>
												 <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
											<?php }  ?>	 
											
										 </select>						 
										 <!--  class="inp-form" -->
									 </td>
								</tr>											
                                <tr><td colspan="4">&nbsp;</td></tr>
								<tr>								
									 <th>Year</th>
									 <td>
											 <select id="year_id"  class="styledselect-normal">
														 <option value="<?php echo date('Y');?>" selected><?php echo date('Y');?></option>
														 <?php
														     for($i=2000;$i<=2050;$i++) {
															      if($i != date('Y')) {  ?>
																			<option value="<?php echo $i;?>"><?php echo $i;?></option>																    
															<?php	  }
															 }
														 ?>
											 </select>						 
											 <!--  class="inp-form" -->
									 </td>
                                     <td colspan="2">&nbsp;</td>									 
								</tr>											
								 <tr><td colspan="2">&nbsp;</td></tr>
								<tr>								
									 <th>Month</th>
									 <td>
											 <select id="month_id"  class="styledselect-normal">
														 <?php
														          $st = "select distinct month from tbl_teacher_attendance_info";
																  $ss = mysql_query($st);
																  while($rss = mysql_fetch_array($ss) ) {  ?>
																              <option value="<?php echo $rss[0];?>"> <?php echo $rss[0];?></option>
														<?php	  }	 ?>
											 </select>						 
											 <!--  class="inp-form" -->
									</td>
                                     <td colspan="2">&nbsp;</td>									 
								</tr>																			
								
								
      						<tr><td colspan="4">&nbsp;</td></tr>
							<tr>	
								     <td>&nbsp;</td>
									 <td> <button type="button"  class="form-submit" id="result_process_btn">Promotion</button> </td>
									 <th colspan="2">&nbsp;</th> 
							</tr>										
                        </table>								
						
         				<div  id="teacher_attendacne_info"></div>
            </fieldset>	
    </div>
</div>
<!-- /content -->
<!-- exam_mark_setting.php -->