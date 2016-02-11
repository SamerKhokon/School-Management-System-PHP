<?php 		require_once("../db.php");	
session_start();				
					$branchid = $_SESSION['LOGIN_BRANCH'];

?>	
<div  id="content" class="box">        
		<fieldset >
		<legend>Book List</legend>
		<table ><tr>
						<tr>
							<th>Class Name : </th>
							<td> 
								  <select id="class_name" name="class_name" class="styledselect-normal">
									<option value="0">select any class</option>
										<?php 
											$qry = mysql_query("select id,class_name from std_class_config where branch_id=$branchid"); 										
											while ($row=mysql_fetch_array($qry))		{
											echo "<option value=\"$row[0]\">$row[1]</option>";
											}
										?>
									</select>
							</td>
							</tr>
							<tr><td colspan="2">&nbsp;</td></tr>
							<tr><td>&nbsp;</td>
							<td><input type="button" value="Submit" id="" class="form-submit" />  </td>
						</tr>                
			</table>			
			
			<br/><br/>
					<div id="book_list_display_databale"></div>	
		</fieldset>
</div>			

<script type="text/javascript">
$(document).ready(function(){
        
		$("#book_list_display_databale").load("includes/book_list_datable.php", 
		{   'class_id': '0'	},	function(){});	
		
		$("#class_name").change(function(){
		    var class_name =$("#class_name").val();
		    if(class_name =="" || class_name ==0) {
			   alert("Select Class");
			   return false;
			}else{
				$("#book_list_display_databale").load("includes/book_list_datable.php", 
				{   'class_id': class_name	},	function(){});				   
			}
		});
		
});
</script>