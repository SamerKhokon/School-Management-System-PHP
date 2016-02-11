


    
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
 		<h2 class="pro_head">Sponsor Details</h2>
		 <table>
		   		
				<tr>
					<td class="heads">Sponsor Affillate Id :</td>
				  <td class="pro_p"><input type="text" name="sponsor_id" value="<?php echo $sponsor_id ?>" /></td>
					<td class="heads">Date Of Joining :</td>
				  <td class="pro_p"><input type="text" id="date_joining" value="<?php echo date('Ymd');?>" class="form_input" /></td>
				</tr>
					<tr>
					<td class="heads">Category :</td>
					<td class="pro_p"><input type="text"/></td>
					<td class="heads">Date of Upgradation :</td>
					<td class="pro_p"><input type="text" id="date_upgradation" value="<?php echo date('Ymd');?>" class="form_input" /></td>
				</tr>
			   
		   </table>	
		 
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
				
			 <h2 class="pro_head">Your Account Details</h2>
		 <table>
		   		
				<tr>
					<td class="heads">Sponsor Affillate Id :</td>
				  <td class="pro_p"><input type="text"  /></td>
					<td></td>
				  <td ></td>
				</tr>
					<tr>
					<td class="heads">Nominee :</td>
					<td class="pro_p"><input type="text" name="nominee_name" value="<?php echo $nominee_name?>"/></td>
					<td class="heads">Relation with Nominee:</td>
					<td class="pro_p"><input type="text" name="nominee_relation" value="<?php echo $nominee_relation?>"  /></td>
				</tr>
			   
		   </table>
		   
		   </div>
		   <div class="basic">	
		
			<h2 class="pro_head">Your Personal Details</h2>
		 <table>
		   		
				<tr>
					<td class="heads">Name :</td>
				  <td class="pro_p"><input type="text" name="member_name" value="<?php echo $member_name ?>" /></td>
					<td class="heads">Date Of Birth:</td>
				  <td class="pro_p"><input type="text" id="date_birth" name="date_of_birth"value="<?php echo $member_date_of_birth?>" class="form_input" /></td>
				
				</tr>
				<tr>
					
					<td class="heads">Office Phone No:</td>
					<td class="pro_p"><input type="text" name="phone_office" value="<?php echo $phone_office ?>"  /></td>
					<td class="heads">E-mail:</td>
					<td class="pro_p"><input type="text" name="email" value="<?php echo $email ?>"/></td>
			
				
				</tr>
				<tr>
					
					<td class="heads">Mobile No:</td>
					<td class="pro_p"><input type="text" name="mobile_no" value="<?php echo $mobile_no ?>"/></td>
					<td class="heads">Address:</td>
					<td class="pro_p"><input type="textarea" name="address" value="<?php echo $address ?>" /></td>
			
				
				</tr>
				
					<tr>
					
					<td class="heads">Mailing Address:</td>
					<td class="pro_p"><input type="textarea" name="mail_address" value="<?php echo $mail_address ?>"/></td>
					<td class="heads">Nationality:</td>
					<td class="pro_p"><input type="textarea" name="nationality" value="<?php echo $nationality ?>" /></td>
			
				
				</tr>
				<tr>
					
					<td class="heads">Country:</td>
					<td class="pro_p">
					
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
   <option Value="Bangladesh">Bangladesh</option>
<?php
foreach($country_list as $c)
{
?>
    <option value="<?php $c; ?>" > <?php echo $c; ?></option>
<?php
}
?>
</select>
 
									
					
					</td>
					<td class="heads">District:</td>
					<td class="pro_p">
					
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
<option value="Dhaka">Dhaka</option>
<?php
foreach($dist as $d)
{
?>
        <option value="<?php $d; ?>"><?php echo $d; ?></option>
	
	   
<?php
}
?>
</select>
					
					</td>
			
				
				</tr>
				<tr>
					
					<td class="heads">Division:</td>
					
					
					
					<!--<td><input type="text"/></td>-->
					
	<td class="pro_p">				<?php

   $division_list=Array
   (
     'Barisal','Chittagong','Dhaka','Khulna','Rajshahi','Sylhet'
	    
   );



