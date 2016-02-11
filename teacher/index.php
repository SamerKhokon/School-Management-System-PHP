<?php error_reporting(0); // session_start();
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>:: School Management System :: </title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<!-- library files -->
<?php include('libraries.php'); ?>
</head>
<body>
<?php    
    require('db.php');
	function branch_name($brid) {
	   $str = mysql_query("SELECT branch_name FROM std_branch WHERE id=$brid");
	   $res = mysql_fetch_row($str);
	   return $res[0];
	}
	
	session_start();
	$username          = $_SESSION['USER_NAME'];
	$user_type         = $_SESSION['USER_TYPE'];
	$user_main_menu_id = $_SESSION['MAIN_MENUS'];
	$user_sub_menu_id1 = $_SESSION['SUB_MENU_1'];
	$user_sub_menu_id2 = $_SESSION['SUB_MENU_2'];
	$branches          = $_SESSION['PERMIT_BRANCH']; 
	$branchid	       = $_SESSION['LOGIN_BRANCH'];
	$user_class_id     = $_SESSION['CLASS_ID'];
	$user_subject_id   = $_SESSION['SUBJECT_ID'];
    $_SESSION['BRANCH_NAME'] = branch_name($branchid);
	
?>
<div id="main">
  <!-- Tray -->
  <div id="tray" class="box">
    <p class="f-left box">
      <!-- Switcher -->
      <span class="f-left" id="switcher"> <a href="javascript:void(0);" rel="1col" class="styleswitch ico-col1" title="Display one column">
	  <img src="design/switcher-1col.gif" alt="1 Column" /></a>
	  <a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" 
	  title="Display two columns">
	  <img src="design/switcher-2col.gif" alt="" /></a>
	  </span> Project: <strong>School Managemnet System [ from <?php echo $_SESSION['BRANCH_NAME'];?>]</strong> </p>
    <p class="f-right">User: <strong><a href="javascript:void(0);"><?php echo $username;?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="../logout.php" id="logout">Log out</a></strong></p>
  </div>
  <!--  /tray -->
  <hr class="noscreen" />
  <!-- Menu -->
  <!-- header -->
<?php	
/*    	
    $query_user_info   = "select * from user_info";
	$result_user_info  = mysql_query($query_user_info);		
	$row_user_info     = mysql_fetch_row($result_user_info);	
	$branchid		   = 1;	
	$user_main_menu_id = $row_user_info[3];
	$user_sub_menu_id1 = $row_user_info[4];
	$user_sub_menu_id2 = $row_user_info[5];
	$user_class_id     = $row_user_info[7];	
	$user_subject_id   = $row_user_info[8];		
	$user_type 		   = $row_user_info[9];	
*/		
    require("header.php");     
?>  
  <!-- /header -->  
  
  
  <hr class="noscreen" />
  <!-- Columns -->
  <div id="cols" class="box">  
<!-- left content -->

  <div id="left_menu"></div>

 <?php //require("left.php");   ?>  
	<!-- end left -->	
    <hr class="noscreen" />    
	<!--main content-->

	
	<div id="your_content"></div>
    <?php 
		/*if(!empty($_GET['nev']) && file_exists('includes/'.$_GET['nev'].".php")){
	      	//echo "ekhane?";		
			//die();
			require_once('includes/'.$_GET['nev'].".php");
		}else{
			//echo "naki ekhane?"."includes/".strtolower($_GET['detail']);	
			//die();
			require_once('includes/dashboard.php');
		}*/							
	?>
	<!-- end main content -->
  </div>
  <!-- cols -->
  <hr class="noscreen" />
  <!-- footer --><?php  include("footer.php");  ?><!-- footer -->
</div>
<!-- main -->
</body>
</html>
