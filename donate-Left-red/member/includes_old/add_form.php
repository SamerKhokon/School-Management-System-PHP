

<?php
function select_pos($member_id)
{
			include("db.php");
			$date=date('Ymdhis');
			$sel_pos="select * from donate_pos where id =(select next_pos_id from member_under_pos order by id desc limit 1)";
			$res_pos=mysql_query($sel_pos);
			$row_pos=mysql_fetch_array($res_pos);
			$pos_mobile=$row_pos['mobile_no'];
			$pos_id=$row_pos['id'];
			$sel_next_pos="select id from donate_pos where id>$pos_id limit 1";
			$res_next_pos=mysql_query($sel_next_pos);
			$row_next_pos=mysql_fetch_array($res_next_pos);
			$next_pos=$row_next_pos['id'];
			
			
			if ($next_pos!="")
			{
			
			$insert_pos="insert into member_under_pos (pos_id,last_request_time,next_pos_id,member_id) values($pos_id,'$date',$next_pos,'$member_id')" ;
			mysql_query($insert_pos);
			}
			else
			{
			$insert_pos="insert into member_under_pos (pos_id,last_request_time,next_pos_id,member_id) values($pos_id,'$date',1,'$member_id')" ;
			mysql_query($insert_pos);
			}
			return $pos_mobile;
}
?>


<?php
include("db.php");

if(isset($_POST['submit']) and isset($_POST['s_id']))
{
/*
		$link = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
		//echo 'Connected successfully';
		mysql_select_db('system_db') or die('Could not select database');
		
	*/	
		$login_id=$_REQUEST['login_id'];
		$name=$_REQUEST['name'];
		$mobileno=$_REQUEST['mobileno'];
		$email=$_REQUEST['email'];
		$s_id=$_REQUEST['s_id'];
		$form_type=$_REQUEST['form_type'];

		$sel_pin="select count(*) from pin_no where login_id='$login_id' and status='Available'";
		$result_pin=mysql_query($sel_pin);
		$row_pin=mysql_fetch_array($result_pin);
		if($row_pin[0]=='1')
		{
		
		 $login_secret=generatePassword();
         $ins_qury="insert into user_info (s_id,form_type,m_name,mobile_no,email,login_id,login_pass) values('$s_id','$form_type','$name','$mobileno','$email','$login_id','$login_secret')";
		 mysql_query($ins_qury);
		 
		 $update_qry="update user_info set status='Active' where login_id=$login_id";
		 mysql_query($update_qry);
		 
		 $update_qry="update pin_no set status='Used' where login_id=$login_id";
		 mysql_query($update_qry);	
		 $memberid=$s_id;
		 
		 /*
		$loop=true;
		$x=0;
		
		while($loop)
		{
		$x++;
		//$memberid='';
		$query = "SELECT * FROM user_info where login_id='".$memberid."' and status='Active' order by form_type";
		//echo $query;
		$result = mysql_query($query);
		$row=mysql_fetch_array($result);
		$payment=$row['s_id'];
		$memberid=$payment;

		if( $x==1 or $x==2 or $x==4 or $x==6 or $x==8 or $x==10 ) 
		echo "$memberid<br/>";
		if($x==10)
		exit;
		}
		*/
		
		$qry_level="select * from level_amount order by id";
		$result_level=mysql_query($qry_level);
		while($row_level=mysql_fetch_array($result_level))
		{
		
		$payment=$row_level['amount'];
		$query = "SELECT * FROM user_info where login_id='".$memberid."' and status='Active' order by form_type";
		//echo $query;
		$result = mysql_query($query);
		$row=mysql_fetch_array($result);		
		//echo "$memberid--------$payment<br/>";		
		if ($memberid!="")
		{
		$max_query="select max(current_balance) as max_value from user_account where login_id='$memberid'";
														$result_max=mysql_query($max_query);
														$row_max=mysql_fetch_array($result_max);
														$current_balance=$row_max['max_value']+$payment;
														
														$ins_account="insert into user_account(login_id,receive_amount,current_balance,sender_id) values('$memberid',$payment,'$current_balance','$s_id')";
														mysql_query($ins_account);
		}		
		$memberid=$row['s_id'];	
		}	
		
		
		  $pos_mobile=select_pos($login_id);
		 echo "Your have successfully Registerd with Donate me Program.your password is $login_secret please pay money to $pos_mobile";		  
		 
		 
		 
		}
		
		
		else
		{
		echo "Please enter valid Infoemation";
		}


}
else
{


?>

<hr/>
<form action="" method="POST">
<table>
<tr>
<td>
Mother Id
</td>
<td><input type="text" id="s_id" name="s_id" value="<?php echo $_GET['mother_id'] ?>" readonly="readonly"></td>

</tr>

<tr>

<td>Line</td>
<td><input type="text" id="form_type" name="form_type" value="<?php echo $_GET['line'] ?>" readonly="readonly"></td>
</tr>
<tr>
<td>Chield Id</td>
<td><input type="text" id="login_id" name="login_id"></td>

</tr>
<tr>
<td>
Name
</td>
<td><input type="text" id="name" name="name"></td>
</tr>
<tr>
<td>Mobile No</td>
<td><input type="text" id="mobileno" name="mobileno"></td>
</tr>
<tr>
<td>
Email
</td>
<td><input type="text" id="email" name="email"></td>
</tr>
</table>
<br/><br/>
<input type="submit" id="submit" name="submit" value="submit">


</form>


<?php
}
?>

<?php

  function generatePassword ($length = 8)
  {

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
  
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }
	
    // set up a counter for how many characters are in the password so far
    $i = 0; 
    
    // add random characters to $password until $length is reached
    while ($i < $length) { 

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }

    }

    // done!
    return $password;

  }

?>

	
	
	