?>
   <select name="division">
   <option value="Dhaka">Dhaka</option>
<?php
foreach($division_list as $di)
{
?>
    <option value="<?php $di; ?>" ><?php echo $di; ?></option>
<?php
}
?>
</select>
</td>
					
					
					
					<td class="heads">Postal Code:</td>
					<td class="pro_p"><input type="text"  /></td>
			
				
				</tr>
			   
		   </table>	
		   
	
		     
					   
 
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
			
		<h2 class="pro_head">General Profile</h2>
		 <table>
		   		
				<tr>
				
				
				    <td class="heads">Education:</td>
				  <td class="pro_p"><input type="text" /></td>
				
				
				
					<td class="heads">Gender :</td>
					
					
				   
				<td class="pro_p">			
					    <select name="gender">
						<option value="Male">Male</option>
						<option value="Male">Feale</option>
						
                    	</select>
				</td>
								
				
			
				
					
				 
				</tr>
				<tr>
					
					<td class="heads">Maritals Status:</td>
					
				
					
									<td class="pro_p">			

<select name="married">
<option value="Marrid">Married</option>
<option value="Marrid">Unmarried</option>
</select>
</td>
	
					
					
					
					
					
					<td class="heads">Personal income:</td>
					<td class="pro_p"><input type="text" name="personal_income" value="" /></td>
			
				
				</tr>
				<tr>
					
					<td class="heads">Functional Area:</td>
					<td class="pro_p"><input type="text" name="functional_area" value=""/></td>
					<td class="heads">Designation:</td>
					<td class="pro_p"><input type="text" name="designation" value=""  /></td>
			
				
				</tr>
				<tr>
					
					<td class="heads">Industry:</td>
					<td class="pro_p"><input type="text" name="industry" value=""/></td>
					<td class="heads">Company Size:</td>
					<td class="pro_p"><input type="text" name="company_size" value=""  /></td>
			
				
				</tr>
				<tr>
					
					<td class="heads">Accomodation:</td>
					<td class="pro_p"><input type="text" name="" value=""/></td>
					<td class="heads">Any Illness:</td>
					<td class="pro_p"><input type="text" name="" value=""  /></td>
			
				
				</tr>
			   
		   </table>	
		
		   </div>
		   
		    <div class="basic">	
			<h2 class="pro_head">Your Bank Details</h2>
		 <table>
		   		
				<tr>
					<td class="heads">Account Name(As In Bank Account) :</td>
				  <td class="pro_p"><input type="text" name="" value="" /></td>
					<td class="heads">Your Bank Name:</td>
				  <td class="pro_p"><input type="text" name="bank_name" value="<?php echo $bank_name ?>" /></td>
				 
				</tr>
				<tr>
					
					<td class="heads">Your Bank Account no:</td>
					<td class="pro_p"><input type="text" name="acc_no" value="<?php echo $acc_no ?>"/></td>
					<td class="heads">Your Bank Branch Address:</td>
					<td class="pro_p"><input type="text" name="bank_branch" value="<?php echo $bank_branch ?>"  /></td>
			
				
				</tr>
				<tr>
					
					<td class="heads">Confirm Bank Account No:</td>
					<td class="pro_p"><input type="text" name="" value=""/></td>
					<td class="heads">Your Bank Branch Code No:</td>
					<td class="pro_p"><input type="text" name="" value=""  /></td>
			
				
				</tr>
				<tr>
					
					<td class="heads">Your Bank IFSC Code:</td>
					<td class="pro_p"><input type="text" name="" value=""/></td>
					<td class="heads">Your Bank Swift Code:</td>
					<td class="pro_p"><input type="text" name="" value=""  /></td>
			
				
				</tr>
				
			   
		   </table>	
		
		   </div>

	  
 <samp class="button_setting"> <input name="submit" type="submit" value="Update" class="button_update" /> </samp>
	  
   

   </form>
   
    	   <?php	
		   
		if (isset($_POST['submit']))
		{   
		
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
		
	
		
		
		?>
	
	
       

	  </div>
	  </div>  
      
     
    
     
    </div>
    <!-- /content -->
	