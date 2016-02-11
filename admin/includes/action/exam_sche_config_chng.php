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

    $sub_id=$_GET['sub_id'];
	$sub_action=$_GET['sub_action'];
	$class_id=$_GET['class_id'];
	
	$branch_id=$_GET['branch_id'];
	$exam_sche_id=$_GET['exam_sche_config_id'];
	$qry = mysql_query("SELECT  * from std_exam_schedule where id='$exam_sche_id' and branch_id='$branch_id'" ); 		
		
		while ($row=mysql_fetch_array($qry))
		{
					 $class_name=$row['class_name'];
					 $sub_name=$row['subject_name'];
			        	
		 			 $exam_name=$row['exam_name'];
		  		 	 $period=$row['period'];	
		  		     $exam_date=$row['exam_date'];	
		  		 	 $exam_start=$row['exam_start_time'];	
		  			 $exam_end=$row['exam_end_time'];	
					 $duration=$row['duration'];	
					 $mark=$row['mark'];	
					 $section_id=$row['section_id'];						
		}	   	 
		if( $sub_action=='delete')
	   {	
	     delete_record($exam_sche_id,$branch_id);	     
	   }	   
	   function delete_record($exam_sche_id,$branch_id)
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
	    
	   $res="delete from std_exam_schedule where id='$exam_sche_id' and branch_id='$branch_id'";
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
	    if( $sub_action=='detail')
	   {
	
	     detail_record($sub_name,$class_name,$period,$exam_name,$exam_date,$exam_start,$exam_end,$duration,$mark,$section_id);
	     
	   }
	   
	   function  detail_record($sub_name,$class_name,$period,$exam_name,$exam_date,$exam_start,$exam_end,$duration,$mark,$section_id)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail About EXAM</legend>
	   <table>
        
		  <tr>
					  <td> Class Name: </td><td><?Php echo $class_name; ?> </td></tr><tr>
					  <td> Subject Name:</td><td> <?Php echo $sub_name; ?> </td></tr><tr>
					  <td> Period: </td><td><?Php echo $period; ?> </td></tr><tr>
					  <td> Exam Name:</td><td ><?Php echo $exam_name; ?> </td></tr><tr>
					  <td> Exam Date:</td><td ><?Php echo $exam_date; ?> </td></tr><tr>
					
					  <td> Start Time:</td><td ><?Php echo $exam_start; ?> </td></tr><tr>
					  <td> End Time:</td><td ><?Php echo $exam_end; ?> </td></tr><tr>
					  <td> Duration: </td><td><?Php echo $duration; ?> </td></tr><tr>
					  <td> Mark:</td><td ><?Php echo $mark; ?> </td></tr><tr>
					  <td> Section ID:</td><td ><?Php echo $section_id; ?> </td></tr>
      </table>
	  </fieldset>
	<?php    
	    

	    
	     
	   }
	    if( $sub_action=='edit')
	   {
	
	     edit_record($sub_name,$class_name,$period,$exam_name,$exam_date,$exam_start,$exam_end,$duration,$mark,$section_id,$exam_sche_id,$branch_id);
	     
	   }
	   
	   function edit_record($sub_name,$class_name,$period,$exam_name,$exam_date,$exam_start,$exam_end,$duration,$mark,$section_id,$exam_sche_id,$branch_id)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
	<tr><td> Class Name:</td><td><input type="text" name="class_name" value="<?php echo $class_name; ?>" /></td></tr>
    <tr><td> Subject Name:</td><td><input type="text" name="sub_name" value="<?php echo $sub_name; ?>" /></td></tr>
	<tr><td> Period :</td><td><input type="text" name="period" value="<?php echo $period;  ?>" /></td></tr>
	<tr><td> Exam Name :</td><td><input type="text" name="exam_name" value="<?php echo $exam_name;  ?>" /></td></tr>
	<tr><td> Exam Date :</td><td><input type="text" name="exam_date" value="<?php echo $exam_date;  ?>" /></td></tr>
	<tr><td> Start Time:</td><td><input type="text" name="exam_start" value="<?php echo $exam_start;  ?>" /></td></tr>
    <tr><td> End Time :</td><td><input type="text" name="exam_end" value="<?php echo $exam_end;  ?>" /></td></tr>
    <tr><td> Duration :</td><td><input type="text" name="duration" value="<?php echo $duration;  ?>" /></td></tr>
    <tr><td> Mark  :</td><td><input type="text" name="mark" value="<?php echo $mark;  ?>" /></td></tr>
	<tr><td> Section ID:</td><td><input type="text" name="section_id" value="<?php echo $section_id;  ?>" /></td></tr>      <input type="hidden" name="exam_id" value="<?php echo $exam_sche_id; ?>" />
	<input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" />
	
	
		  <tr><td><input type="submit" name="edit_btn" value="submit" />			
</table>
</fieldset>
	</form>
	<?php  
	if (isset($_POST['edit_btn']))
		{  
	   $class_name=$_POST["class_name"];
   	   $sub_name=$_POST["sub_name"];
	   $period=$_POST["period"];
   	   $exam_name=$_POST["exam_name"];
       $exam_date=$_POST["exam_date"];
	    $exam_start=$_POST["exam_start"];
	   $exam_end=$_POST["exam_end"];
   	   $duration=$_POST["duration"];
	   	$mark=$_POST["mark"];
   	   $section_id=$_POST["section_id"];
	   $exam_sche_id=$_POST["exam_id"];
	   $branch_id=$_POST["branch_id"];
		
		//echo $sub_name;		
		$ress="UPDATE std_exam_schedule SET class_name='$class_name',subject_name='$sub_name',period='$period',exam_name='$exam_name',exam_date='$exam_date',exam_start_time='$exam_start',exam_end_time='$exam_end',duration='$duration',mark='$mark',section_id='$section_id' WHERE id='$exam_sche_id' and branch_id='$branch_id'";
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
</body>
</html>