<?php
      $tid = $_GET['tid'];
      $qry = "select * from std_teacher_info where id=$tid and branch_id='$branchid' ";
	  $res = mysql_query($qry);
	  
	  $row = mysql_fetch_row($res);	  
	  	  
		 $name              = $row['teacher_name'];
		 $telephone        = $row['Telephone']; 
		 $mobile             = $row['mobile']; 
		 $email               = $row['email']; 
		 $Last_education = $row['Last_education']; 
		 $merried            = $row['merried']; 
		 $sex                  = $row['sex'];	 	 
		 $picture             = $row['picture']; 
		 $subject             = $row['subject'];		  
		 $group               = $row['group']; 
		 $job_experience = $row['job_experience']; 
		 $branch_id        = $row['branch_id']; 
		 $teacher_code   = $row['teacher_code']; 
		 $nationality        = $row['nationality']; 
		 $birth_date        = $row['birth_date']; 
		 $age                 = $row['age'];
		 $present_add     = $row['present_add']; 
		 $permenent_add = $row['permenent_add']; 
		 $present_status   = $row['present_status']; 
		 $salary               = $row['salary']; 
?>

<div id="content" class="box">
    <fieldset>
        <legend>Personal Details</legend>
        <table border="0" cellpadding="0" cellspacing="0" >
            <tr>
                <th width="17%" valign="top">Name:</th>
                <td><?php echo $name;   ?></td><td></td>
                <th width="17%" valign="top">Code Number:</th>
                <td><?php echo $teacher_code;   ?></td>
            </tr>
            <tr>
                <th valign="top">Age:</th>
                <td><?php echo $age;   ?></td><td width="18%"></td>
                <th valign="top">Sex:</th>
                <td><?php echo $sex;   ?></td>
            </tr>
            <tr>
                <th valign="top">Nationality:</th>
                <td><?php echo $nationality;   ?></td><td width="18%"></td>
                <th valign="top">Birth Date:</th>
                <td><?php echo $bbirth_date;   ?></td>
            </tr>
            <tr>
                <th valign="top">Marital Status:</th>
                <td><?php echo $merried;   ?></td><td width="18%"></td>
               
            </tr>
        </table>
    </fieldset>

    <fieldset>
        <legend>Contact Details</legend>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th width="17%" valign="top">Home Phone:</th>
                <td><?php echo $telephone;   ?></td><td></td>
                <th width="17%" valign="top">Mobile No:</th>
                <td><?php echo $mobile;   ?></td>
            </tr>
            <tr>
                <th valign="top">Email Address:</th>
                <td><?php echo $email;   ?></td><td width="20%"></td>
                <th valign="top">Others:</th>
                <td><?php echo $other;   ?></td>
            </tr>
            <tr>
                <th width="17%" valign="top">Present Address:</th>
                <td><?php echo $present_add;   ?></td><td></td>
                <th width="17%" valign="top">Parmenent Address:</th>
                <td><?php echo $permenent_add;   ?></td>
            </tr>
        </table>
    </fieldset>
	
    <fieldset>
        <legend>Other Details</legend>
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th width="14%" valign="top">Latest Qualification :</th>
                <td><?php echo $Last_education;   ?></td><td width="17%"></td>
                <th width="16%" valign="top">Group:</th>
                <td><?php echo $group;   ?></td>
            </tr>
            <tr>
                <th valign="top">Subject:</th>
                <td><?php echo $subject;   ?></td><td width="10%"></td>
                <th valign="top"> Experience:</th>
                <td><?php echo $job_experience;   ?></td>
            </tr>
            <tr>
                <th  valign="top">Present Status:</th>
                <td><?php echo $present_status;   ?></td><td width="10%"></td>
            	<th  valign="top">Salary:</th>
                <td><?php echo $salary;   ?></td>
            </tr>
        </table>
    </fieldset>
    <table>
	    <tr>
			<td>    <input type="button" id="sub_btn" name="sub_btn" class="form-back"/></td><td width="90%"></td>
			<td>   <input type="button" id="sub_btn" name="sub_btn" class="form-update"/></td>
		</tr>
	</table>
</div>