

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

  echo   $branch_id=$_GET['branch_id'];
     $sub_id=$_GET['sub_id'];
     $sub_name=$_GET['sub_name'];
	 $sub_action=$_GET['sub_action'];
	 $sub_mark=$_GET['sub_mark'];
	 $ct_mark=$_GET['ct_mark'];
	 $st_mark=$_GET['st_mark'];
			 				
	 $full_mark=$sub_mark+$ct_mark+$st_mark;
				   
						   


	 
	 if($sub_name!=="" && $sub_action=='delete')
	   {
	
	     delete_record($sub_id,$branch_id);
	     
	   }
	   
	   function delete_record($sub_id,$branch_id)
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
	    
	   $res="delete from std_subject_config where id='$sub_id' and branch_id='$branch_id'";
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
	    if($sub_name!=="" && $sub_action=='detail')
	   {
	
	     detail_record($sub_name,$sub_id,$sub_mark,$st_mark,$ct_mark,$full_mark);
	     
	   }
	   
	   function detail_record($sub_name,$sub_id,$sub_mark,$st_mark,$ct_mark,$full_mark)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail About Subject</legend>
	   <table>
        
		  <tr>
					  <td> Subject Name: </td><td><?Php echo $sub_name; ?> </td></tr><tr>
					  <td> Subject Id:</td><td> <?Php echo $sub_id; ?> </td></tr><tr>
					  <td> Subject Mark: </td><td><?Php echo $sub_mark; ?> </td></tr><tr>
					  <td> ST mark:</td><td ><?Php echo $st_mark; ?> </td></tr><tr>
					  <td> Class Test:</td><td ><?Php echo $ct_mark; ?> </td></tr><tr>
					  <td> Full Mark:</td><td ><?Php echo $full_mark; ?> </td></tr>
      </table>
	  </fieldset>
	<?php    
	    

	    
	     
	   }
	    if($sub_name!=="" && $sub_action=='edit')
	   {
	
	     edit_record($sub_name,$sub_id,$sub_mark,$st_mark,$ct_mark,$branch_id);
	     
	   }
	   
	   function edit_record($sub_name,$sub_id,$sub_mark,$st_mark,$ct_mark,$branch_id)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
		  <tr><td> Name        :</td><td><input type="text" name="sub_name" value="<?php echo $sub_name; ?>" /></td></tr>
		  <tr><td> Subject Mark:</td><td><input type="text" name="sub_mark" value="<?php echo $sub_mark; ?>" /></td></tr>
		  <tr><td> Ct Mark     :</td><td><input type="text" name="ct_mark" value="<?php echo $ct_mark;  ?>" /></td></tr>
		  <tr><td> St Mark     :</td><td><input type="text" name="st_mark" value="<?php echo $st_mark;  ?>" /></td></tr>
		   <tr><td><input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" /></td></tr>
		  <tr><td><input type="submit" name="edit_btn" value="submit" />			
		 
</table>
</fieldset>
	</form>
	
	<?php  
	
	if (isset($_POST['edit_btn']))
		{  
	 
	
	   $sub_name=$_POST["sub_name"];
   	   $sub_mark=$_POST["sub_mark"];
	   $ct_mark=$_POST["ct_mark"];
   	   $st_mark=$_POST["st_mark"];
       $full_mark=$sub_mark+$ct_mark+$st_mark;
	 echo  $branch_id=$_POST["branch_id"];
	   
		
		//echo $sub_name;
		
		$ress="UPDATE std_subject_config SET subject_name='$sub_name',sub_mark='$sub_mark',ct_mark='$ct_mark',st_mark='$st_mark',final_mark='$full_mark' WHERE id='$sub_id' and branch_id='$branch_id'";
		
		
		
	    $sqll=mysql_query($ress); 
		
		
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
