<?php session_start();?>
<?php   require_once("../db.php");
	
    $classid   = trim($_POST["class_id"]);
	$branchid  = trim($_POST["branchid"]);
	$year_id   = date('Y');
	
	$str = "SELECT * FROM `std_final_result_after_process` WHERE class_id=$classid AND  year='$year_id' AND 
			period=$term AND branch_id=$branchid";
	
	$c=0;
	$sql = mysql_query($str);
	while($res = mysql_fetch_array($sql)) 
	{
			$prev_stu_id       = $res['stu_id'];
			$prev_class_id     = $res['class_id'];
			$prev_class_sec    = $res['class_sec'];
			$prev_period       = $res['period'];
			$prev_cgpa         = $res['cgpa'];
			$prev_grade        = $res['grade'];
			$prev_year         = $res['year'];
			$branch            = $res['branch_id'];			
			$prev_sec_roll     = $res['prev_sec_roll'];
			$prev_class_roll   = $res['prev_class_roll'];			
			$new_sec_roll      = $res['new_sec_roll'];
			$new_class_roll    = $res['new_class_roll'];			
			
			$prev_class_name = get_class_name($prev_class_id);	
			
			$flag            = get_std_class_info_exist_flag($prev_stu_id , $prev_class_id , $prev_year);			
			$new_class       = $prev_class_id + 1;				
			$class_name      = get_class_name($new_class);					   
			$new_section     = get_esystem_section($prev_class_roll,$new_class);		
			$new_pro_year    = $prev_year+1;
			$student_name    = get_student_name($prev_stu_id);	
			
            if($flag==0) 
			{
			    if($prev_grade!="F") 
				{
				    // pass student block
				    //insert archive			
					
					$insert_std_class_info_arc = "INSERT INTO `school`.`std_class_info_arc`(`class_id`,`class_name`,`class_sec`,`stu_id`, 
					`stu_name`,`sec_roll`,`class_roll`,	`year`,`result`,`branch_id`)
					VALUES($prev_class_id,'$prev_class_name','$prev_class_sec','$prev_stu_id', 
					'$student_name',$prev_sec_roll,$prev_class_roll,'$prev_year','$prev_grade',$branchid)";
					
			        mysql_query($insert_std_class_info_arc);	
					
			        $delete_std_class_info = "delete from std_class_info where year='$prev_year' and class_id=$prev_class_id and stu_id='$prev_stu_id'";
				    mysql_query($delete_std_class_info);
					
			        $delete_std_class_student_info = "delete from std_class_student_info where year='$prev_year' and class_id=$prev_class_id and stu_id='$prev_stu_id'";
				    mysql_query($delete_std_class_student_info);					
		
				    $insert_std_class_info = "insert into std_class_info(class_id,class_name,class_sec,stu_id,stu_name,class_roll,status,year,result,branch_id,ovr_roll)
					values($new_class,'$class_name','$prev_class_sec','$prev_stu_id','$student_name',$new_sec_roll,'available','$new_pro_year','$prev_grade',$branch,$new_class_roll)";
					mysql_query($insert_std_class_info);
					
					$insert_std_class_student_info = "insert into std_class_student_info(class_id,class_name,class_sec,stu_id,stu_name,class_roll,status,year,result,branch_id,ovr_roll)
					values($new_class,'$class_name','$prev_class_sec','$prev_stu_id','$student_name',$new_sec_roll,'available','$new_pro_year','$prev_grade',$branch,$new_class_roll)";
			        mysql_query($insert_std_class_student_info);
					
				   $c++;
				}
				else if($pre_grade=="F")
				{
				   // failure student block
				    $fail_std_class_roll_str = "select max(ovr_roll) from std_class_info where class_id=$prev_class_id and year=$prev_year";
					$fail_std_class_roll_sql = mysql_query($fail_std_class_roll_str);
					$fail_std_class_roll_res = mysql_fetch_row($fail_std_class_roll_sql);
					$fail_std_class_roll     = $fail_std_class_roll_res[0];
					
				    $fail_std_sec_roll_str = "select max(ovr_roll) from std_class_info where class_id=$prev_class_id and class_sec='$prev_class_sec' and year=$prev_year";
					$fail_std_sec_roll_sql = mysql_query($fail_std_sec_roll_str);
					$fail_std_sec_roll_res = mysql_fetch_row($fail_std_sec_roll_sql);
					$fail_std_sec_roll     = $fail_std_sec_roll_res[0];
					
				   
					$update_std_class_info = "update std_class_info set year='$new_pro_year',class_roll=$fail_std_sec_roll,ovr_roll=$fail_std_class_roll where  year='$pre_year',class_roll=$pre_class_max_roll,class_sec='$section_for_fail_stu' and class_id=$pre_class_id and stu_id='$pre_stu_id'";
					mysql_query($update_std_class_info);
					
					$update_std_class_student_info = "update std_class_student_info set year='$new_pro_year',class_roll=$fail_std_sec_roll,ovr_roll=$fail_std_class_roll where  year='$pre_year' and class_id=$pre_class_id and stu_id='$pre_stu_id'";
					mysql_query($update_std_class_student_info);					
				}
			}
	}	
	 echo $c." students are promoted successfully";
	
	function get_std_class_info_exist_flag($pre_stu_id , $pre_class_id , $pre_year) {
	  $new_year = $pre_year+1;
	  $new_class_id = $pre_class_id+1;
	  $st = "select count(*) from std_class_info where stu_id='$pre_stu_id' and class_id=$new_class_id  and year='$new_year'";
	  $sq = mysql_query($st);
	  $rs = mysql_fetch_row($sq);
	  if($rs[0]=="" || $rs[0]==0)
	  return 0;
	  else
	  return $rs[0];
	}
	
