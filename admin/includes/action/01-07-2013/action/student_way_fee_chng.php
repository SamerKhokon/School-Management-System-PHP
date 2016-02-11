<html>
<head>
<style type="text/css">
.error { border: solid red 1px; color: red; }
.ok { border: solid green 1px; color: green; }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../../css/screen.css" /> 	
function redirect_to_parent()
{
    parent.parent.window.location= "";
    parent.parent.GB_hide();
}
</head>
<body onunload="redirect_to_parent();">
<?php
      
   
include('../db.php') ;

 
	 $sub_action=$_GET['sub_action'];
	 $class_name=$_GET['class_name'];
	 $sec_name=$_GET['sec_name'];
	 $branch_id=$_GET['branchid'];
	 $roll=$_GET['roll'];
	 $month=$_GET['month'];
	 $std_id=$_GET['std_id'];
	 $fee_head=$_GET['fee_head'];
	 
	 $fee_head_pre=$fee_head;
	
	 $amount=$_GET['amount'];
	
	
          $qry_sec="select id from std_class_section_config where section_name='$sec_name' and class_id='$class_name' and branch_id='$branch_id'";
		  $qry=mysql_query($qry_sec);
		  $row_sec=mysql_fetch_array($qry);
		  $sec_id=$row_sec[0];
		  
		        $qry_sec2="select class_name,std_name from std_fee_details where std_id='$std_id' and month='$month' and branch_id='$branch_id'";
		  $qry2=mysql_query($qry_sec2);
		  $row_sec2=mysql_fetch_array($qry2);
		   $class_nam=$row_sec2[0]; 
		  $std_name=$row_sec2[1];
		  
		  
		  


	 
	 if( $sub_action=='delete')
	   {
	
	     delete_record($class_name,$sec_id,$roll,$month,$branch_id,$std_id);
	     
	   }
	   
	   function delete_record($class_name,$sec_id,$roll,$month,$branch_id,$std_id)
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
	    
	   $res="delete from std_fee_details  where std_id='$std_id' and branch_id='$branch_id'";
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
	
	     detail_record();
	     
	   }
	   
	   function  detail_record()
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
	
	     edit_record($std_name,$class_nam,$sec_name,$branch_id,$month,$roll,$std_id,$fee_head,$amount,$fee_head_pre);
	     
	   }
	   
	   function edit_record($std_name,$class_nam,$sec_name,$branch_id,$month,$roll,$std_id,$fee_head,$amount,$fee_head_pre)
	   {
	   ?>
	   
	  <form name="frm_e" id="frm_e" action="" method="post">	  
	  <fieldset> 
	  <legend>Edit Records</legend>	
	   <table>
    <tr><td> Name:</td><td><input type="text" name="std_name" value="<?php echo $std_name; ?>" /></td></tr>    
	<tr><td> Class :</td><td><input type="text" name="class_name" value="<?php echo $class_nam; ?>" /></td></tr>
    <tr><td> Section Name:</td><td><input type="text" name="sec_name" value="<?php echo $sec_name; ?>" /></td></tr>
	<tr><td> Month :</td><td><input type="text" name="month" value="<?php echo $month;  ?>" /></td></tr>
	<tr><td> Roll :</td><td><input type="text" name="roll" value="<?php echo $roll;  ?>" /></td></tr>
	<tr><td> Fee head :</td><td><input type="text" name="fee_head" value="<?php echo $fee_head;  ?>" /></td></tr>
	<tr><td> Amount:</td><td><input type="text" name="amount" value="<?php echo $amount;  ?>" /></td></tr>

	<input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" />
	<input type="hidden" name="std_id" value="<?php echo $std_id; ?>" />
    <input type="hidden" name="fee_head_pre" value="<?php echo $fee_head_pre; ?>" />
	
		  <tr><td><input type="submit" name="edit_btn" value="submit" />			
</table>
</fieldset>
	</form>
	<?php  
	if (isset($_POST['edit_btn']))
		{  
	echo	$std_name=$_POST["std_name"];
	echo   $class_name=$_POST["class_name"];
   	echo   $sec_name=$_POST["sec_name"];
	echo   $month=$_POST["month"];
   echo	   $roll=$_POST["roll"];
   echo    $fee_head=$_POST["fee_head"];
	echo    $amount=$_POST["amount"];
	echo   $branch_id=$_POST["branch_id"];
	echo   $std_id=$_POST["std_id"];
	echo $fee_head_pre=$_POST["fee_head_pre"];
   	
		
		//echo $sub_name;
		
echo $ress="UPDATE std_fee_details SET fee_head_name='$fee_head',amount='$amount',month='$month'  WHERE std_id='$std_id' and branch_id='$branch_id' and month='$month' and fee_head_name='$fee_head_pre'";
		
		
		
	    $sqll=mysql_query($ress); 
		
		
		//echo $ress;
		  
		if($sqll)
		           {
				    echo "Update Successfully";				   
				   }    else   {
				     echo "Error ";
				   }  
				 
		}		
	}
?>
</body>
</html>
