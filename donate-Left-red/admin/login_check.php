<?php
session_start();


	require 'includes/db.php';
	
	$user_name=$_POST["user_name"];
	
	$password=$_POST["password"];
	$user_type=$_POST["user_type"];
  
   $sql="select * from  user_acl where user_name='$user_name' and password='$password'";
  
   
   
	
   $result=mysql_query($sql);
			  
	 
	    $row=mysql_fetch_array($result);
		
	    $usr_uid=$row["user_name"];
		
		 $usr_pass=$row["password"];

		if($usr_uid==$user_name and $password==$usr_pass and $usr_uid!="" and $password!="")
	   {
	    $_SESSION["admin_valid"]="true";
		
		
		$user_type=$row["user_type"];		
		$pos_id=$row["pos_id"];
		$member_id=$row["member_id"];
		$founder_id=$row["founder_id"];
		$user_id=$row["user_id"];
		
		
		
		
		$_SESSION["user_type"]=$user_type;	
		$_SESSION["user_name"]=$user_name;	
		$_SESSION["user_id"]=$user_id;		
		$_SESSION["pos_id"]=$pos_id;		
		$_SESSION["member_id"]=$member_id;	 
	    $_SESSION["founder_id"]=$founder_id;		
		$_SESSION["sid"]=date("YmdHiss",time());		
	    
		
		$login_time=date("Y-m-d H:i:s",time());		
		$_SESSION["login_time"]=$login_time;		
		$login_ip=$_SERVER['REMOTE_ADDR'];
		
	/*  $sql="insert into user_log(user_id,user_name,login_time,login_ip,session_id) 	              values($user_id,'$user_name','$login_time','$login_ip','$session_id')";		
		mysql_query($sql,$mysql_connection)
		or die(mysql_error());
	 */
	    header("Location:index.php");
	   
	 
	 
	}
	  
	  else
	  {
	 
	    header("Location:login.php?error=1");    
	 }
	 
	
	mysql_close($mysql_connection);
	
		 
?>