?>
<?php
		/******************
		*** all functions
		*******************/
		
		function previous_class_last_roll($pre_class_id,$pre_year)
		{
			$str = "select max(class_roll) from std_class_info where class_id=$pre_class_id and year='$pre_year'";
			$sql = mysql_query($str);
			$res = mysql_fetch_row($sql);
			if($res[0]==0 || $res[0]=="")
			return 1;
			else
			return $res[0]+1;
		}		
		
		function get_new_classroll($class_id,$year,$term,$stu_id)
		{
		     global $newroll;
		     $string = "SELECT stu_id FROM `std_final_result_after_process` where year='$year' and class_id=$class_id and period=$term ORDER BY cgpa DESC"; 
			 $query = mysql_query($string);		
             $j=1;			 
			 while($res = mysql_fetch_array($query)) 
			 {
			      $rolls[$j++] = $res[0];
			 }
			//print_r($rolls);
			$newroll = array_search($stu_id,$rolls);
			return $newroll;
		}
		
		
		function get_pre_class_roll($pre_class_id,$pre_stu_id,$pre_year)
		{
		  $st = "select class_roll from std_class_info where stu_id='$pre_stu_id' and year='$pre_year' and class_id=$pre_class_id";
		  $sq = mysql_query($st);
		  $rs = mysql_fetch_row($sq);
		  return $rs[0];
		}
		
		function get_student_name($stdid) 
		{
		  $str = "select name from std_profile where stu_id='$stdid'";
		  $sql = mysql_query($str);
		  $res= mysql_fetch_row($sql);
		  return $res[0];
		}
		
        function get_new_roll($class_name) 
		{		
			$max_roll_str   = "select max(class_roll) from std_class_info where class_name='$class_name'";
			$max_roll_qry   = mysql_query($max_roll_str);
			$max_roll_res   = mysql_fetch_row($max_roll_qry);
			return $max_roll_res[0]+1;
        }		
		
		function get_esystem_section($num,$class_id)	 
		{
			global $index;
			
			$str = "SELECT count(section_name) FROM  `std_class_section_config`  WHERE class_id=$class_id";
			$sql = mysql_query($str);
			$res = mysql_fetch_row($sql);	
			$tot_sec = $res[0]; 
			
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
		
		function get_class_name($class_id) {
		   $str = "select class_name from std_class_config where id=$class_id";
		   $sql = mysql_query($str);
		   $res = mysql_fetch_row($sql);
		   return $res[0];
		}
		
        function get_subject_counter($class_id) {		
			$str    = "SELECT COUNT(*) FROM std_subject_config WHERE class_id=$class_id AND branch_id=1";    
			$querys = mysql_query($str);
			$res    = mysql_fetch_row($querys);
			return $res[0];						
        }  
		
		function checking_for_exist_or_not($old_stu_id , $previous_cls_year) {
		    $st = "select count(*) from std_mark_promo where pre_stu_id='$old_stu_id' and pre_year='$previous_cls_year'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_previous_class_roll( $stu_id ) {
		    $st = "select class_roll from std_class_info where stu_id='$stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_previous_sectionid( $stu_id ){
		    $st = "select class_sec from std_class_info where stu_id='$stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_previous_year( $stu_id ) {
		    $st = "select year from std_class_info where stu_id='$stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_new_class_section_roll( $class_id , $section_id , $year ) {
			$st = "SELECT MAX(class_roll) FROM std_class_info WHERE YEAR='$year' AND class_id=$class_id AND class_sec='$section_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			return $rs[0];
		}
		
		function get_new_class_roll( $year , $pre_stu_id ) {
		    $st = "SELECT MAX(new_class_roll) FROM `std_mark_promo` WHERE pre_year='$year' AND pre_stu_id='$pre_stu_id'";
			$sq = mysql_query($st);
			$rs = mysql_fetch_row($sq);
			if($rs[0]==0)
			return 1;
			else 
			return $rs[0]+1;
		}		
?> 