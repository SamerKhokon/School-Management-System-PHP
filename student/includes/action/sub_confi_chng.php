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

/*slno=<?php echo $slno;?>&sub_action=delete&stu_id=<?php echo $stu_id;?>&name=<?php echo $name;?>
&father=<?php echo $father;?>&mother=<?php echo $mother;?>&branch_id=<?php echo $branch;?> */


     $slno = $_GET['slno'];
	 $sub_action=$_GET['sub_action'];
	 $stu_id = $_GET['stu_id'];
	 $name =$_GET['name'];
	 $father = $_GET['father'];
	 $mother = $_GET['mother'];
     $branch_id=$_GET['branch_id'];
	 

	 
	 if($slno!=="" && $sub_action=='delete')
	   {
	
	     delete_record($slno,$stu_id,$branch_id);
	     
	   }
	   
	   function delete_record($slno,$stu_id,$branch_id)
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
	    
	   $res="delete from std_profile where id=$slno and stu_id='$stu_id' and branch_id='$branch_id'";
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
	    if($slno!=="" && $sub_action=='detail')
	   {
	
	    detail_record($stu_id,$name,$father,$mother);
	     
	   }
	   
	   function detail_record($stu_id,$name,$father,$mother)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail </legend>
	   <table>
        
		  <tr>
					  <td> Student ID: </td><td><?Php echo $stu_id; ?> </td></tr><tr>
					  <td> Name: </td><td><?Php echo $name; ?> </td></tr><tr>
					  <td> Father:</td><td ><?Php echo $father; ?> </td></tr><tr>
					  <td> Mother:</td><td ><?Php echo $mother; ?> </td></tr>
      </table>
	  </fieldset>
	<?php
	     
	   }
	    if($slno!=="" && $sub_action=='edit')
	   {
	
	     edit_record($slno,$stu_id,$name,$father,$mother,$branch_id);
	     
	   }
	   
	   function edit_record($slno,$stu_id,$name,$father,$mother,$branch_id)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
		  <tr><td> Name        :</td><td><input type="text" name="name" value="<?php echo $name; ?>" /></td></tr>
		  <tr><td> Father:</td><td><input type="text" name="father" value="<?php echo $father; ?>" /></td></tr>
		  <tr><td> Mother:</td><td><input type="text" name="mother" value="<?php echo $mother;  ?>" /></td></tr>
		  <tr><td><input type="hidden" name="slno" value="<?php echo $slno; ?>" /></td></tr>
		   <tr><td><input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" /></td></tr>
		  <tr><td><input type="submit" name="edit_btn" value="submit" />			
		 
</table>
</fieldset>
	</form>
	
	<?php  
	
	if (isset($_POST['edit_btn']))
		{  
	 
	
	   $name=$_POST["name"];
   	   $father=$_POST["father"];
	   $ct_mark=$_POST["mother"];
   	   $branch_id=$_POST["branch_id"];
       $slno=$_POST["slno"];
		
		//echo $sub_name;
		
		$ress="UPDATE std_std_profile SET subject_name='$sub_name',sub_mark='$sub_mark',ct_mark='$ct_mark',st_mark='$st_mark',final_mark='$full_mark' WHERE id='$sub_id' and branch_id='$branch_id'";
		
		
		
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
