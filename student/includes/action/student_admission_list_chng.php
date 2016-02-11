<script>
        function get_clos()	{		
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
    
	 $slno = $_GET['id'];
	 $stu_id = $_GET['stu_id'];
	 $name = $_GET['name'];
	 $adm_class = $_GET['adm_class'];
	 $section = $_GET['section'];
	 $ovr_roll = $_GET['ovr_roll'];
	$father_name = $_GET['father_name'];
	 $mother_name = $_GET['mother_name'];
	 $adm_date = $_GET['adm_date'];
	 $status = $_GET['status'];
	 $sub_action=$_GET['sub_action'];
	 $branch = $_GET['branch'];
	 
//	 $stu_id, $adm_class, $section , $ovr_roll ,$father_name ,	 $mother_name , $adm_date ,	 $status 
	 
	 if($sub_name!=="" && $sub_action=='delete')
	   {
	
	     delete_record($slno,$branch);
	     
	   }
	   
	   function delete_record($slno,$branch)
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
	    
	 
	     
	 }
	    if($slno!=="" && $sub_action=='detail')
	   {
	
	     detail_record($stu_id,$name, $adm_class, $section , $ovr_roll ,$father_name ,	 $mother_name , $adm_date ,	 $status );
	     
	   }
	   
	   function detail_record($stu_id,$name, $adm_class, $section , $ovr_roll ,$father_name ,	 $mother_name , $adm_date ,	 $status )
	   {
	   ?>
	   	<fieldset>
		<legend>Detail Information</legend>
	   <table>
					<tr><td> Student Id:</td><td> <?Php echo $stu_id; ?> </td></tr><tr>        
					<tr><td> Student Name: </td><td><?Php echo $name; ?> </td></tr><tr>
					  <tr><td> Class: </td><td>Class-<?Php echo $adm_class; ?> </td></tr><tr>
					  <tr><td> Section:</td><td ><?Php echo $section; ?> </td></tr><tr>
					  <tr><td> Class Roll:</td><td ><?Php echo $ovr_roll; ?> </td></tr><tr>
					  <tr><td> Father Name:</td><td ><?Php echo $father_name; ?> </td></tr>
					  <tr><td>Mother Name:</td><td ><?Php echo $mother_name; ?> </td></tr>					  
					  <tr><td> Admission Date:</td><td ><?Php echo $adm_date; ?> </td></tr>					  
					  <tr><td> Status:</td><td ><?Php echo $status; ?> </td></tr>					  
      </table>
	  </fieldset>
	<?php    
	    

	    
	     
	   }
	    if($slno!=="" && $sub_action=='edit')
	   {	
	     edit_record($slno,$stu_id,$name, $adm_class, $section , $ovr_roll ,$father_name ,	 $mother_name , $adm_date ,	 $status ,$branch);	     
	   }
	   
	   function edit_record($slno,$stu_id,$name, $adm_class, $section , $ovr_roll ,$father_name ,	 $mother_name , $adm_date ,	 $status ,$branch)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
		  <tr><td> Student ID        :</td><td><input type="text" name="stu_id" value="<?php echo $stu_id; ?>" /></td></tr>
		  <tr><td> Name:</td><td><input type="text" name="stu_name" value="<?php echo $name; ?>" /></td></tr>
		  <tr><td> Class     :</td><td><input type="text" name="adm_class" value="Class-<?php echo $adm_class;  ?>" /></td></tr>
		  <tr><td>Section    :</td><td><input type="text" name="section" value="<?php echo $section;  ?>" /></td></tr>
		  <tr><td> Class Roll    :</td><td><input type="text" name="class_roll" value="<?php echo $ovr_roll;  ?>" /></td></tr>
		  <tr><td> Father Name    :</td><td><input type="text" name="father_name" value="<?php echo $father_name;  ?>" /></td></tr>		  
		  <tr><td> Mother Name    :</td><td><input type="text" name="mother_name" value="<?php echo $mother_name;  ?>" /></td></tr>		  		  
		  <tr><td> Admission Date     :</td><td><input type="text" name="adm_date" value="<?php echo $adm_date;  ?>" /></td></tr>		  		  
		  <tr><td> Status     :</td><td><input type="text" name="status" value="<?php echo $status;  ?>" /></td></tr>		  		  
		   <tr><td><input type="hidden" name="slno" value="<?php echo $slno; ?>" /></td></tr>
		   <tr><td><input type="hidden" name="branch" value="<?php echo $branch; ?>" /></td></tr>
		  <tr><td><input type="submit" name="edit_btn" value="submit" />			
		 
</table>
</fieldset>
	</form>
	
	<?php  	
		if (isset($_POST['edit_btn']))
		{  	 
				$slno 				= $_POST["slno"];
			    $stu_id				=$_POST["stu_id"];
			    $stu_name        =$_POST["stu_name"];
			    $adm_class      =$_POST["adm_class"];
			    $section           =$_POST["section"];
			    $class_roll        =$_POST["class_roll"];
			    $father_name  =$_POST["father_name"];
			    $mother_name=$_POST["mother_name"];
			    $adm_date        =$_POST["adm_date"];
			    $status              =$_POST["status"];
			    $branch_id        =$_POST["branch"];
				$ress="UPDATE std_profile SET name='$stu_name',father_name='$father_name',mother_name='$mother_name'
				WHERE id=$slno and branch_id=$branch";
				
				$sqll = mysql_query($ress); 		  
				if($sqll)
				{
				   echo "Update Successfully";				   
				} else{
					echo "Error ";
				}  				 
	 }		   
	}
?>
