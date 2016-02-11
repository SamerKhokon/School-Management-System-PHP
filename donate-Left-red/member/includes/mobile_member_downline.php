<?php
include("db.php");
        $mobileno=$_REQUEST['msisdn'];
		 $sms=$_REQUEST['sms'];		
		 $sms_parse=explode(" ",$sms);		
		 $hotkey=$sms_parse[0];
		 $id=$sms_parse[1];
		 $pass=$sms_parse[2];	
	$query = "SELECT * FROM user_info where login_id='".$id."' and login_pass='$pass' and status='Active'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);	
	if($count==1)
		 
{		 

//$id="081118361";
$_SESSION['s']=0;
echo $value="The number of member in your downline is --".getCount($id).$_SESSION['s'];
}
else
{
echo "Please enter valid informations";
}

function getCount($id){
	$query = "SELECT * FROM user_info where s_id='".$id."' and status='Active'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);	
	$_SESSION['s'] = $_SESSION['s']+$count;
	
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) 
	{
    getCount($row["login_id"]);
	}
	
	mysql_free_result($result);
	//$total_count=$total_count+ $count;
	return $total_count;	
}
	?>