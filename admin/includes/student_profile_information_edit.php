<?php
      
   
require'db.php'; 

   //   echo "hello";

    // $stu_id=$_GET['stu_id'];
	echo $stu_id=1;
   
     $sql=mysql_query("select * from std_profile where id='$stu_id'");
	 
$row=mysql_fetch_array($sql);

	
	  
		  $name=$row['name'];
		  $father_name=$row['father_name']; 
		  $mother_name=$row['mother_name']; 
		 $pre_address=$row['pre_address']; 
		 $par_address=$row['par_address']; 
		 $home_phone=$row['home_phone']; 
		 $emer_name1=$row['emer_name1'];	 	 
		 $emer_mobile1=$row['emer_mobile1']; 
		 $emer_name2=$row['emer_name2'];		  
		 $emer_mobile2=$row['emer_mobile2']; 
		 $mail_add=$row['mail_add']; 
		 $age=$row['age']; 
		 $sex=$row['sex']; 
		 $adm_date=$row['adm_date']; 
		 $picture=$row['picture']; 
		 $adm_class=$row['adm_class']; 
		 $adm_class_roll=$row['adm_class_roll']; 
		 $adm_group=$row['adm_group']; 
		 $father_income=$row['father_income']; 
		 $mother_income=$row['mother_income']; 
		 $father_qualification=$row['father_qualification']; 
		 $mother_qualification=$row['mother_qualification']; 
		 $father_work_phone=$row['father_work_phone']; 
		 $mother_work_phone=$row['mother_work_phone']; 
		 $admission_fee=$row['admission_fee']; 
		 $priv_school_name=$row['priv_schoole_name']; 
		 $priv_school_add=$row['priv_school_add']; 
		 $priv_school_class=$row['priv_school_class']; 
		 $priv_school_class_roll=$row['priv_school_class_roll']; 
		 $priv_school_remarks=$row['priv_school_remarks']; 
		 $priv_school_result=$row['priv_school_result']; 
		 $present_class=$row['present_class']; 
		 $present_class_roll=$row['present_class_roll']; 
		 $st_status=$row['st_status']; 
		 $branch_id=$row['branch_id'];	
		 
		  
  ?>


<div id="content" class="box">
  
<fieldset> 
	<legend>Student Details</legend>	
<table cellpadding="0" border="0" cellspacing="0">
<tr><th>Name:</th><td ><input type="text" name="name" value="<?php echo $name; ?>" /></td><td></td>
<th>Admitted Class:</th><td><input type="text" name="adm_class" value="<?php echo $adm_class; ?>" /></td>
</tr>
<tr><th>Age:</th><td><input type="text" name="age" value="<?php echo $age; ?>" /></td><td></td>
<th>Sex:</th><td><input type="text" name="sex" value="<?php echo $sex; ?>" /></td>
</tr>
<tr><th>Admitted Section:</th><td><input type="text" name="adm_sec" value="<?php echo $adm_sec; ?>" /></td><td></td>
<th>Admitted Group :</th><td><input type="text" name="adm_group" value="<?php echo $adm_group; ?>" /></td>
</tr>
<tr><th>Date of Birth:</th><td><input type="text" name="dob" value="<?php echo $dob; ?>" /></td><td width="16%"></td>
<th>Pay Slip No:</th><td><input type="text" name="pay_slip_no" value="<?php echo $pay_slip_no; ?>" /></td>
</tr>
</table>
</fieldset>

<fieldset>
<legend>Contact Details</legend>
<table>
<tr>
<th>Home Phone :</th><td><input type="text" name="home_phone" value="<?php echo $home_phone; ?>" /></td><td></td>
<th>Email Address :</th><td><input type="text" name="mail_add" value="<?php echo $mail_add; ?>" /></td>
</tr>
<tr><th>Present Address:&nbsp;</th><td><input type="text" name="par_address" value="<?php echo $par_address; ?>" /></td><td></td>
<th>Previous Address:</th><td><input type="text" name="pre_address" value="<?php echo $pre_address; ?>" /></td>
</tr>
<tr>
<th>Emergency 1:</th><td><input type="text" name="emer_name1" value="<?php echo $emer_name1; ?>" /></td><td></td>
<th>Mobile :</th><td><input type="text" name="emer_mobile1" value="<?php echo $emer_mobile1;  ?>" /></td>
</tr>
<tr>
<th>Emergency 2:</th><td><input type="text" name="emer_name2" value="<?php echo $emer_name1; ?>" /></td><td width="16%"></td>
<th>Mobile:</th><td><input type="text" name="emer_mobile2" value="<?php echo $emer_mobile2;  ?>" /></td>
</tr>
</table>
</fieldset>

<fieldset>
<legend>Parents Details</legend>

<table>

<tr><th>Father   Name:</th><td><input type="text" name="father_name" value="<?php echo $father_name; ?>" /></td><td></td>
<th >Mother Name:</th><td><input type="text" name="mother_name" value="<?php echo $mother_name; ?>" /></td>
</tr>
<tr>
<th>Father Income :&nbsp;&nbsp;&nbsp;</th><td><input type="text" name="father_income" value="<?php echo $father_income; ?>" /></td><td></td>
<th>Mother Income:&nbsp;&nbsp;&nbsp;</th><td><input type="text" name="mother_name" value="<?php echo $mother_income; ?>" /></td>
</tr>
<tr><th>Qualification:</th><td><input type="text" name="father_qualification" value="<?php echo $father_qualification;  ?>" /></td><td></td>
<th>Qualification:</th><td><input type="text" name="mother_qualification" value="<?php echo $mother_qualification; ?>" /></td>
</tr>
<tr><th>Work Phone :</th><td><input type="text" name="father_work_phone" value="<?php echo $father_work_phone;  ?>" /></td><td width="16%"></td>
<th>Work Phone:</th><td><input type="text" name="mother_work_phone" value="<?php echo $mother_work_phone; ?>" /></td>
</tr>
</table>
</fieldset>


<fieldset>
<legend>Student Preveios Records</legend>
<table>

<tr><th>Previous School:&nbsp;</th><td><input type="text" name="priv_school_name" value="<?php echo $priv_school_name;  ?>" /></td><td></td>
<th>Class Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><td><input type="text" name="priv_school_class" value="<?php echo $priv_school_class; ?>" /></td>
</tr>
<tr><th>Class Roll:</th><td><input type="text" name="priv_school_class_roll" value="<?php echo $priv_school_class_roll;  ?>" /></td><td></td>
<th>Result:</th><td><input type="text" name="priv_school_result" value="<?php echo $priv_school_result; ?>" /></td>
</tr>
<tr><th>Result:</th><td><input type="text" name="priv_school_result" value="<?php echo $priv_school_result;  ?>" /></td><td width="17%"></td>
<th>Status:</th><td><input type="text" name="st_status" value="<?php echo $st_status; ?>" /></td>
</tr>
</table>
</fieldset>
<input type="submit" class="form-submit" value="update" name="submit" />

<?php

     



?>


	

</div>