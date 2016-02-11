<script>
function get_clos()
{		
 Window.close();		  
}
</script>
<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
<?php
	include('../db.php') ;

		   $grade_id=$_POST["grade_id"];
		   $grade=$_POST["grade"];
		   $start_mark=$_POST["start_mark"];
		   $end_mark=$_POST["end_mark"];
		   $branch_id=$_POST["branchid"];

	 
	if($grade!=="" && $sub_action=='delete')  {	
		delete_record($grade_id,$branch_id);	     
	}
	   
	function delete_record($grade_id,$branch_id)
	{
?>
		   <form name="frm_d" id="frm_d" action="" method="post">
				<fieldset>
				<legend>Delete Records</legend>
				   <table>
					  <tr><td > Click OK or Cancel </td></tr>
					  <tr>
						  <td>   <input type="submit" value="OK" name="ok_btn"  />
							<input type="button" value="Cancel" name="can_btn" id="can_btn" onclick="get_clos();"/></td>
					  </tr>
					</table>
				</fieldset>
			</form>
<?php  
	
			if (isset($_POST['ok_btn']))
			{	    
				$res="delete from std_subject_config where id='$sub_id' and branch_id='$branch_id'";
				mysql_query($res);	   
				if($res){
					echo "delete successfully";
				}else{
					echo "error";
				}
			}
	}
	if($grade!=="" && $sub_action=='detail') {	
	     detail_record($grade,$start_mark,$end_mark,$branchid);
	}
	   
	function detail_record($grade,$start_mark,$end_mark,$branchid)
	{
?>
		  <fieldset>
			<legend>Detail About Grade</legend>
			   <table>				
				 <tr>
				  <td> Grade: </td><td><?Php echo $grade; ?> </td></tr><tr>
				  <td> From Mark:</td><td> <?Php echo $start_mark; ?> </td></tr><tr>
				  <td> To Mark: </td><td><?Php echo $end_mark; ?> </td></tr><tr>
				 <tr>
			  </table>
		  </fieldset>
<?php    
	}
	
	if($grade!=="" && $sub_action=='edit')  {	
	 edit_record($grade,$start_mark,$end_mark,$branchid);
	}
	   
	function edit_record($grade,$start_mark,$end_mark,$branchid)
	{
?>   
		  <form name="frm_e" id="frm_e" action="" method="post">	  
		  <fieldset> 
		  <legend>Edit Records</legend>	
		   <table>         
			  <tr><td> Grade        :</td><td><input type="text" name="sub_name" value="<?php echo $grade; ?>" /></td></tr>
			  <tr><td> From Mark     :</td><td><input type="text" name="ct_mark" value="<?php echo $start_mark;  ?>" /></td></tr>
			  <tr><td> To Mark     :</td><td><input type="text" name="st_mark" value="<?php echo $end_mark;  ?>" /></td></tr>
			   <tr><td><input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" /></td></tr>
			  <tr><td><input type="submit" name="edit_btn" value="submit" />			
			 
			</table>
		  </fieldset>
		  </form>	
<?php  	
		if (isset($_POST['edit_btn']))
		{  
		
		
		   $grade_id=$_POST["grade_id"];
		   $grade=$_POST["grade"];
		   $start_mark=$_POST["start_mark"];
		   $end_mark=$_POST["end_mark"];
		   $branch_id=$_POST["branchid"];
			
			$ress="UPDATE std_subject_config SET subject_name='$sub_name',sub_mark='$sub_mark',ct_mark='$ct_mark',st_mark='$st_mark',final_mark='$full_mark' WHERE id='$sub_id' and branch_id='$branch_id'";
			
			$sqll=mysql_query($ress); 
			if($sqll)
			{
			   echo "Update Successfully";
			} else {
			   echo "Error ";
			}  
				 
		}    
	}
?>