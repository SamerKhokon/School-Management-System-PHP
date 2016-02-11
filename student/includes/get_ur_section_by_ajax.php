<?php
	include("../db.php");			
	
	$class_name = trim($_POST['class_name']);
	
	$cls_str  = "select class_name from std_class_config where id=$class_name";
	$cls_qry  = mysql_query($cls_str);
	$cls_res  = mysql_fetch_row($cls_qry);
	$cls_name = $cls_res[0];			
			
	$max_roll_str   = "select max(ovr_roll) from std_class_info where class_id=$class_name";
	$max_roll_qry   = mysql_query($max_roll_str);
	$max_roll_res   = mysql_fetch_row($max_roll_qry);
	$max_class_roll = $max_roll_res[0]+1;
						
	function get_esystem_section($num,$class_id)	 
	{
	    global $index;
		
		$str = "SELECT count(section_name) FROM  `std_class_section_config`  WHERE class_id=$class_id";
		$sql = mysql_query($str);
		$res = mysql_fetch_row($sql);	
		$tot_sec = $res[0]; 
		
		if($tot_sec >0 || $tot_sec!='') {
		 	$st = "SELECT section_name FROM  `std_class_section_config`  WHERE class_id=$class_id";
			$sr = mysql_query($st);		
			$sections = array();
			while($res = mysql_fetch_array($sr) ) 
			{
			  $sections[] = $res[0];
			}
			
			$index = $num%$tot_sec;
			if($index == 0) 
			{
				$index = $tot_sec-1;
			}
			else
			{
				$index = $index-1;
			}
			return $sections[$index];		
		}
	}	

	$str = "SELECT count(section_name) FROM  `std_class_section_config`  WHERE class_id=$class_name";
	$sql = mysql_query($str);
	$res = mysql_fetch_row($sql);	
	$tot_sec = $res[0]; 	
	if($tot_sec>0) {
      echo get_esystem_section($max_class_roll,$class_name);	
	}else{
	  echo "Please set section!";
	}
?>			

