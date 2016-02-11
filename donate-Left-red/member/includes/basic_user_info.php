
	 <?php
	 

	  $result=mysql_query("select * from user_info where login_id='$login_id'");
    
	  while($row=mysql_fetch_array($result))
	       {
		     
			 $sponsor_id=$row['s_id'];
			 $form_type=$row['form_type'];
			 $member_date_of_birth=$row['m_dob'];
			 $member_name=$row['m_name'];
			 $married_status=$row['m_status'];
			 $nationality=$row['nationality'];
			 $address=$row['address'];
			 $mail_address=$row['mailing_address'];
			 $city=$row['city'];
			 $state=$row['state'];
			 $mobile_no=$row['mobile_no'];
			 $phone_office=$row['phone_office'];
			 $picture=$row['picture'];
			 $email=$row['email'];
			 $create_date=$row['creation_time'];
			 $bank_name=$row['bank_name'];
			 $acc_no=$row['acc_no'];
			 $bank_branch=$row['bank_branch'];
			 $status=$row['status' ];
			 			 		    
		   }
		  
		   
   ?>
   <div id="content" class="box">       
	 <div class="title" >User Information</div> 
	  <br/>
	  
	  <div class="col2-3 online-users"> 
	  <div class="mark clear">
			<div class="avatars">
								
								 
								     <?php
									 
									 if(empty($picture))
									 {
									 
									 ?>
								     	 <img src="custom_css/avatar.jpg" alt="">
								
								<!--	<img src="custom_css/avatar.jpg" alt="">-->
								   
									 
									 <?php
									 }
									 else
									 {
									 ?>
								          <img src="<?php echo $picture ?>" alt="" />
									 <?php
									 }
									 ?>
									
								
									<!--<p class="status admin">member</p>-->
								</div>
								<div class="descs">
										 <table>
   
											 <tr>
												 	<!--<td> Member Name </td>-->
			  										<td class="pro_name"> <?php echo $member_name ?></td> 
											 </tr>
											 <tr>
											 	<!--<td> Address</td>-->
												<td class="pro_address"><?php echo $address ?></td>
											 </tr>
											 <tr>
											 	 <!--<td> Email</td>-->
		   										 <td class="pro_address"><?php echo $email ?></td>
											 </tr>
											 <tr>
											 	<!--<td class="head"> Mobile No</td>-->
		 									    <td class="pro_mobile">Mobile No :  <?php echo $mobile_no ?></td> 
											 </tr>
										</table>
																		
								
									
								</div>
								<br />
								<h2 class="pro_head">Sponsor Details</h2>
								 <table>
   
									 <tr>
									
										 <td class="heads">Sponsor Name </td>
										 <td class="pro_p">:    <?php echo $sponsor_id ?> </td>
										 
										  <td class="heads"> Form Type </td>
										  <td class="pro_p">:   <?php echo $form_type ?></td>
										   </tr>
										 <tr>
										
										 <td class="heads">Nominee Name </td>
										 <td class="pro_p">:   <?php  ?> </td>
										 
										 <td class="heads"> Relatio with Nominee </td>
										 <td class="pro_p">:   <?php  ?></td>
									</tr>
								 </table>
								 <h2 class="pro_head">General Profile</h2>
								 <table>
		
									  <tr>
									  
										   <td class="heads"> Mail Address</td>
										   <td class="pro_p"> :     <?php echo $mail_address ?></td>
										   <td class="heads"> Nationality </td>
										   <td class="pro_p">:    <?php echo $nationality ?></td>
									 </tr>
									  
									 <tr>
									   
										   <td class="heads"> City </td>
										   <td class="pro_p">:     <?php echo $city ?></td>
										   <td class="heads"> State </td>
										   <td class="pro_p">:    <?php echo $state ?></td>
									  </tr> 
								  
									  <tr>
									   
										   <td class="heads"> Date of Birth </td>
			 							   <td class="pro_p">:   <?php echo $member_date_of_birth ?></td>
										   <td class="heads"> Marital Status </td>
										   <td class="pro_p">:  <?php echo $married_status ?></td>
									  </tr>
								 </table> 
								<h2 class="pro_head">Other Details</h2>
								  <table>
									   <tr> 
										   <td class="heads"> Create Time</td>
										   <td class="pro_p"> :   <?php echo $create_date ?></td>
										   
										   <td class="heads"> Bank Name </td>
										   <td class="pro_p">:    <?php echo $bank_name ?></td>
									  </tr> 
									   
									   <tr> 
									   
										   <td class="heads">Account NO </td>
										   <td class="pro_p">:   <?php echo $acc_no ?></td>   
										   
										   <td class="heads"> Bank Branch </td>
										   <td class="pro_p">:    <?php echo $bank_branch ?></td>
									  </tr>  		
								 </table>	  
								</div>
								</div>
								
		  

	 <!--<div class="form_tab">
		   	
	    <div class="basic">
            <fieldset class="basicc" >			
			   <legend >Image </legend>

      <table>
   
     <tr><td width="30px"></td> <td>:  <img src="<?php echo $picture ?>" width="120px" height="100px" /></td></tr> 
   
     </table>
             </fieldset>
		</div>		
		
		
