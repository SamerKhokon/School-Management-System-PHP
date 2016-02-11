<div id="content" class="box">
<?php   include("../db.php");
        
		$branch_id = 1; 
	    $str = "select * from  std_mark_promo where termid=3";	
		$sql = mysql_query($str);
		$counter = 0;
		while( $res = mysql_fetch_array($sql) ) 
		{
			$slno               = $res[0];
            $pre_class          = $res[1]+1;			
			$pre_stu_id         = $res[2];
			$total_point        = $res[3];
			$pre_class_sec_roll = $res[4];
			$new_class_roll     = $res[5];
			$pre_year           = $res[6];
			$pre_section        = $res[7];
			$total_mark         = $res[8];
			$grade              = $res[9];
			$cgpa               = $res[10];
			$termid             = $res[11];
			
			$pre_class_name = get_class_name_by_id($pre_class);
			$sec = F($pre_class,20);
			$stu_name = get_stu_name_by_id($pre_stu_id);
            $curent_year = date('Y');			
			
			
			$str_check = "select count(*) from std_class_info where class_id=$pre_class and stu_id='$pre_stu_id' and year='$curent_year'";
			$sql_check = mysql_query($str_check);
		    $str_ccount = mysql_fetch_row($sql_check);	
	        		
			if(($str_ccount[0] =="" || $str_ccount[0]==0) && $grade!="F") {		
				$str_promo = "insert into std_class_info(class_id,class_name,class_sec,stu_id,stu_name,class_roll,year,branch_id) 
				values($pre_class,'$pre_class_name','$sec','$pre_stu_id','$stu_name',$new_class_roll,'$curent_year',$branch_id)";			
				mysql_query($str_promo);
				$counter++;				
			}			
		}
		
		echo $counter." students are promoted successfully!";
?>

<a href="?SM_id=submenu-active&menu_id=3&nev=result_making_form"><input type="button" value="Back"></a>
</div>
<?php
        /*******************************
		    all functions for promotion
		********************************/   		
		
		function get_class_name_by_id($class_id) {
			$class_name = $class_id;
			$cls_str = "select class_name from std_class_config where id=$class_id";
			$cls_qry = mysql_query($cls_str);
			$cls_res  = mysql_fetch_row($cls_qry);
			$cls_name = $cls_res[0];
           return $cls_name;
		}
		
        function get_stu_name_by_id($stu_id)  {
		  $str = "select name from std_profile where stu_id='$stu_id'";
		  $sql = mysql_query($str);
		  $row = mysql_fetch_row($sql);
		  return $row[0];
		}

		
		function F($class_name,$max)  {			
			global    $sec;				   
			$max_roll_str = "select max(class_roll) from std_class_info where class_name='$class_name'";
			$max_roll_qry   = mysql_query($max_roll_str);
			$max_roll_res   = mysql_fetch_row($max_roll_qry);
			$max_class_roll = $max_roll_res[0]+1;					   					
			$num   = $max_class_roll;									   
			$sec   = array("A","B","C","D","E","F","G","H","I");			
			$nm    = $num/$max; 				   
            $mn    = ceil($nm);	   
            $start = (($mn*$max)-$max)+1;
			$last  = $mn*$max;
            return $sec[$mn-1];					
		}			
?>