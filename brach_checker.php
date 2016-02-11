<?php   //error_reporting(0);

	require_once('db.php');
	
	 session_start();
	$username   = $_SESSION['USER_NAME'];
	$user_type  = $_SESSION['USER_TYPE'];
	$main_menus = $_SESSION['MAIN_MENUS'];
	$sub_menu_1 = $_SESSION['SUB_MENU_1'];
	$sub_menu_2 = $_SESSION['SUB_MENU_2'];
	$branches   = $_SESSION['PERMIT_BRANCH']; 
	$user_class_id = $_SESSION['CLASS_ID'];
	$user_subject_id = $_SESSION['SUBJECT_ID'];	 

	
	
	$branchid = trim($_POST['branch']);	  
	
	$if_permit_branch = substr_count($branches,$branchid);	
	
    if($if_permit_branch > 0 && $branchid != "" ) {
	   $_SESSION['LOGIN_BRANCH'] = $branchid;
	   echo 1;
	}else{
	   echo 0;
	} 
?>