<?php      
		require'../db.php'; 
   //   echo "hello";
		$stu_id = trim($_GET['stid']);
		$sql=mysql_query("select * from std_profile where stu_id='$stu_id'");	 
		$row=mysql_fetch_array($sql);	  
		$name        =$row['name'];
		$father_name =$row['father_name']; 
		$mother_name =$row['mother_name']; 
		$pre_address =$row['pre_address']; 
		$par_address =$row['par_address']; 
		$home_phone  =$row['home_phone']; 
		$mail_add    =$row['mail_add']; 
		$age		 =$row['age']; 
		$sex		 =$row['sex']; 
		$adm_date	 =$row['adm_date']; 
		$adm_class	 =$row['adm_class']; 
		$adm_class_roll=$row['adm_class_roll']; 
		$adm_sec = $row['section'];
		$dob = $row['dob'];
		
		$father_qualification  =$row['father_qualification']; 
		$mother_qualification  =$row['mother_qualification']; 
		$father_work_phone     =$row['father_work_phone']; 
		$mother_work_phone     =$row['mother_work_phone']; 
		$admission_fee         =$row['admission_fee']; 
		$priv_school_name      =$row['priv_schoole_name']; 
		$priv_school_add       =$row['priv_school_add']; 
		$priv_school_class     =$row['priv_school_class']; 
		$priv_school_class_roll=$row['priv_school_class_roll']; 
		$priv_school_remarks   =$row['priv_school_remarks']; 
		$priv_school_result    =$row['priv_school_result']; 
		$present_class	       =$row['present_class']; 
		$present_class_roll    =$row['present_class_roll']; 
		$st_status             =$row['st_status']; 
		$branch_id		       =$row['branch_id'];	
  ?>


<div id="content" class="box">
<fieldset>
<legend>Student Details</legend>
<table width="100%">
<td width="30%">
<table >
<tr><td> <?php if(!isset($pic)) {  $pic = "./../../student_profile_picture/profile_image.jpg"; 
}else{ $pic = "./../student_profile_picture/profile_image.jpg";  }?>
		<img src="./../student_profile_picture/<?php echo $pic;?>" width="100px" height="100px" />
		</td></tr>
		<tr><td>
		<a href="javascript:void(0);">Upload photo</a>
		</td></tr>
</table>
</td>
<td width="65%">
<table cellpadding="0" border="0" cellspacing="0">
<tr><th>Name:</th><td ><?php echo $name; ?></td><td width="22%"></td>
<th>Admitted Class:</th><td><?php echo $adm_class; ?></td>
</tr>
<tr><th>Age:</th><td><?php echo $age; ?></td><td></td>
<th>Sex:</th><td><?php echo $sex; ?></td>
</tr>
<tr><th>Admitted Section:</th><td><?php echo $adm_sec; ?></td><td></td>
<th>&nbsp;</th><td>&nbsp;</td>
</tr>
<tr><th>Date of Birth:</th><td><?php echo $dob; ?></td><td></td>
<th>&nbsp;</th><td>&nbsp;</td>
</tr>

</table>
</td>
</table>
</fieldset>
<fieldset>
<legend>Contact Details</legend>
<table>
<tr>
<th>Home Phone :</th><td><?php echo $father_work_phone; ?></td><td width="8%"></td>
<th>Mobile Phone :</th><td><?php echo $father_work_phone; ?></td><td width="8%"></td>
<th>Email Address :</th><td><?php echo $mail_add; ?></td>
</tr>
<tr><th>Present Address:</th><td><?php echo $par_address; ?></td><td></td>
<th>&nbsp;</th><td>&nbsp;</td><td></td>
<th>Previous Address:</th><td><?php echo $pre_address; ?></td>
</tr>
</table>
</fieldset>

<fieldset>
<legend>Parents Details</legend>

<table>


<tr>
<th>Mother Name:</th><td><?php echo $mother_name; ?></th><td></td>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th><td>&nbsp;</td><td></td>
<th>Mother Mobile:&nbsp;&nbsp;&nbsp;</th><td><?php echo $mother_work_phone; ?></td>
</tr>
<tr><th>Qualification:</th><td><?php echo $father_qualification;  ?></td><td></td>
<th>Qualification:</th><td><?php echo $mother_qualification; ?></td>
</tr>
<tr><th>Work Phone :</th><td><?php echo $father_work_phone;  ?></td><td></td>
<th>Work Phone:</th><td><?php echo $mother_work_phone; ?></td>
</tr>
</table>
</fieldset>


<fieldset>
<legend>Student Preveios Records</legend>
<table>

<tr>
<th>Previous School:</th>
<td><?php echo $priv_school_name;  ?></td>
<td width="9%"></td>
<th>Class Roll:</th>
<td><?php echo $priv_school_class_roll;  ?></td>
<td width="22%"></td>
<th>Class Name:</th><td><?php echo $priv_school_class; ?></td>
</tr>
<tr>

</tr>
<tr>
	<th>Result:</th>
	<td><?php echo $priv_school_result;  ?></td>
	<td></td>
	<th>Status:</th>
	<td><?php echo $st_status; ?></td>
</tr>

</table>
</fieldset>
<table>
<tr>
<td><!--<input type="button" id="back_btn" onclick="javascript:history.go(-1);"  name="up_btn" class="form-back" />--></td>
<td width="90%"></td>
<td><!--<input type="button" id="prev_btn" name="up_btn" class="form-update" />--></td>

</tr>
</table>



	

</div>