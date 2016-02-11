<html><head>
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
<!--<body onUnload="redirect_to_parent()"> -->
<body>	
<?php
include('../db.php') ;
     $new_sec_id   =trim($_GET['id']);	
     $class_name   =trim($_GET['class_name']);
   	 $sub_action   =trim($_GET['sub_action']);
   	 $section_name =trim($_GET['section_name']);
   	 $teacher_name =trim($_GET['teacher_name']);
   	 $total_student=trim($_GET['total_student']);
   	 $teacher_id   =trim($_GET['teacher_id']);
	 $subject_id   =trim($_GET['subject_id']);
  	 $subject_name =trim($_GET['subject_name']);
  	 $branch_id    =trim($_GET['branch_id']);
	
	if($new_sec_id!=="" && $sub_action=='delete')
	{
	    delete_record($new_sec_id,$branch_id);	    
	}	   
	function delete_record($new_sec_id,$branch_id)
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
	    $res="delete from std_class_section_config where id='$new_sec_id' and branch_id='$branch_id'";
        $ress = mysql_query($res);	   
	    if($ress){
			echo "delete successfully";
		}else{
			echo "error";		   
	    }
	}    
}
	if($class_name!=="" && $sub_action=='detail')
	{	
	     detail_record($class_name,$section_name,$teacher_name,$subject_name,$branch_id,$total_student,$new_sec_id);	     
	}	   
    function detail_record($class_name,$section_name,$teacher_name,$subject_name,$branch_id,$total_student,$new_sec_id)
	{
?>
	   	<fieldset>
		<legend>Detail About Section</legend>
	   <table>        
		  <tr>
			  <td>Class Name: </td><td>  <?Php echo $class_name;    ?> </td></tr><tr>
			  <td>Section Name:</td><td> <?Php echo $section_name;  ?> </td></tr><tr>
			  <td>Teacher Name: </td><td><?Php echo $teacher_name;  ?> </td></tr><tr>
			  <td>Subject Name:</td><td> <?Php echo $subject_name;  ?> </td></tr><tr>
			  <td>Total Student:</td><td><?Php echo $total_student; ?> </td></tr><tr>
			  <td>Branch Id:</td><td>    <?Php echo $branch_id;     ?> </td></tr>
		  <tr>
      </table>
	  </fieldset>
	<?php  
	}
	if($class_name!=="" && $sub_action=='edit')
	{	
	    edit_record($class_name,$section_name,$teacher_name,$subject_name,$branch_id,$total_student,$teacher_id,$subject_id,$new_sec_id);	     
	}
    function edit_record($class_name,$section_name,$teacher_name,$subject_name,$branch_id,$total_student,$teacher_id,$subject_id,$new_sec_id)
	{
?>
			<form name="frm_e" id="frm_e" action="" method="post">	  
			<fieldset> 
			  <legend>Edit Records</legend>	
			   <table>
				 
					<tr><td>Class Name :</td><td><input type="text" name="class_name" value="<?php echo $class_name; ?>" /></td></tr><tr><td>Section Name:</td><td><input type="text" name="section_name" value="<?php echo $section_name; ?>" /></td></tr>
					<tr><td>Teacher name:</td><td><input type="text" name="teacher_name" value="<?php echo $teacher_name;  ?>" /></td></tr>
					<tr><td>Subject Name:</td><td><input type="text" name="subject_name" value="<?php echo $subject_name;  ?>" /></td></tr>
					<tr><td>Total Student:</td><td><input type="text" name="total_student" value="<?php echo $total_student;  ?>" /></td></tr>
					<tr><td>Branch Name:</td><td><input type="text" name="branch_id" value="<?php echo $branch_id;  ?>" /></td></tr>
					<tr><td><input type="hidden" name="id" value="<?php echo $id ;?>" />  </td></tr>
					<tr><td><input type="submit" name="edit_btn" value="submit" />					 
				</table>
			</fieldset>
			</form>	
<?php  	
		if (isset($_POST['edit_btn']))
		{  	 
		   $id=$_POST["id"];
		   $class_name   =$_POST["class_name"];
		   $section_name =$_POST["section_name"];
		   $teacher_name =$_POST["teacher_name"];
		   $subject_name =$_POST["subject_name"];
		   $total_student=$_POST["total_student"];
		   $branch_id    =$_POST["branch_id"];
	  
			$qry1=mysql_query("select id from std_class_config where class_name='$class_name'");
			$row1=mysql_fetch_array($qry1);
			$class_id=$row1['id'];
			
			$qry2=mysql_query("select id from std_teacher where teacher_name='$teacher_name'");
			$row2=mysql_fetch_array($qry2);
			$teacher_id=$row2['id'];
			
			$qry3=mysql_query("select id from std_subject_config where subject_name='$subject_name'");
			$row3=mysql_fetch_array($qry3);
			$subject_id=$row3['id'];
			
			$ress="UPDATE std_class_section_config SET class_id='$class_id',class_name='$class_name',section_name='$section_name',class_teacher_id='$teacher_id',class_teacher_name='$teacher_name',subject_id='$subject_id',subject_name='$subject_name',no_of_student='$total_student' where id='$new_sec_id' and branch_id='$branch_id' ";
			$sqll=mysql_query($ress); 
			  
			if($sqll)
			{
			   echo "Update Successfully";
			}else {
				echo "Error ";
			}  					 
		}		   
	}
?>
</body>
</html>