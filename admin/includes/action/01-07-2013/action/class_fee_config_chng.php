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
      $id=$_GET['id'];
	  $sub_action=$_GET['sub_action'];
	  $fee_name = $_GET['fee_name'];
	  $fee_amount = $_GET['fee_amount'];
	  $branch_id=$_GET['branch_id'];
	 
	 if($id!=="" && $sub_action=='delete')
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
	    $res="delete from std_class_config where class_name='$id' and branch_id='$branch_id'";
        mysql_query($res);	   
	      if($res)
	             {
			   		   echo "delete successfully";
			     }else {
			  		   echo "error";			   
			  	}
	      }
	}
	if($id!=="" && $sub_action=='detail')
	{
	     detail_record($fee_name,$fee_amount,$branch_id);	     
	}	   
	function  detail_record($fee_name,$fee_amount,$branch_id)
	{
?>
	   	<fieldset>
		<legend>Detail About CLASS</legend>
	   <table>        
		  <tr><td> Fee Name:      </td><td> <?Php echo $fee_name; ?> </td></tr>
		  <tr><td> Fee Amount:    </td><td> <?Php echo $fee_amount; ?> </td></tr><tr>					
      </table>
	  </fieldset>
	<?php    
	   }
	    if($id!=="" && $sub_action=='edit')
	   {	
	            edit_record($id,$fee_name,$fee_amount,$branch_id);	     
	   }
	   
	   function edit_record($id,$fee_name,$fee_amount,$branch_id)
	   {
?>	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
		<input type="hidden" name="class_name" value="<?php echo $id;?>" />	         
		<tr><td> Fee Name:</td><td><input type="text" name="fee_name" value="<?php echo $fee_name; ?>" /></td></tr>
		<tr><td> Fee Amount:</td><td><input type="text" name="fee_amount" value="<?php echo $fee_amount; ?>" /></td></tr>
		<input type="hidden" name="branch_id" value="<?php echo $branch_id;?>" />	
		<tr><td><input type="submit" name="edit_btn" value="submit" />			
		</table>
	</fieldset>
	</form>
	<?php  
			if (isset($_POST['edit_btn']))
			{  
			   $class_name=$_POST["class_name"];
			   $fee_name=$_POST["fee_name"];
			   $fee_amount = $_POST['fee_amount'];
			   $branch_id=$_POST["branch_id"];      
				
				echo $ress="UPDATE std_class_config SET $fee_name='$fee_amount' where  class_name='$class_name' and branch_id='$branch_id'";
			
				$sqll=mysql_query($ress); 
				if($sqll)
				{
				   echo "Update Successfully";				   
				} 
				else
				{
					echo "Error ";
				}  					 
			}
	   }
?>
</body>
</html>