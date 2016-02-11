<?php	include("../db.php");
		session_start();
		
	function student_counter() 
	{
		$stuid_str  = "SELECT COUNT(*) FROM std_class_info";
		$stuid_sql  = mysql_query($stuid_str);
		$stuid_res  = mysql_fetch_row($stuid_sql);
		$stuid_cnt  = (int)$stuid_res[0]+1;	
		return $stuid_cnt;
	}	
	
	function class_max_roll($class_name)
	{
		$max_roll_str   = "select count(stu_id) from std_class_info where class_id=$class_name";
		$max_roll_qry   = mysql_query($max_roll_str);
		$max_roll_res   = mysql_fetch_row($max_roll_qry);
		return $max_roll_res[0]+1;	
	}
	
	
	function section_max_roll($class_name,$section_name,$branchid , $year )
	{

		$max_classroll_str = "select max(class_roll) from std_class_info where class_id=$class_name and branch_id=$branchid and year='$year' and class_sec='$section_name'";
		$max_classroll_sql = mysql_query($max_classroll_str); 
		$max_classroll_res = mysql_fetch_row($max_classroll_sql);
		$max_classroll = $max_classroll_res[0];
		if($max_classroll==0 || $max_classroll =="") {
			$max_classroll = 1;
		}else {
			$max_classroll = $max_classroll_res[0]+1;
		}
		return 	$max_classroll;	
	}
	
	function find_section_id($sec,$class_id) 
	{
		    $str = "SELECT id FROM `std_class_section_config` WHERE section_name='$sec' AND class_id=$class_id";
			$sq =  mysql_query($str);
			$r = mysql_fetch_row($sq);
			return $r[0];
	}	
?>
<?php
	
	
	$class_name = trim($_POST['class_name']);
	$class_sec  = trim($_POST['class_sec']);
    $branchid   = $_SESSION['LOGIN_BRANCH'];	
	$year       = date('Y');
	
	//get_ur_adm_info_by_ajax.php	 $profile_id.'|'.$class_roll.'|'.$section_roll
	
	
	$stuid_cnt     = student_counter();		
	
	$section_id    = find_section_id($class_sec,$class_name);	
	$profile_id    = $year.$class_name.$section_id.$stuid_cnt;	

	$section_roll  = section_max_roll($class_name,$class_sec,$branchid, $year  );
	$class_roll    = class_max_roll($class_name);
	
	echo $profile_id.'|'.$class_roll.'|'.$section_roll;
?>	
