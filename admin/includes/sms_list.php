<script type="text/javascript">
        $(document).ready(function(){			   
			              $('#example').dataTable( {
							"sPaginationType": "full_numbers"				
				   			    } );
			   
						  $("#class_name").focus();										  
						           	$("#class_name").keydown(function(event)
								     {
									     if(event.keyCode == 13 )									   
								   			{
										 		$("#sub_btn").focus();
											}									
									});
									$("#sub_btn").click(function(event)
								    {									
									//var class_name=$("#class_name").val();
								//	var sec_name  =$("#sec_name").val();
									});														
	    });	
</script>

<div id="content" class="box">


<fieldset class="login">
<legend>SMS Archive</legend>
<form name="frm1" id="frm1" method="post" action="">

<table border="0" cellpadding="0"  cellspacing="0">
			<tr>
				<th valign="top">Class Name: &nbsp;&nbsp;</th>
				<td>
				
				<select id="class_name" name="class_id" class="styledselect-normal">
                                    <option>Select</option>
				<?php 
        		$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 				
		        while ($row=mysql_fetch_array($qry))		{
		        echo "<option value=\"$row[0]\">$row[1]</option>";
		         }
		          ?>
				</select>
				</td>
	            <td>
				<div class="error-left"></div>
				<div class="error-inner"><p id="err_rep">This field is required.</p></div>
				</td>	
			</tr>
		
		
			<tr>
            	<td height="6"></td>
            </tr>
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" name="submit" class="form-submit" id="sub_btn" />
			<input type="button" value="" name="reset" class="form-reset"  />
		</td>
		<td></td>
	</tr>
		
	</table>

</form>
</fieldset>


<table width=100% id="jq_tbl">	
<div id="demo">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>					
						  <th>Occation</th>
						  <th>SMS</th>
						  <th>Date</th>
						</tr>
					</thead>
					<tbody>
				 <?php
				// $url='?SM_id='.$_REQUEST['SM_id'].'&menu_id='.$_REQUEST['menu_id'].'&nev=student_profile_information_view';
					if (isset($_POST['submit'])){ ?>
						 <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							</tr>		
					<?php} ?>		
					</tbody>
					<tfoot>
						<tr>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
					</tfoot>
				</table>
				</div>
				</table>
</div>