<div class="basic">
    <fieldset class="basicc" >			
	  <legend >Sponsor Details </legend>

        <table>
   
         <tr>
		
		 <td class="head">Sponsor Name </td>
		 <td >: <?php echo $sponsor_id ?> </td>
		 
		  <td> Form Type </td>
		  <td>:<?php echo $form_type ?></td>
		   </tr>
		 <tr>
		
		 <td class="head">Nominee Name </td>
		 <td>: <?php  ?> </td>
		 
		 <td> Relatio with Nominee </td>
		 <td>:<?php  ?></td>
		  </tr>
		 </table>
	  </fieldset>
</div>

<div class="basic">
    <fieldset class="basicc" >			
	  <legend >Personal Details </legend>

        <table>	  	 
		 
		 
		 <tr>
			 
			  <td class="head"> Member Name </td>
			  <td>:    <?php echo $member_name ?></td> 
			  
			  <td> Date of Birth </td>
			  <td>:  <?php echo $member_date_of_birth ?></td>
		  </tr> 
			   
			
         <tr>
		 	
			<td class="head"> Marital Status </td>
			<td>: <?php echo $married_status ?></td>
			
			<td> Address</td>
			<td> : <?php echo $address ?></td>
		</tr> 	   
		    
				   
				   
         </table>
    </fieldset>
</div>

<div class="basic">
	<fieldset class="basicc">
		<legend>General Profile </legend>
		<table>
		
		  <tr>
		  
		   <td class="head"> Mail Address</td>
		   <td> :   <?php echo $mail_address ?></td>
           <td> Nationality </td>
		   <td>:    <?php echo $nationality ?></td>
		 </tr>
		  
		 <tr>
		   
		   <td class="head"> City </td>
		   <td>: <?php echo $city ?></td>
		   <td> State </td>
		   <td>: <?php echo $state ?></td>
		  </tr> 
   	  
          <tr>
		   
		   <td class="head"> Mobile No</td>
		   <td> : <?php echo $mobile_no ?></td> 
		   <td> Email</td>
		   <td> :<?php echo $email ?></td>
		  </tr>
		 </table> 
</fieldset>
</div>		
<div class="basic">
	<fieldset class="basicc">
		<legend>Other Details </legend>
         <table>
           <tr> 
		   <td class="head"> Create Time</td>
		   <td> :    <?php echo $create_date ?></td>
           
		   <td> Bank Name </td>
		   <td>:      <?php echo $bank_name ?></td>
		  </tr> 
		   
           <tr> 
		   
		   <td class="head">Account NO </td>
		   <td>:     <?php echo $acc_no ?></td>   
           
		   <td> Bank Branch </td>
		   <td>:    <?php echo $bank_branch ?></td>
		  </tr>  		
         </table>	   
     </fieldset>

</div>
  




</div>-->
</div>
