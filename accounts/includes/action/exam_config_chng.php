

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
     $exam_name=$_GET['exam_name'];
	 $sub_action=$_GET['sub_action'];
	 $period=$_GET['period'];
	 $prefix=$_GET['prefix'];
	
	 if($exam_name!=="" && $sub_action=='delete')
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
	    
	   $res="delete from std_exam_config where id='$id'";
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
	    if($exam_name!=="" && $sub_action=='detail')
	   {
	
	     detail_record($id,$exam_name,$period,$prefix);
	     
	   }
	   
	   function detail_record($id,$exam_name,$period,$prefix)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail About Subject</legend>
	   <table>
        
		  <tr>
					  <td> id: </td><td><?Php echo $id; ?> </td></tr><tr>
					  <td> Exam Name:</td><td> <?Php echo $exam_name; ?> </td></tr><tr>
					  <td> Period: </td><td><?Php echo $period; ?> </td></tr><tr>
					  <td> Prefix:</td><td ><?Php echo $prefix; ?> </td></tr><tr>
      </table>
	  </fieldset>
	<?php    
	    

	    
	     
	   }
	    if($exam_name!=="" && $sub_action=='edit')
	   {
	
	     edit_record($id,$exam_name,$period,$prefix);
	     
	   }
	   
	   function edit_record($id,$exam_name,$period,$prefix)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
<tr><td> Id        :</td><td><input type="text" name="id" value="<?php echo $id; ?>" readonly="readonly" /></td></tr>
<tr><td>Exam Name:</td><td><input type="text" name="exam_name" value="<?php echo $exam_name; ?>" /></td></tr>
<tr><td> Period     :</td><td><input type="text" name="period" value="<?php echo $period;  ?>" /></td></tr>
<tr><td> Prefix     :</td><td><input type="text" name="prefix" value="<?php echo $prefix;  ?>" /></td></tr>
		  <tr><td><input type="submit" name="edit_btn" value="submit" />			
		 
</table>
</fieldset>
	</form>
	
	<?php  
	
	if (isset($_POST['edit_btn']))
		{  
	 
	
	   $id=$_POST["id"];
   	   $exam_name=$_POST["exam_name"];
	   $period=$_POST["period"];
   	   $prefix=$_POST["prefix"];
		
		//echo $sub_name;
		
		$ress="UPDATE std_exam_config SET exam_name='$exam_name',period='$period',prefix='$prefix' WHERE id='$id'";
		
		
		
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
