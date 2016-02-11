<?php session_start();
$branch_id = $_SESSION['LOGIN_BRANCH'];		
include('db.php');
			
$event_date  =trim($_POST["event_date"]);
$event_desc =trim($_POST["event_desc"]);

$day_name = date('D',strtotime($event_date));

if(is_exist($event_date)==0) 
{
	$str = "INSERT INTO `test`.`tbl_acc_calendar`(`date`,`day_name`,`evtn_name`,`flag`, `branch_id`)
		  VALUES('$event_date' , '$day_name' , '$event_desc' , 1, $branch_id)";
	mysql_query($str);	
	echo "Event added successfully!";				
}
else
{
	$str = "UPDATE `test`.`tbl_acc_calendar`  SET  `evtn_name`='$event_desc',flag=1
		  where date='$event_date'";			
	mysql_query($str);	  
	echo "Event updated successfully!";				
}		  
		  
		  
function is_exist($event_date) 
{
   $str = "select count(evtn_name) from tbl_acc_calendar where date='$event_date'";
   $sql = mysql_query($str);
   $res = mysql_fetch_row($sql);
   return $res[0];
}		  			
?>