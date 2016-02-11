

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

   // echo  $sub_name=$_GET['sub_name'];
	 $sub_action=$_GET['sub_action'];
	 $class_name=$_GET['class_name'];
	 echo $branch_id=$_GET['branch_id'];
	 echo $class_id=$_GET['class_id'];
	 
			    $qry = mysql_query("SELECT  * from std_class_config where id='$class_id' and branch_id='$branch_id'" ); 		
		
				while ($row=mysql_fetch_array($qry))
					{
		  
		 			 $class_name=$row['class_name'];
					
		  		      $no_of_student=$row['no_of_student'];	
		  			  $daily_class=$row['daily_class'];	
		  			  $class_start_time=$row['class_start_time'];	
				   
					}	   


	 
	 if($class_id!=="" && $sub_action=='delete')
	   {
	
	     delete_record($class_id,$branch_id);
	     
	   }
	   
	   function delete_record($class_id,$branch_id)
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
	    
	    $res="delete from std_class_config where id='$class_id' and branch_id='$branch_id'";
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
	
	     detail_record($class_name,$no_of_student,$daily_class,$class_start_time);
	     
	   }
	   
	   function  detail_record($class_name,$no_of_student,$daily_class,$class_start_time)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail About CLASS</legend>
	   <table>
        
		  <tr>
					  <td> Class Name:      </td><td> <?Php echo $class_name; ?> </td></tr><tr>
					  <td> NO of Students:  </td><td> <?Php echo $no_of_student; ?> </td></tr><tr>
					  <td> Daily Class:     </td><td> <?Php echo $daily_class; ?> </td></tr><tr>
					  <td> Class Start Time:</td><td> <?Php echo $class_start_time; ?> </td></tr>
					
      </table>
	  </fieldset>
	<?php    
	    

	    
	     
	   }
	    if($class_id!=="" && $sub_action=='edit')
	   {
	
	            edit_record($class_name,$no_of_student,$daily_class,$class_start_time,$class_id,$branch_id);
	     
	   }
	   
	   function edit_record($class_name,$no_of_student,$daily_class,$class_start_time,$class_id,$branch_id)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
<tr><td> Class Name:</td><td><input type="text" name="class_name" value="<?php echo $class_name; ?>" /></td></tr>
<tr><td> NO of Student :</td><td><input type="text" name="no_of_student" value="<?php echo $no_of_student; ?>" /></td></tr>
<tr><td> Daily Class :</td><td><input type="text" name="daily_class" value="<?php echo $daily_class;  ?>" /></td></tr>
<tr><td> Class Start Time :</td><td><input type="text" name="class_start_time" value="<?php echo $class_start_time; ?>" /></td></tr>
      <input type="hidden" name="branch_id" value="<?php  echo $branch_id; ?>" />
	   <input type="hidden" name="class_id" value="<?php  echo $class_id; ?>" />
	
		  <tr><td><input type="submit" name="edit_btn" value="submit" />			
</table>
</fieldset>
	</form>
	<?php  
	if (isset($_POST['edit_btn']))
		{  
	   $class_name=$_POST["class_name"];
   	   $no_of_student=$_POST["no_of_student"];
	   $daily_class=$_POST["daily_class"];
   	   $class_start_time=$_POST["class_start_time"];
	   $branch_id=$_POST["$branch_id"];
	   $class_id=$_POST["class_id"];
       $branch_id=$_POST["branch_id"];
		
		//echo $sub_name;
		
	echo $ress="UPDATE std_class_config SET class_name='$class_name',no_of_student='$no_of_student',daily_class='$daily_class',class_start_time='$class_start_time' where id='$class_id' and branch_id='$branch_id'";
		
		
		
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
