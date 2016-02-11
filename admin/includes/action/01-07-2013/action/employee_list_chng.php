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
	 $sub_action= $_GET['sub_action'];	 
     $name=$_GET['name'];
	 $mobile=$_GET['mobile'];
	 $address=$_GET['address'];
	 $join_date=$_GET['join_date'];
	 
	
		if($id!=="" && $sub_action=='delete')
	   {	
	     delete_record($id);	     
	   }
	   
	   function delete_record($id)
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
	        $res="delete from tbl_emp_salary_sturcture where empid=$id";
            mysql_query($res);	   
	        if($res)
	        {
			  echo "Deleted successfully";
			}
			else
			{
			  echo "error";			   
			}
	    }
	 }
	 
	   if($id!=="" && $sub_action=='detail')
	   {	
	     detail_record($id,$name,$mobile,$address,$join_date);	     
	   }
	   
	   function detail_record($id,$name,$mobile,$address,$join_date)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail Information</legend>
	   <table>
        
		  <tr>
					  <td> Name: </td><td><?php echo $name; ?> </td></tr><tr>
					  <td> Mobile:</td><td> <?Php echo $mobile; ?> </td></tr><tr>
					  <td> Address: </td><td><?Php echo $address; ?> </td></tr><tr>
					  <td> Joining Date:</td><td ><?Php echo $join_date; ?> </td></tr><tr>
      </table>
	  </fieldset>
	<?php    
	   }
	   
	   if($id!=="" && $sub_action=='edit')
	   {	
	     edit_record($id,$name,$mobile,$address,$join_date);	     
	   }
	   
	   function edit_record($id,$name,$mobile,$address,$join_date)
	   {
?>	   
			<form name="frm_e" id="frm_e" action="" method="post">	  
			  <fieldset> 
			  <legend>Edit Records</legend>	
				<table>
				    <input type="hidden" name="id" value="<?php echo $id;?>"/>
					<tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $name; ?>" /></td></tr>
					<tr><td> Mobile     :</td><td><input type="text" name="mobile" value="<?php echo $mobile;  ?>" /></td></tr>
					<tr><td> Address     :</td><td><input type="text" name="address" value="<?php echo $address;  ?>" /></td></tr>
					<tr><td> Joining Date    :</td><td><input type="text" name="join_date" value="<?php echo $join_date;  ?>" /></td></tr>					
					<tr><td><input type="submit" name="edit_btn" value="submit" />					 
				</table>
			   </fieldset>
			</form>	
<?php  	
		if (isset($_POST['edit_btn']))
		{  
		   $id=$_POST["id"];	
		   $name=$_POST["name"];
		   $mobile=$_POST["mobile"];
		   $address=$_POST["address"];
		   $join_date=$_POST["join_date"];
			
			$ress="UPDATE tbl_emp_salary_sturcture SET	`name` = '$name' , 
				`address` = '$address', 
				`mobileno` = '$mobile',
				`join_date`='$join_date'
				WHERE	`empid` = $id";
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