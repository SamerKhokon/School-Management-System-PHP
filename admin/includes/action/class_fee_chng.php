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
	   $fee_name   =trim($_GET['fee_name']);
       $amount	   =trim($_GET['fee_amount']);
	   $sub_action =trim($_GET['sub_action']);
	   $branch_id  =trim($_GET['branch_id']);
	   $class_id   =trim($_GET['class_id']);
       $fee_head_id=trim($_GET['fee_head_id']);	   
       $fee_tbl_id =trim($_GET['id']);
	 
	if($fee_tbl_id!=="" && $sub_action=='delete')    {	
		delete_record($fee_tbl_id,$class_id,$branch_id);	     
	}	   
	function delete_record($fee_tbl_id,$class_id,$branch_id)
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
				<input type="button" value="Cancel" name="can_btn" id="can_btn" onClick="get_clos();"/></td>
		  </tr>
		</table>
		</fieldset>
		</form>
<?php  	
		if (isset($_POST['ok_btn']))
		{	    
			$res="delete from tbl_class_fee_info where id='$fee_tbl_id' and class_id=$class_id and branch_id='$branch_id'";
			mysql_query($res);	   
			if($res)
	        {
			   	echo "Deleted successfully";
			}else {
			  	echo "error";
			}
	    }
	     
	}
	if($fee_tbl_id!=="" && $sub_action=='detail')
	{	
	     detail_record($fee_name,$amount,$branch_id,$class_id,$fee_head_id,$fee_tbl_id);	     
	}	   
	function  detail_record($fee_name,$amount,$branch_id,$class_id,$fee_head_id,$fee_tbl_id)
	{
?>
	   	<fieldset>
		<legend>Detail About CLASS</legend>
		<table>        
		  <tr>
		  <td> Class Name:      </td><td> <?Php echo 'Class-'.$class_id; ?> </td></tr><tr>
		  <td> Fee Name:  </td><td> <?Php echo $fee_name; ?> </td></tr><tr>
		  <td> Amount:     </td><td> <?Php echo $amount; ?> </td></tr><tr>
		  <td> Branch Id:</td><td> <?Php echo $branch_id; ?> </td></tr>					
      </table>
	  </fieldset>
<?php    
	}
	if($fee_tbl_id!=="" && $sub_action=='edit')
	{	          
	
	    edit_record($fee_name,$amount,$branch_id,$class_id,$fee_head_id,$fee_tbl_id);	     
		
	}	   
	function edit_record($fee_name,$amount,$branch_id,$class_id,$fee_head_id,$fee_tbl_id)
	{
?>	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
		<tr><td> Class Name:</td><td><input type="text" name="class_name" value="<?php echo 'Class-'.$class_id; ?>" /></td></tr>
		<tr><td> Fee Name :</td><td><input type="text" name="fee_name" value="<?php echo $fee_name; ?>" /></td></tr>
		<tr><td> Amount :</td><td><input type="text" name="amount" value="<?php echo $amount;  ?>" /></td></tr>
		<tr><td>  </td><td><input type="hidden" name="fee_head_id" value="<?php echo $fee_head_id; ?>" /></td></tr>
		<input type="hidden" name="branch_id" value="<?php  echo $branch_id; ?>" />
		<input type="hidden" name="class_id" value="<?php  echo $class_id; ?>" />
		<input type="hidden" name="fee_tbl_id" value="<?php  echo $fee_tbl_id; ?>" />	
		<tr><td><input type="submit" name="edit_btn" value="submit" />			
		</table>
		</fieldset>
		</form>
<?php  
		if (isset($_POST['edit_btn']))
		{  
		   $class_name =trim($_POST["class_name"]);
		   $fee_name   =trim($_POST["fee_name"]);
		   $amount     =trim($_POST["amount"]);
		   $fee_head_id=trim($_POST["fee_head_id"]);
		   $branch_id  =trim($_POST["branch_id"]);
		   $class_id   =trim($_POST["class_id"]);
           $fee_tbl_id =trim($_POST["fee_tbl_id"]);
		   
           $fee_id = mysql_query("select id from tbl_class_feehead where fee_head='$fee_name' and branch_id='$branch_id'");
           $row1   = mysql_fetch_array($fee_id);
           $fee_head_id = $row1['id'];

           $cls_id = mysql_query("select id from std_class_config where id='$class_id' and branch_id='$branch_id'");
           $row2   = mysql_fetch_array($cls_id);
           $class_id = $row2['id'];
		
			$ress="UPDATE tbl_class_fee_info SET class_id='$class_id',fee_head_id='$fee_head_id',amount='$amount' where id='$fee_tbl_id' and branch_id='$branch_id'";		
			$sqll=mysql_query($ress);
		  
			if($sqll) {
				echo "Update Successfully";				   
			} else  {
				     echo "Error ";
			}  				 
		}		
	}
?>
</body>
</html>