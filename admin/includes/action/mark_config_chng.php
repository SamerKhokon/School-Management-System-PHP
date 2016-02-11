<html><head>
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
<!--<body onUnload="redirect_to_parent();"> -->
<body>
<?php
include('../db.php') ;


     $id=$_GET['id'];
     $class_id=$_GET['class_id'];
	 $sb=$_GET['sb'];
	 $ob=$_GET['ob'];
	 $ct=$_GET['ct'];
	 $tot=$_GET['tot'];
	 $sub_action= $_GET['sub_action'];
	
		if($class_id!=="" && $sub_action=='delete')
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
				<input type="button" value="Cancel" name="can_btn" id="can_btn" onClick="get_clos();"/></td>
		  </tr>
		</table>
		</fieldset>
		</form>
	<?php  	
		if (isset($_POST['ok_btn']))
		{	    
	        $res="delete from tbl_class_exam_mark_distribution where id='$id'";
            mysql_query($res);	   
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
	 
	   if($class_id!=="" && $sub_action=='detail')
	   {	
	     detail_record($id,$class_id,$sb,$ob,$ct,$tot);	     
	   }
	   
	   function detail_record($id,$class_id,$sb,$ob,$ct,$tot)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail About Marks</legend>
	   <table>
        
		  <tr>
					  <td> Class: </td><td>Class-<?php echo $class_id; ?> </td></tr><tr>
					  <td> SB:</td><td> <?Php echo $sb; ?> </td></tr><tr>
					  <td> OB: </td><td><?Php echo $ob; ?> </td></tr><tr>
					  <td> CT:</td><td ><?Php echo $ct; ?> </td></tr><tr>
					  <td> Total:</td><td ><?Php echo $tot; ?> </td></tr><tr>					  
      </table>
	  </fieldset>
	<?php    
	   }
	   
	   if($class_id!=="" && $sub_action=='edit')
	   {	
	     edit_record($id,$class_id,$sb,$ob,$ct,$tot);	     
	   }
	   
	   function edit_record($id,$class_id,$sb,$ob,$ct,$tot)
	   {
?>	   
			<form name="frm_e" id="frm_e" action="" method="post">	  
			  <fieldset> 
			  <legend>Edit Records</legend>	
				<table>
				    <input type="hidden" name="id" value="<?php echo $id;?>"/>
					<input type="hidden" name="class_id" value="<?php echo $id;?>"/>
					<tr><td> Class        :</td><td><input type="text" name="class" value="<?php echo 'Class-'.$id; ?>" readonly="readonly" /></td></tr>
					<tr><td>SB:</td><td><input type="text" name="sb" value="<?php echo $sb; ?>" /></td></tr>
					<tr><td> OB     :</td><td><input type="text" name="ob" value="<?php echo $ob;  ?>" /></td></tr>
					<tr><td> CT     :</td><td><input type="text" name="ct" value="<?php echo $ct;  ?>" /></td></tr>
					<tr><td> CT     :</td><td><input type="text" name="tot" value="<?php echo $tot;  ?>" /></td></tr>					
					<tr><td><input type="submit" name="edit_btn" value="submit" />					 
				</table>
			   </fieldset>
			</form>	
<?php  	
		if (isset($_POST['edit_btn']))
		{  
		   $id=$_POST["id"];		   
		   $class_name=$_POST["class"];
		   $class_id=$_POST["class_id"];
		   $sb=$_POST["sb"];
		   $ob=$_POST["ob"];
		   $ct=$_POST["ct"];
		   $tot=$_POST["tot"];
			
			$ress="UPDATE `school`.`tbl_class_exam_mark_distribution` 
				SET	`class_id` = $class_id , 
				`OB_total` = $ob , 
				`SB_total` = $sb, 
				`CT_total` = $ct 
				WHERE	`id` = $id";
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