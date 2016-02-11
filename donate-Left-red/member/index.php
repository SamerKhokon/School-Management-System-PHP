<?php
session_start();
 if ($_SESSION["valid"]=="true")
 {
 
 
                  $pos_id=$_SESSION["pos_id"];
	
		// $member_id=$_SESSION["member_id"];
	         //$founder_id=$_SESSION["founder_id"];
		 $user_id=$_SESSION["user_id"];
	 	 $user_name=$_SESSION["user_name"];
	 	  $user_type=$_SESSION["user_type"];
		  
		   $login_id=$user_name;
		  
		  
		  
	
		  /*
		 if($user_type=="member")
		 {
		 $login_id=$user_name;
		 }
		 */
		
include('css_link_file.php');		
 ?>

<body >




<div id="main">
  <!-- Tray -->
  <div id="tray" class="box">
    <p class="f-left box">
      <!-- Switcher -->
      <span class="f-left" id="switcher"> <a href="javascript:void(0);" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a> <a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="" /></a> </span> : <strong>Switch left side</strong> </p>
    <p class="f-right">User: <strong><a href="#"><?php echo $user_name;?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="includes/log_out.php" id="logout">Log out</a></strong></p>
	
	<!-- <h2>Donate Programe</h2><br/><br/>-->
  </div>
  <!--  /tray -->
  <hr class="noscreen" />
  <!-- Menu -->
  <!-- header -->
  <?php
    error_reporting(1);
    require('db.php');   
	$company_id=1;
	
/*	
    $query_user_info   = "select * from user_info";
	$result_user_info  = mysql_query($query_user_info);		
	$row_user_info     = mysql_fetch_row($result_user_info);
	
	$branchid=1;
	$user_main_menu_id = $row_user_info[3];
	$user_sub_menu_id1 = $row_user_info[4];
	$user_sub_menu_id2 = $row_user_info[5];
	$user_class_id=$row_user_info[7];	
	$user_subject_id=$row_user_info[8];		
	$user_type 		   = $row_user_info[9];	
*/
	$user_type='Admin';
    require("header.php");     
  ?>  
  <!-- /header -->  
  
  
 
  
  
  
  <hr class="noscreen" />
  <!-- Columns -->
  <div id="cols" class="box">  
<!-- left content -->
 <?php require("left.php");   ?>  
	<!-- end left -->	
    <hr class="noscreen" />    
	<!--main content-->

                     <?php 
						if(!empty($_GET['nev']) && file_exists('includes/'.strtolower($_GET['nev']).".php")){
							//echo "ekhane?";		//die();
							require_once('includes/'.strtolower($_GET['nev']).".php");
						}else{
							//echo "naki ekhane?"."includes/".strtolower($_GET['detail']);	//die();
							require_once('includes/home.php');
						}							
						?>
	<!-- end main content -->
  </div>
  <!-- /cols -->
  <hr class="noscreen" />
  <!-- Footer -->
  <?php
  include("footer.php");
  ?>
  <!-- /footer -->
</div>
<!-- /main -->
</body>
</html>
<?php
}
else
{
header("location:login.php");
}
?>
