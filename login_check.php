<?php	require 'db.php';	

	$user_name = trim($_POST["username"]);	
	$password  = trim($_POST["password"]);
	$date = date('Y-m-d'); 

 
   	$str = "SELECT user_type,regdate,reg_expire_date,main_menu_id,
	sub_menu1,sub_menu2,branch_id,class_id,subject_id,COUNT(*),
	module_permission FROM `school`.`tbl_menu_group` 
	WHERE user_name='$user_name' AND user_pass='$password' 
	and access_permission='on'";
	
	
	$select = mysql_query($str);
	$result = mysql_fetch_row($select);	
	
	$user_type       = $result[0];	
	$regdate         = $result[1];
	$reg_expire_date = $result[2];
	$main_menus      = $result[3];
	$sub_menu_1      = $result[4];
	$sub_menu_2      = $result[5];	
	$branchs         = $result[6];
	$user_class_id   = $result[7];
	$user_subject_id = $result[8];
	$counter         = $result[9];
	$modules         = $result[10];		 
	
	$expire_str = "SELECT COUNT(*) FROM `school`.`tbl_menu_group` 
	WHERE user_name='$user_name' AND user_pass='$password' AND 
	(reg_expire_date BETWEEN '$date' AND '$reg_expire_date')";

    $expire_query = mysql_query($expire_str);
    $expire_result = mysql_fetch_row($expire_query);    
	//echo $expire_result[0].' - '.$counter;
	
	if($counter >= 1  && $expire_result[0]>=1)	
	{	
	  session_start();
	   $_SESSION['USER_NAME']        = $user_name;
	   $_SESSION['USER_TYPE']         = $user_type;
	   $_SESSION['MAIN_MENUS']       = $main_menus;
	   $_SESSION['SUB_MENU_1']       = $sub_menu_1;
	   $_SESSION['SUB_MENU_2']       = $sub_menu_2;
	   $_SESSION['PERMIT_BRANCH'] = $branchs; 
	   $_SESSION['CLASS_ID']            = $user_class_id;
	   $_SESSION['SUBJECT_ID']        = $user_subject_id;	   
	   $_SESSION['MODULES_PERM']    = $modules;
	   $_SESSION['USER_STATUS']     = 1;	  
	   echo 1;
	   //eader("location:index.php");
	} 
	else 
	{
	   echo 0;
	   session_start();
	   session_destroy();
	   //header("location:login.php");
	}  
?>

