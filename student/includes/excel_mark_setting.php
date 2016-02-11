<script type="text/javascript">
  $(document).ready(function()  {  
  });
</script>
<div id="content" class="box">

	<input type="hidden" id="branchid" name="branchid" value="<?php echo $_SESSION['LOGIN_BRANCH'];?>"/>
	<?php $branchid = $_SESSION['LOGIN_BRANCH']; ?>

    <fieldset>
		    <legend>Exam Marks Entry(Upload Excel file)</legend>
			    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
				</table>	
				
						
				<!-- <img src="./../upload/Penguins.jpg" /> -->
				 <form method="post" action="?menu_id=11&nev=exam_mark_setting_file_upload" enctype="multipart/form-data">				   				
				    <table>
						    <tr>				      
								 <td colspan="10"><a href="./../upload/mark_result.xls">Sample File</a></td>						    
						     </tr>				   					
						    <tr>				      
								 <td>Uload your file: &nbsp; &nbsp;</td>
								 <td><input type="file" name="excel_file"/></td>
								 <td colspan="4">&nbsp;</td>						    
						         <td colspan="6"><input type="submit" value="upload"/></td>
							 </tr>				   
				    </table>
				</form>
	</fieldset>			
    </div>
</div>
<!-- /content -->

<!-- exam_mark_setting.php -->
<!-- excel_mark_setting.php   -->