


    
<!--<link rel="stylesheet" type="text/css" media="screen" href="css/screen2.css" /> -->

<!-- Content (Right Column) -->
    <div id="content" class="box">  
	
	
	
      
	    <?php
		
		  $result=mysql_query("select * from user_info where login_id='$login_id'");
		           
		 while($row=mysql_fetch_array($result))
	       {
		   
		     //echo $login_id;
			 $sponsor_id=$row['s_id'];
			 $form_type=$row['form_type'];
			 $member_name=$row['m_name'];
			 $p_name=$row['pname'];
			 $member_date_of_birth=$row['m_dob'];
			 $marriage_status=$row['m_status'];
			 $nationality=$row['nationality'];
			 $address=$row['address'];
			 $mail_address=$row['mailing_address'];
			 $city=$row['city'];
			 $state=$row['state'];
			 $mobile_no=$row['mobile_no'];
			 $phone_office=$row['phone_office'];
			 $email=$row['email'];
			 $dispatch_mode=$row['dispatch_mode'];
			 $nominee_name=$row['n_name'];
			 $nominee_relation=$row['n_relation'];
			 $nominee_address=$row['n_address'];
			 $nominee_date_of_birth=$row['n_dob'];
			 $bank_name=$row['bank_name'];
			 $acc_no=$row['acc_no'];
			 $bank_branch=$row['bank_branch'];
			 $hint=$row['hint'];
			 $hint_ans=$row['hint_ans'];
			 $app_no=$row['app_no'];
			 $status=$row['status'];
			 $donate_care=$row['donate_care'];
			 $posid=$row['pos_id'];
			 $treeid=$row['tree_id'];
		   
		   
		   }
		
		// echo $sponsor_id;  
		
		 ?>
		
	 <form action="" method="post"  enctype="multipart/form-data" />	
	
	      <div class="title" >Personal Profile</div> 
		 
		   <div class="form_tab">
		   	
			<div class="basic">
