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
<!--<body onUnload="redirect_to_parent();"> -->
<body>
<?php
	include('../db.php') ;
   $group_id=$_GET['id'];
   $group_name=$_GET['group_name'];
   $sub_action=$_GET['sub_action'];
   $class_id=$_GET['class_id'];
   $section_id=$_GET['section_id'];
   $branch_id=$_GET['branch_id'];
	 
			$qry=mysql_query("select class_name from std_class_config where id='$class_id' and branch_id='$branch_id'");
			$row=mysql_fetch_array($qry);
			$class_name=$row['class_name'];
			
			$qry2=mysql_query("select section_name from std_class_section_config where id='$section_id' and branch_id='$branch_id' ");
			$row2=mysql_fetch_array($qry2);
		echo	$section_name=$row2['section_name']; 
			 			  
	 if($group_id!=="" && $sub_action=='delete')
	   {
	
	     delete_record($group_id,$branch_id);
	     
	   }
	   
	   function delete_record($group_id,$branch_id)
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
	    
	   $res="delete from std_group_info where id='$group_id' and branch_id='$branch_id'";
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
	    if($group_id!=="" && $sub_action=='detail')
	   {
	
	     detail_record($group_name,$class_name,$section_name,$branch_id);
	     
	   }
	   
	   function detail_record($group_name,$class_name,$section_name,$branch_id)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail About Group</legend>
	    <table>
		<tr>
					  <td> Group Name:   </td><td><?Php echo $group_name;  ?> </td></tr><tr>
					  <td> Class Name:   </td><td><?Php echo $class_name;  ?> </td></tr><tr>
					  <td> Section Name: </td><td><?Php echo $section_name;?> </td></tr><tr>
					  <td> Branch ID:    </td><td><?Php echo $branch_id;   ?> </td></tr><tr>
				
        </table>
	    </fieldset>
	    <?php    
	   }
	    if($group_id!=="" && $sub_action=='edit')
	   {
	
	     edit_record($group_name,$class_name,$section_name,$branch_id,$group_id,$class_id,$section_id);
	     
	   }
	   
	   function edit_record($group_name,$class_name,$section_name,$branch_id,$group_id,$class_id,$section_id)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
<tr><td>Group Name:</td><td><input type="text" name="group_name" value="<?php echo $group_name; ?>" /></td></tr>
<tr><td>Class Name:</td><td><input type="text" name="class_name" value="<?php echo $class_name; ?>" /></td></tr>
<tr><td>Section Name:</td><td><input type="text" name="section_name" value="<?php echo $section_name;  ?>" /></td></tr>
<tr><td><input type="hidden" name="id" value="<?php echo $group_id; ?>" />	
        <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" />	
		<input type="hidden" name="class_id" value="<?php echo $class_id; ?>" />
		<input type="hidden" name="section_id" value="<?php echo $section_id;?>" />
		
<tr><td><input type="submit" name="edit_btn" value="submit" />			
		 
     	</table>
</fieldset>
	</form>
	
	<?php  
	
	if (isset($_POST['edit_btn']))
		{  
	 
	
	   $group_name=$_POST["group_name"];
   	   $class_name=$_POST["class_name"];
	   $section_name=$_POST["section_name"];
	   $branch_id=$_POST["branch_id"];	 
	   $group_id=$_POST['id'];  	 
		
		//echo $sub_name;		
		//$ress="UPDATE std_group_info SET group_name='$group_name',class_id='(select id from std_class_config where class_name='$class_name')',section_id='(select id from std_class_section_config where section_name='$section_name')' WHERE id='$id'";
		
		
		$ress=mysql_query("select id from std_class_config where class_name='$class_name' and branch_id='$branch_id'");
		$row=mysql_fetch_array($ress);
		$cls_id=$row['id'];
		
		$res=mysql_query("select id from std_class_section_config where section_name='$section_name' and class_name='$class_name' and branch_id='$branch_id'");
		$row2=mysql_fetch_array($res);
		
		$sec_id=$row2['id'];		
		$result="UPDATE std_group_info SET group_name='$group_name',class_id='$cls_id',section_id='$sec_id' WHERE id='$group_id' and branch_id='$branch_id'";		
		$sqll=mysql_query($result);
		//echo $ress;
		  
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