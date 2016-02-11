<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>
	
	  <fieldset><legend>SMS Notification</legend>
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
									 <th>Message</th>
									 <td>
											 <textarea id="year_id"  row="30" cols="20"></textarea>
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