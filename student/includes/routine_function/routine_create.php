<div id="content" class="box">
<?php
/*
			echo $time = strtotime('10:00');
			echo "<br/>";
			echo $time2 = date("H:i", strtotime('+30 minutes', $time));
			$time = strtotime($time2);
			echo "<br/>";
			echo $time = date("H:i", strtotime('+30 minutes', $time));
*/

$get_class_id = mysql_query("select * from std_class_config");

 while($get_class_id_result = mysql_fetch_array($get_class_id))  { 
 
 $rtn_class_id      = $get_class_id_result[0];
 $rtn_class_name = $get_class_id_result[1];
 $rtn_daily_class  = $get_class_id_result['daily_class'];
 $rtn_start_time    = $get_class_id_result['class_start_time']; 
 
 
         $get_sec_id = mysql_query("select * from std_class_section_config where class_id=$rtn_class_id");
		 
         while($get_sec_id_result = mysql_fetch_array($get_sec_id))		 {
		 $sec_id      = $get_sec_id_result[0];
		 $sec_name = $get_sec_id_result[1];
		    for($i=1 ; $i<=$rtn_daily_class ; $i++)   {			
               if ($i == 1)	 {
					$time   = strtotime($rtn_start_time);							
					$time2 = date("H:i", strtotime('+0 minutes', $time));	
			   }
			   else
			         $time2 = date("H:i", strtotime('+45 minutes', $time));	
			   
			   mysql_query("insert into std_class_routine (period,day_sat,day_sun,day_mon,day_tue,day_wed,day_thus,class_id,sec_id,class_time,class_name,sec_name)
			   values('$i','-----','-----','-----','-----','-----','-----',$rtn_class_id,$sec_id,'$time2','$rtn_class_name','$sec_name')");
                $time = strtotime($time2);									
		    }		   
		 }
 }
echo "Routine sucessfully created";
?>
</div>