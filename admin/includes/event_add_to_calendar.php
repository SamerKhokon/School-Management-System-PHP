<?php
		$date = trim($_POST["date"]);
		$title   = trim($_POST["evt"]);
	
	function get_day_name($date) 
	{
      return date('D' , strtotime($date));
    }
	
	$day_name = get_day_name($date) ;
	
	function duplicacy_check($date) {
	  $str = "select count(*) from activities_calendar where date='$date'";
	  $sql = mysql_query($str);
	  $res =  mysql_fetch_row($sql);
	  if($res[0]=='')
	  return 0;
	  else
	  return $res[0];
	}
	
	if(duplicacy_check($date)==0)	 {
	$add_new_event = "insert into activities_calendar(date,event,day_name) values('$date','$title','$day_name')";
	//mysql_query($add_new_event);
	}else{
	  $update_new_event = "update activities_calendar set event='$title' where date='$date'";
	  //mysql_query($update_new_event);
	}
	
	
?>