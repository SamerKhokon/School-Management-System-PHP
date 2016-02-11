<html>
<head>
<script>
function get_clos()
{		
 Window.close();		  
}
		function redirect_to_parent()
		{
			//parent.parent.window.location= "";
			parent.parent.GB_hide();
		}												
</script>
<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
</head>
<!--<body onUnload="redirect_to_parent();"> -->
<body>
<?php
	include('../db.php') ;

	   $id			=trim($_GET["id"]);
	   $class_id    =trim($_GET["class_id"]);
	   $title		=trim($_GET["title"]);
	   $author  	=trim($_GET["author"]);
	   $isbn    	=trim($_GET["isbn"]);
	   $branch_id   =trim($_GET["branch_id"]);
	   $sub_action  =trim($_GET['sub_action']);
	 
	if($id!=="" && $sub_action=='delete')  {	
		delete_record($id,$branch_id);	     
	}	   
	function delete_record($id,$branch_id)
	{
?>
		   <form name="frm_d" id="frm_d" action="" method="post">
				<fieldset>
				<legend>Delete Records</legend>
				   <table>
					  <tr><td > Click OK or Cancel </td></tr>
					  <tr>
						  <td>   <input type="submit" value="OK" name="ok_btn"  />
							<input type="button" value="Cancel" name="can_btn" id="can_btn" onClick="get_clos();"/></td>
					  </tr>
					</table>
				</fieldset>
			</form>
<?php  
	
			if (isset($_POST['ok_btn']))
			{	    
				$res="delete from std_book_list where id=$id and branch_id=$branch_id";
				mysql_query($res);	   
				if($res){
					echo "Deleted successfully";
				}else{
					echo "error";
				}
			}
	}
	if($id!=="" && $sub_action=='detail') {	
	     detail_record($id,$class_id,$title,$author,$isbn,$branch_id);
	}
	   
	function detail_record($id,$class_id,$title,$author,$isbn,$branch_id)
	{
?>
		  <fieldset>
			<legend>Detail About Book</legend>
			   <table>				
				 <tr>
				  <td> Class: </td><td><?Php echo 'Class-'.$class_id; ?> </td></tr><tr>				 
				  <td> Title: </td><td><?Php echo $title; ?> </td></tr><tr>
				  <td> Author:</td><td> <?Php echo $author; ?> </td></tr><tr>
				  <td> ISBN: </td><td><?Php echo $isbn; ?> </td></tr><tr>
				 <tr>
			  </table>
		  </fieldset>
<?php    
	}
	
	if($id!=="" && $sub_action=='edit')  {	
	 edit_record($id,$class_id,$title,$author,$isbn,$branch_id);
	}
	   
	function edit_record($id,$class_id,$title,$author,$isbn,$branch_id)
	{
?>   
		  <form name="frm_e" id="frm_e" action="" method="post">	  
		  <fieldset> 
		  <legend>Edit Records</legend>	
		   <table>         
   			  <tr><td> Class        :</td><td><input type="text" name="class_id" value="Class-<?php echo $class_id; ?>" /></td></tr>
			  <tr><td> Title        :</td><td><input type="text" name="title" value="<?php echo $title; ?>" /></td></tr>
			  <tr><td> Author     :</td><td><input type="text" name="author" value="<?php echo $author;  ?>" /></td></tr>
			  <tr><td> ISBN     :</td><td><input type="text" name="isbn" value="<?php echo $isbn;  ?>" /></td></tr>
			   <tr><td><input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" /></td></tr>
			   <input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
			  <tr><td><input type="submit" name="edit_btn" value="submit" />			
			 
			</table>
		  </fieldset>
		  </form>	
<?php  	
		if (isset($_POST['edit_btn']))
		{  		
		
		   $id   =trim($_POST["id"]);
		   $class_id = trim($_POST['class_id']);
		   $title      =trim($_POST["title"]);
		   $author =trim($_POST["author"]);
		   $isbn   =trim($_POST["isbn"]);
		   $branch_id  =trim($_POST["branch_id"]);
		   
		   $parse = explode("-",$class_id);
		   $classid = $parse[1];
			
			echo $ress="UPDATE std_book_list SET class_id=$classid,book_title='$title',book_author='$author',isbn='$isbn' WHERE id=$id";
			
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