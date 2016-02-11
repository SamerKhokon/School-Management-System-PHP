

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

      $id=$_GET['id'];
	  $sub_action=$_GET['sub_action'];
	  $class_name=$_GET['class_name'];
	  $exam_fee=$_GET['exam_fee'];
	  $development_fee=$_GET['development_fee'];
	  $monthly_fee=$_GET['monthly_fee'];
	  $hostel_fee=$_GET['hostel_fee'];
	  $tution_fee=$_GET['tution_fee'];
	  $lab_fee=$_GET['lab_fee'];
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
	    
	    $res="delete from std_class_config where id='$id' and branch_id='$branch_id'";
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
	    if($id!=="" && $sub_action=='detail')
	   {
	
	     detail_record($class_name,$exam_fee,$development_fee,$monthly_fee,$hostel_fee,$tution_fee,$lab_fee);
	     
	   }
	   
	   function  detail_record($class_name,$exam_fee,$development_fee,$monthly_fee,$hostel_fee,$tution_fee,$lab_fee)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail About CLASS</legend>
	   <table>
        
		  <tr>
					  <td> Class Name:      </td><td> <?Php echo $class_name; ?> </td></tr><tr>
					  <td> Exam Fee:        </td><td> <?Php echo $exam_fee; ?> </td></tr><tr>
					  <td> development Fee:     </td><td> <?Php echo $development_fee; ?> </td></tr><tr>
					  <td> Monthly Fee:      </td><td> <?Php echo $monthly_fee; ?> </td></tr><tr>
					  <td> HOstel Fee:  </td><td> <?Php echo $hostel_fee; ?> </td></tr><tr>
					  <td> Tution Fee:     </td><td> <?Php echo $tution_fee; ?> </td></tr><tr>
					  <td> Lab Fee:</td><td> <?Php echo $lab_fee; ?> </td></tr>
					
      </table>
	  </fieldset>
	<?php    
	    

	    
	     
	   }
	    if($class_name!=="" && $sub_action=='edit')
	   {
	
	            edit_record($class_name,$exam_fee,$development_fee,$monthly_fee,$hostel_fee,$tution_fee,$lab_fee,$id,$branch_id);
	     
	   }
	   
	   function edit_record($class_name,$exam_fee,$development_fee,$monthly_fee,$hostel_fee,$tution_fee,$lab_fee,$id,$branch_id)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
<tr><td> Class Name:</td><td><input type="text" name="class_name" value="<?php echo $class_name; ?>" /></td></tr>
<tr><td> Exam Fee :</td><td><input type="text" name="exam_fee" value="<?php echo $exam_fee; ?>" /></td></tr>
<tr><td> Development Fee :</td><td><input type="text" name="development_fee" value="<?php echo $development_fee;  ?>" /></td></tr>
<tr><td> Monthly Fee :</td><td><input type="text" name="monthly_fee" value="<?php echo $monthly_fee; ?>" /></td></tr>
<tr><td> Hostel Fee :</td><td><input type="text" name="hostel_fee" value="<?php echo $hostel_fee; ?>" /></td></tr>
<tr><td>Tution Fee :</td><td><input type="text" name="tution_fee" value="<?php echo $tution_fee;  ?>" /></td></tr>
<tr><td>Lab Fee :</td><td><input type="text" name="lab_fee" value="<?php echo $lab_fee; ?>" /></td></tr>
<tr><td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td></tr>
<input type="hidden" name="branch_id" value="<?php echo $branch_id;?>" />
	
		  <tr><td><input type="submit" name="edit_btn" value="submit" />			
</table>
</fieldset>
	</form>
	<?php  
	if (isset($_POST['edit_btn']))
		{  
	echo	$id=$_POST["id"];
	echo   $class_name=$_POST["class_name"];
   	echo   $exam_fee=$_POST["exam_fee"];
	echo   $development_fee=$_POST["development_fee"];
   	echo   $monthly_fee=$_POST["monthly_fee"];
	   
	echo   $hostel_fee=$_POST["hostel_fee"];
	echo   $tution_fee=$_POST["tution_fee"];
   	echo   $lab_fee=$_POST["lab_fee"];
	echo "hell";
	echo   $branch_id=$_POST["branch_id"];      
	echo "hello";	
		//echo $sub_name;
		
	echo $ress="UPDATE std_class_config SET class_name='$class_name',exam_fee='$exam_fee',developement_fee='$development_fee',monthly_fee='$monthly_fee',hostel_fee='$hostel_fee',tution_fee='$tution_fee',leb_fee='$lab_fee' where id='$id' and branch_id='$branch_id'";
		
		
		
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