<fieldset class="basicc" >			
			<legend >Personal Details </legend>
		 <table>
		   		
				<tr>
					<td width="323">Sponsor Affillate Id :</td>
				  <td width="198"><input type="text" name="sponsor_id" value="<?php echo $sponsor_id ?>" /></td>
					<td width="183">Date Of Joining :</td>
				  <td width="334"><input type="text" id="date_joining" value="<?php echo date('Ymd');?>" class="form_input" /></td>
				</tr>
					<tr>
					<td>Category :</td>
					<td><input type="text"/></td>
					<td>Date of Upgradation :</td>
					<td><input type="text" id="date_upgradation" value="<?php echo date('Ymd');?>" class="form_input" /></td>
				</tr>
			   
		   </table>	
		   </fieldset>
		   <script type="text/javascript">
                  new Calendar({
                          inputField: "date_upgradation",
                          dateFormat: "%Y%m%d",
                          trigger: "date_upgradation",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                 
                </script>
				<script type="text/javascript">
                  new Calendar({
                          inputField: "date_joining",
                          dateFormat: "%Y%m%d",
                          trigger: "date_joining",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                 
                </script>
			</div>	
			<div class="basic">
<fieldset>				
			<legend>Your Account Details </legend>
		 <table>
		   		
				<tr>
					<td width="268">Sponsor Affillate Id :</td>
				  <td width="183"><input type="text"  /></td>
					<td width="227"></td>
				  <td width="330"></td>
				</tr>
					<tr>
					<td>Nominee :</td>
					<td><input type="text" name="nominee_name" value="<?php echo $nominee_name?>"/></td>
					<td>Relation with Nominee:</td>
					<td><input type="text" name="nominee_relation" value="<?php echo $nominee_relation?>"  /></td>
				</tr>
			   
		   </table>
</fieldset>			   
		   </div>
		   <div class="basic">	
		   <fieldset>	
			<legend>Your Personal Details </legend>
		 <table>
		   		
				<tr>
					<td width="800">Name :</td>
				  <td width="313"><input type="text" name="member_name" value="<?php echo $member_name ?>" /></td>
					<td width="100">Date Of Birth:</td>
				  <td width="230"><input type="text" id="date_birth" name="date_of_birth"value="<?php echo $member_date_of_birth?>" class="form_input" /></td>
				
				</tr>
				<tr>
					
					<td>Office Phone No:</td>
					<td><input type="text" name="phone_office" value="<?php echo $phone_office ?>"  /></td>
					<td width="650" >E-mail:</td>
					<td><input type="text" name="email" value="<?php echo $email ?>"/></td>
			
				
				</tr>
				<tr>
					
					<td>Mobile No:</td>
					<td><input type="text" name="mobile_no" value="<?php echo $mobile_no ?>"/></td>
					<td>Address:</td>
					<td><input type="textarea" name="address" value="<?php echo $address ?>" /></td>
			
				
				</tr>
				
					<tr>
					
					<td>Mailing Address:</td>
					<td><input type="textarea" name="mail_address" value="<?php echo $mail_address ?>"/></td>
					<td>Nationality:</td>
					<td><input type="textarea" name="nationality" value="<?php echo $nationality ?>" /></td>
			
				
				</tr>
				<tr>
					
					<td>Country:</td>
					<td>
					
					<!--<input type="text"/>-->
					
					<?php

$country_list = Array(

 'Australia',
 'Austria',
 'Azerbaijan',
 'Bahamas',
 'Bahrain',
 'Bangladesh',
 'Barbados',
 'Belarus',
 'Belgium',
 'Belize',
 'Benin',
 'Bermuda',
 'Bhutan',
 'Bolivia',

 'Botswana',
 'Bouvet Island',
 'Brazil',
 
 'Brunei Darussalam',
 'Bulgaria',
 'Burkina Faso',
 'Burundi',
 'Cambodia',
 'Cameroon',
 'Canada',
 'Cape Verde',
 'Cayman Islands',

 'Chad',
 'Chile',
 'China',
 'Christmas Island',
 
 'Colombia',
 'Comoros',
 'Congo',
 'Congo', 
 'Cook Islands',
 'Costa Rica',
 'Cuba',
 'Cyprus',
 'Czech Republic',
 'Denmark',
'Djibouti',
 'Dominica',
 'Dominican Republic',
 'East Timor',
 'Ecuador',
 'Egypt',
 'El Salvador',
'Equatorial Guinea',
 'Eritrea',
 'Estonia',
 'Ethiopia',

 'Faroe Islands',
'Fiji',
 'Finland',
 'France',

 'French Guiana',
 'French Polynesia',

'Gabon',
 'Gambia',
 'Georgia',
 'Germany',
 'Ghana',
 'Gibraltar',
 'Greece',
 'Greenland',
 'Grenada',
 'Guadeloupe',
 'Guam',
 'Guatemala',
 'Guinea',
'Guinea-Bissau',
 'Guyana',
 'Haiti',


 'Honduras',
 'Hong Kong',
 'Hungary',
 'Iceland',
 'India',
 'Indonesia',

 'Iraq',
 'Ireland',
'Israel',
 'Italy',
 'Jamaica',
 'Japan',
 'Jordan',
'Kazakhstan',
 'Kenya',
 'Kiribati',


 'Kuwait',
 'Kyrgyzstan',

 'Latvia',
 'Lebanon',
 'Lesotho',
 'Liberia',
 
 'Liechtenstein',
 'Lithuania',
 'Luxembourg',
 'Macau',

 'Madagascar',
'Malawi',
 'Malaysia',
 'Maldives',
 'Mali',
 'Malta',
 'Marshall Islands',
 'Mauritania',
 'Mauritius',
 'Mayotte',
 'Mexico',
 

 'Mongolia',
 'Montserrat',
 'Morocco',
 'Mozambique',
 'Myanmar',
 'Namibia',
 'Nauru',
'Nepal',
 'Netherlands',
 'Netherlands Antilles',
 'New Caledonia',
 'New Zealand',
 'Nicaragua',
 'Niger',
 'Nigeria',
 'Niue',
'Norfolk Island',

'Norway',
'Oman',
 'Pakistan',
 'Palau',
 'Panama',
 'Papua New Guinea',
'Paraguay',
 'Peru',
 'Philippines',
 'Pitcairn',
 'Poland',
 'Portugal',
 'Puerto Rico',
 'Qatar',
 'Reunion',
 'Romania',
 'Russian Federation',
'Rwanda',
 'Saint Kitts And Nevis',
 'Saint Lucia',
 
 'Samoa',
 'San Marino',
 
'Saudi Arabia',
 'Senegal',
'Seychelles',
 'Sierra Leone',

 'Slovenia',
 'Solomon Islands',
 'Somalia',
'South Africa',

 'Spain',
'SriLanka',
 'St. Helena',

'Sudan',
 'Suriname',

 'Swaziland',
 'Sweden',
 'Switzerland',
 'Syrian Arab Republic',
'Taiwan',
'Tajikistan',
 'Tanzania', 
 'Thailand',
 'Togo',
'Tokelau',
 'Tonga',

 'Tunisia',
 'Turkey',
 'Turkmenistan',

 'Tuvalu',
 'Uganda',
'Ukraine',
 'United Arab Emirates',
 'United Kingdom',
 
 'Uruguay',
 'Uzbekistan',
'Vanuatu',
 'Venezuela',
 'Viet Nam',

 'Western Sahara',
 'Yemen',
 'Yugoslavia',
 'Zambia',
'Zimbabwe'
		
     

	);


?>

   <select name="country">
<?php
foreach($country_list as $c)
{
?>
    <option value="<?= $c; ?>" <?= ($_POST['country']== $c)?' selected="selected"':''; ?>><?= $c; ?></option>
<?
}
?>
</select>
 
									
					
					</td>
					<td>District:</td>
					<td>
					
					<!--<input type="text"  />-->
							<?php


$dist = Array(
        'Bagerhat',
        'Bandarban ',
        'Barguna',
        'Barisal',
        'Bhola',
        'Bogra',
        'Brahmanbaria',
        'Chandpur',
        'Chapainababganj',
        'Chittagong',
        'Chuadanga',
        'Comilla',
        'Cox\'s Bazar',
        'Dhaka',
        'Dinajpur',
        'Faridpur',
        'Feni',
        'Gaibandha',
        'Gazipur',
        'Gopalganj',
        'Habiganj',
        'Jaipurhat',
        'Jamalpur',
        'Jessore',
        'Jhalakati',
        'Jhenaidah',
        'Khagrachari',
        'Khulna',
        'Kishoreganj',
        'Kurigram',
        'Kushtia',
        'Lakshmipur',
        'Lalmonirhat',
        'Madaripur',
        'Magura',
        'Manikganj',
        'Meherpur',
        'Moulvibazar',
        'Munshiganj',
        'Mymensingh',
        'Naogaon',
        'Narail',
        'Narayanganj',
        'Narsingdi',
        'Natore',
        'Nawabganj',
        'Netrakona',
        'Nilphamari',
        'Noakhali',
        'Pabna',
        'Panchagarh',
        'Patuakhali',
        'Pirojpur',
        'Rajbari',
        'Rajshahi',
        'Rangamati',
        'Rangpur',
        'Satkhira',
        'Shariatpur',
        'Sherpur',
        'Sirajganj',
        'Sunamganj',
        'Sylhet',
        'Tangail',
        'Thakurgaon'
    );
?>


<select name="district">
<?php
foreach($dist as $d)
{
?>
        <option value="<?= $d; ?>" <?= ($_POST['district']== $d)?' selected="selected"':''; ?>><?= $d; ?></option>
	
	   
<?
}
?>
</select>
					
					</td>
			
				
				</tr>
				<tr>
					
					<td>Division:</td>
					
					
					
					<!--<td><input type="text"/></td>-->
					
	<td>				<?php

   $division_list=Array
   (
     'Barisal','Chittagong','Dhaka','Khulna','Rajshahi','Sylhet'
	    
   );



?>
   <select name="division">
<?php
foreach($division_list as $di)
{
?>
    <option value="<?= $di; ?>" <?= ($_POST['division']== $di)?' selected="selected"':''; ?>><?= $di; ?></option>
<?
}
?>
</select>
</td>
					
					
					
					<td>Postal Code:</td>
					<td><input type="text"  /></td>
			
				
				</tr>
			   
		   </table>	
		   
		   </fieldset>
		   
		   
		     
				   <div class="basic">	
		               <fieldset>	
			                     <legend>Image Upload </legend>
								 
								 
								
                               <!--   <form action="" method="post" enctype="multipart/form-data">-->
								 
								  <table border="0" cellpadding="0"  cellspacing="0"  id="id-form">
								  
								  	<tr>
			                           <th valign="top"><td width="158">Picture Upload:</td></th>
		                            	<td width="210"><input type="file" name="file" id="file" /> </td>
	
                                        <td>
		                            	<div class="error-left"></div>
		                            	<div class="error-inner">This field is required.</div>
			                            </td>	
		                                </tr>
										<tr>
	                                   	<th>&nbsp;</th>
		                                <td valign="top">
		                          <!--    	<input type="submit" value="" name="submit" class="form-submit" />
										
		                            	<input type="submit" value="" name="reset" class="form-reset"  />  -->
		                                </td>
	                                  	<td></td>
	                                    </tr>
	
		
	                                   </table>
								 
   
		               </fieldset>
					   
   				  
				   </div>	   
 
		   <script type="text/javascript">
                  new Calendar({
                          inputField: "date_birth",
                          dateFormat: "%Y%m%d",
                          trigger: "date_birth",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.max = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                 
                </script>
		   </div>
		    <div class="basic">	
			
<fieldset>				
			<legend>General Profile </legend>
		 <table>
		   		
				<tr>
				
				
				    <td width="160">Education:</td>
				  <td width="174"><input type="text" /></td>
				
				
				
					<td  width="145">Gender :</td>
					
					
				   
				<td>			
					<?php

                         $gender_list=Array
                          (
                          'Male','Female',
	    
                          );

                     ?>
                        <select name="gender">
                    <?php
                         foreach($gender_list as $g)
                         {
                          ?>
                          <option value="<?= $g; ?>" <?= ($_POST['gender']== $g)?' selected="selected"':''; ?>><?= $g; ?></option>
                          <?
                           }
                          ?>
						</select>
				</td>
								
				
			
				
					
				 
				</tr>
				<tr>
					
					<td>Maritals Status:</td>
					
					<!--<td><input type="text"/></td>-->
					
									<td>				<?php

   $married_list=Array
   (
     'Married','Unmarried'
	    
   );

?>
<select name="married">
<?php
foreach($married_list as $m)
{
?>
    <option value="<?= $m; ?>" <?= ($_POST['married']== $m)?' selected="selected"':''; ?>><?= $m; ?></option>
	
	
<?
}
?>
</select>
</td>
	
					
					
					
					
					
					<td>Personal income:</td>
					<td><input type="text" name="personal_income" value="" /></td>
			
				
				</tr>
				<tr>
					
					<td>Functional Area:</td>
					<td><input type="text" name="functional_area" value=""/></td>
					<td>Designation:</td>
					<td><input type="text" name="designation" value=""  /></td>
			
				
				</tr>
				<tr>
					
					<td>Industry:</td>
					<td><input type="text" name="industry" value=""/></td>
					<td>Company Size:</td>
					<td><input type="text" name="company_size" value=""  /></td>
			
				
				</tr>
				<tr>
					
					<td>Accomodation:</td>
					<td><input type="text" name="" value=""/></td>
					<td>Any Illness:</td>
					<td><input type="text" name="" value=""  /></td>
			
				
				</tr>
			   
		   </table>	
		   </fieldset>	
		   </div>
		   
		    <div class="basic">	
			<fieldset>	
			<legend>Your Bank Details  </legend>
		 <table>
		   		
				<tr>
					<td width="262">Account Name(As In Bank Account) :</td>
				  <td width="207"><input type="text" name="" value="" /></td>
					<td width="240">Your Bank Name:</td>
				  <td width="324"><input type="text" name="bank_name" value="<?php echo $bank_name ?>" /></td>
				 
				</tr>
				<tr>
					
					<td>Your Bank Account no:</td>
					<td><input type="text" name="acc_no" value="<?php echo $acc_no ?>"/></td>
					<td>Your Bank Branch Address:</td>
					<td><input type="text" name="bank_branch" value="<?php echo $bank_branch ?>"  /></td>
			
				
				</tr>
				<tr>
					
					<td>Confirm Bank Account No:</td>
					<td><input type="text" name="" value=""/></td>
					<td>Your Bank Branch Code No:</td>
					<td><input type="text" name="" value=""  /></td>
			
				
				</tr>
				<tr>
					
					<td>Your Bank IFSC Code:</td>
					<td><input type="text" name="" value=""/></td>
					<td>Your Bank Swift Code:</td>
					<td><input type="text" name="" value=""  /></td>
			
				
				</tr>
				
			   
		   </table>	
		   </fieldset>	
		   </div>
		   		   		  
	  <b> 
  
	  

	  
   <input name="submit" type="submit" value="update" /> 

   </form>
   
    	   <?php	
		   
		if (isset($_POST['submit']))
		{   
		
				  
			$file_type=$_FILES["file"]["type"] ;
		$file_error=$_FILES["file"]["error"];
		$file_size=$_FILES["file"]["size"];
		$file_name=$_FILES["file"]["name"];
		$file_temp_name=$_FILES["file"]["tmp_name"];
		echo picUpload($file_type,$file_error,$file_size,$file_name,$file_temp_name);	  
		
		
		
		
		  
		   $sponsor_id=$_POST["sponsor_id"];
		   $nominee_name=$_POST["nominee_name"];
		   $nominee_relation=$_POST["nominee_relation"];
		   $nominee_date_of_birth=$_POST["nominee_date_of_birth"];
		   $nominee_address=$_POST["nominee_address"];
		   
		   $member_name=$_POST["member_name"]; 
		   $member_date_of_birth=$_POST["member_date_of_birth"];
		   $phone_office=$_POST["phone_office"];   
		   $email=$_POST["email"];	
		   $mobile_no=$_POST["mobile_no"];
		   $address=$_POST["address"];
		   $mail_address=$_POST["mail_address"];
		   $nationality=$_POST["nationality"];
		   
		   $marriage_status=$_POST["marriage_status"];
		   
		   $bank_name=$_POST["bank_name"];
		   $acc_no=$_POST["acc_no"];
		   
		   $bank_branch=$_POST["bank_branch"];
		   $status=$_POST["status"];
		   $pos_id=$_POST["pos_id"];
		   $tree_id=$_POST["tree_id"];
		   
		   $married=$_POST["married"];
		   $gender=$_POST["gender"];
		   $district=$_POST["district"];
		   $division=$_POST["division"];
		   $country=$_POST["country"];
		   
		   
		   
		   
		
	
$result=("UPDATE user_info SET s_id='$sponsor_id',m_status='$married',n_name='$nominee_name',n_relation='$nominee_relation',m_name='$member_name',m_dob='$member_date_of_birth',phone_office='$phone_office',email='$email',mobile_no='$mobile_no',address='$address',mailing_address='$mail_address',nationality='$nationality',bank_name='$bank_name',acc_no='$acc_no',bank_branch='$bank_branch'  where login_id='$login_id'");
	//echo $login_id;
	
	
	mysql_query($result);
	
	//echo $result;
			
   
		}
		
		      function picUpload($file_type,$file_error,$file_size,$file_name,$file_temp_name)
        {
          if ((($file_type == "image/gif")
              || ($file_type == "image/jpeg")
              || ($file_type == "image/pjpeg"))
              && ($file_size < 1000000))
                 {
                 if ($file_error > 0)
                    {
                    $rtr= "Return Code: " . $file_error . "<br />";
                    }
                	 else
                    	{
                     	if (file_exists("upload/" . $file_name))
       						{
      						$rtr=$file_name . " already exists. ";
      						}
				  		  	else
      							{
					      		move_uploaded_file($file_temp_name,
    					  		"upload/" . $file_name);
  
	  							$image_name = "upload/" . $file_name;

      							$rtr= "<img src=\"$image_folder/$image_name\" alt=\"$image_name\" />";

      							}
    					}
  				}
			else
  				{
  				$rtr= "Invalid file";
 				 }
  
  				return $rtr;
	  
  	}
		
		
		
		?>
	
	
       

	  </div>
	  </div>  
      
     
    
     
    </div>
    <!-- /content -->
	