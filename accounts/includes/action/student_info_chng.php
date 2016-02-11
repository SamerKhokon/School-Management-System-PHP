

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
      
   
include('db.php') ;
   echo  $id=$_GET['id'];
   echo $sub_action=$_GET['sub_action'];
   echo  $roll=$_GET['roll'];
	echo $class_name=$_GET['class_name'];
	echo $student_name=$_GET['student_name'];
	echo $class_sec=$_GET['class_sec'];
	echo $total_open_day=$_GET['total_open_day'];
	 
	echo  $total_atten=$_GET['total_atten'];
	echo $total_leave=$_GET['total_leave'];
	echo $total_abs=$_GET['total_abs'];
	 
	echo  $status=$_GET['status'];
	echo $result=$_GET['result'];
			 				
	 
	 if($id!=="" && $sub_action=='delete')
	   {
	
	     delete_record($id);
	     
	   }
	   
	   function delete_record($sub_id)
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
	    
	   $res="delete from std_class_info where id='$id'";
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
	
	     detail_record($student_name,$roll,$class_name,$class_sec,$total_open_day,$total_atten,$total_leave,$total_abs,$status,$result);
	     
	   }
	   
	   function detail_record($student_name,$roll,$class_name,$class_sec,$total_open_day,$total_atten,$total_leave,$total_abs,$status,$result)
	   {
	   ?>
	   	<fieldset>
		<legend>Detail About Subject</legend>
	   <table>
        
		  <tr>
					  <td> Student Name: </td><td><?Php echo $student_name; ?> </td></tr><tr>
					  <td> Roll:</td><td> <?Php echo $roll; ?> </td></tr><tr>
					  <td> Class Name: </td><td><?Php echo $class_name; ?> </td></tr><tr>
					  <td> Section:</td><td ><?Php echo $class_sec; ?> </td></tr><tr>
					  <td> Total Open Day:</td><td ><?Php echo $total_open_day; ?> </td></tr><tr>
					  <td> Total Attendence:</td><td ><?Php echo $total_atten; ?> </td></tr>
					  
					  <td> Total Leave: </td><td><?Php echo $total_leave; ?> </td></tr><tr>
					  <td> Total absent:</td><td ><?Php echo $total_abs; ?> </td></tr><tr>
					  <td> Status:</td><td ><?Php echo $status; ?> </td></tr><tr>
					  <td> Result:</td><td ><?Php echo $result; ?> </td></tr>
					  
      </table>
	  </fieldset>
	<?php    
	    

	    
	     
	   }
	    if($id!=="" && $sub_action=='edit')
	   {
	
	     edit_record($student_name,$roll,$class_name,$class_sec,$total_open_day,$total_atten,$total_leave,$total_abs,$status,$result,$id);
	     
	   }
	   
	   function edit_record($student_name,$roll,$class_name,$class_sec,$total_open_day,$total_atten,$total_leave,$total_abs,$status,$result,$id)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
         
<tr><td>Student Name   :</td><td><input type="text" name="stu_name" value="<?php echo $student_name; ?>" /></td></tr>
<tr><td>Roll:</td><td><input type="text" name="roll" value="<?php echo $roll; ?>" /></td></tr>
<tr><td>Class Name    :</td><td><input type="text" name="class_name" value="<?php echo $class_name;  ?>" /></td></tr>
<tr><td>Section    :</td><td><input type="text" name="sec" value="<?php echo $class_sec;  ?>" /></td></tr>
<tr><td>Total Open Day :</td><td><input type="text" name="total_open_day" value="<?php echo $total_open_day; ?>" /></td></tr><tr><td>Total Attendence:</td><td><input type="text" name="total_atten" value="<?php echo $total_atten; ?>" /></td></tr>
<tr><td>Total Leave :</td><td><input type="text" name="total_leave" value="<?php echo $total_leave;  ?>" /></td></tr>
<tr><td>Total Absence  :</td><td><input type="text" name="total_abs" value="<?php echo $total_abs;  ?>" /></td></tr>
<tr><td>Status :</td><td><input type="text" name="status" value="<?php echo $status;  ?>" /></td></tr>
<tr><td>Result  :</td><td><input type="text" name="result" value="<?php echo $result;  ?>" /></td></tr>
                           <input type="hidden" name="id" value="<?php echo $id; ?>"  />
		  <tr><td><input type="submit" name="edit_btn" value="submit" />			
		 </table>
</fieldset>
	</form>
	<?php  
	if (isset($_POST['edit_btn']))
		{  
	 echo	$student_name=$_POST["stu_name"];
   	  echo $roll=$_POST["roll"];
	  echo  $class_name=$_POST["class_name"];
   	  echo  $section=$_POST["sec"];
	   echo 	$total_open_day=$_POST["total_open_day"];
   	   echo $total_atten=$_POST["total_atten"];
	  echo  $total_leave=$_POST["total_leave"];
   	  echo  $total_abs=$_POST["total_abs"];
	   echo  $status=$_POST["status"];
   	 echo  $result=$_POST["result"];
	 echo $id=$_POST["id"];
		
		//echo $sub_name;
		
	$ress="UPDATE std_class_info SET stu_name='$student_name',class_roll='$roll',class_sec='$section',class_name='$class_name',total_open_day='$total_open_day',total_atten='$total_atten',total_leave='$total_leave',total_abs='$total_abs',stuts='$status',result='$result' WHERE id='$id'";
		
		
		
	    $sqll=mysql_query($ress); 
		
		
	//	echo $ress;
		  
		  if($sqll){
		           
				    echo "Update Successfully";
				   }
				   else
				   {
				    echo "Error";
				   
				   }
			
	 	}	   
	    
	     
	   }
	 
	

	 
	

?>
