<script>
function get_clos()
{		
 Window.close();		  
}
		function redirect_to_parent()
		{
			parent.parent.window.location= "";
			parent.parent.GB_hide();
		}						
</script>
<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 
<body onunload="redirect_to_parent();">
<?php
	include('../db.php') ;

	   $grade_id	=trim($_GET["grade_id"]);
	   $grade		=trim($_GET["grade"]);
	   $start_mark  =trim($_GET["start_mark"]);
	   $end_mark    =trim($_GET["end_mark"]);
	   $branch_id   =trim($_GET["branchid"]);
	   $sub_action  =trim($_GET['sub_action']);
	   $point       =trim($_GET['point']);
	 
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
				$res="delete from tbl_grade_setting where id=$grade_id and branchid=$branch_id";
				mysql_query($res);	   
				if($res){
					echo "Deleted successfully";
				}else{
					echo "error";
				}
			}
	}
	if($grade!=="" && $sub_action=='detail') {	
	     detail_record($grade_id,$grade,$start_mark,$end_mark,$branch_id,$point);
	}
	   
	function detail_record($grade_id,$grade,$start_mark,$end_mark,$branch_id,$point)
	{
?>
		  <fieldset>
			<legend>Detail About Grade</legend>
			   <table>				
				 <tr>
				  <td> Grade: </td><td><?Php echo $grade; ?> </td></tr><tr>
				  <td> From Mark:</td><td> <?Php echo $start_mark; ?> </td></tr><tr>
				  <td> To Mark: </td><td><?Php echo $end_mark; ?> </td></tr><tr>
				  <td> Point: </td><td><?Php echo $point; ?> </td></tr><tr>				  
				 <tr>
			  </table>
		  </fieldset>
<?php    
	}
	
	if($grade!=="" && $sub_action=='edit')  {	
	 edit_record($grade_id,$grade,$start_mark,$end_mark,$branch_id,$point);
	}
	   
	function edit_record($grade_id,$grade,$start_mark,$end_mark,$branch_id,$point)
	{
?>   
		  <form name="frm_e" id="frm_e" action="" method="post">	  
		  <fieldset> 
		  <legend>Edit Records</legend>	
		   <table>         
			  <tr><td> Grade        :</td><td><input type="text" name="grade" value="<?php echo $grade; ?>" /></td></tr>
			  <tr><td> From Mark     :</td><td><input type="text" name="start_mark" value="<?php echo $start_mark;  ?>" /></td></tr>
			  <tr><td> To Mark     :</td><td><input type="text" name="end_mark" value="<?php echo $end_mark;  ?>" /></td></tr>
			  <tr><td> Point     :</td><td><input type="text" name="point" value="<?php echo $point;  ?>" /></td></tr>			  
			   <tr><td><input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" /></td></tr>
			   <input type="hidden" name="grade_id" id="grade_id" value="<?php echo $grade_id;?>"/>
			  <tr><td><input type="submit" name="edit_btn" value="submit" />			
			 
			</table>
		  </fieldset>
		  </form>	
<?php  	
		if (isset($_POST['edit_btn']))
		{  		
		
		   $grade_id   =trim($_POST["grade_id"]);
		   $grade      =trim($_POST["grade"]);
		   $start_mark =trim($_POST["start_mark"]);
		   $end_mark   =trim($_POST["end_mark"]);
		   $branch_id  =trim($_POST["branch_id"]);
		   $point      =trim($_POST["point"]);
			
			$ress="UPDATE tbl_grade_setting SET grade='$grade',mark_start=$start_mark,mark_end=$end_mark,point=$point WHERE id=$grade_id";
			
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
</body>
</html>