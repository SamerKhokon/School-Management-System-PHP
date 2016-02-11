<?php   require_once("../db.php");

   $dates = trim($_POST["dates"]);
   $parse = explode(",",$dates);
   //echo count($parse);
   
   for($i=0;$i<count($parse);$i++) {
   
		  $dt = $parse[$i];   
		  $day_name = date('D',strtotime($dt));
		  if($day_name=="Fri")
		  { 
				$is_holiday = 1; 
				$event = "Weekend"; 
		  }else{
				$is_holiday = 0; 
				$event = ""; 	     
		  }
   
		if( duplicate_checker($dt)  == 0 )
		{
			$str = "INSERT INTO `school`.`tbl_accademic_calendar` 
			(`date`,`day_name`,`is_holiday`,`event_desc`)
			VALUES('$dt','$day_name',$is_holiday,'$event');";
			mysql_query($str);
			echo "Successfully generated accademic calendar of ".date('Y');
		}
   }
   
   function duplicate_checker($date){
      $str = "select count(*) from `tbl_accademic_calendar` where `date`='$date'";
	  $sql = mysql_query($str);
	  $res = mysql_fetch_row($sql);
	  if($res[0]=="")
	  return 0;
	  else
	  return $res[0];
   }
   
?>