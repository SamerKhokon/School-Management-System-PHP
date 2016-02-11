<html>
<head>
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
</head>
<body onunload="redirect_to_parent();">
<?php
	 include('../db.php') ;
		$branch_id	= trim($_GET['branch_id']);
	    $sub_action = trim($_GET['sub_action']);
		$id 		= trim($_GET["id"]);
		$fee_head	= trim($_GET["fee_head"]);
		$category 	= trim($_GET["category"]);
		
	if($fee_head!=="" && $sub_action=='delete')  
	{	
	    delete_record($id,$branch_id);	     
	}	   
	function delete_record($id,$branch_id)
	{
?>
		   <form name="frm_d" id="frm_d" action="" method="post">
			<fieldset>
			<legend>Delete Records</legend>
			 <table>
			  <tr>
				 <td > Click OK or Cancel </td>
			  </tr>
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
				$res="delete from tbl_class_feehead where id=$id and branch_id=$branch_id";
				mysql_query($res);				   
				
				$del = "delete from tbl_class_fee_info where fee_head_id=$id and branch_id=$branch_id";
				mysql_query($del);				
				if($res)
				{
				  echo "delete successfully";
				}
				else
				{
				   echo "error";
				}
			}
	}
	
	if($fee_head!=="" && $sub_action=='detail')
	{	
	    detail_record($fee_head,$id,$category,$branch_id);	     
	}	   
	function detail_record($fee_head,$id,$category,$branch_id)
	{
?>
			<fieldset>
			<legend>Detail About Subject</legend>
			<table>        
				<tr><td>Fee Head: </td><td><?Php echo $fee_head; ?> </td></tr>
				<tr><td>Category:</td><td> <?Php echo $category; ?> </td></tr>				
			</table>
			</fieldset>
<?php    
	}
	if($fee_head!=="" && $sub_action=='edit')
	{	
	    edit_record($fee_head,$id,$category,$branch_id);	     
	}	   
	function edit_record($fee_head,$id,$category,$branch_id)
	{
 ?>	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>         
		  <tr><td> Fee Head        :</td><td><input type="text" name="fee_head" value="<?php echo $fee_head; ?>" /></td></tr>
		  <tr><td> Category:</td><td><input type="text" name="category" value="<?php echo $category; ?>" /></td></tr>
		   <tr><td><input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" /></td></tr>
		  <tr><td><input type="submit" name="edit_btn" value="submit" />					 
		</table>
		</fieldset>
		</form>	
<?php  	
			if (isset($_POST['edit_btn']))
			{  
				$fee_head  =trim($_POST["fee_head"]);
				$category  =trim($_POST["category"]);
				$branch_id =trim($_POST["branch_id"]);				
				$ress="UPDATE tbl_class_feehead SET fee_head='$fee_head',category='$category' WHERE id='$id' and branch_id='$branch_id'";						
				$sqll=mysql_query($ress); 				
				if($sqll){
					echo "Update Successfully";				   
				}else {
					echo "Error ";
				}  				 
			}		   	    
	}
?>
</body>
</html>