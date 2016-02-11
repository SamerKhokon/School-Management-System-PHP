<?php
	session_start();
 if ($_SESSION["valid"]=="true")
 {
 
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=windows-1252" />
<meta name="description" content="" />
<meta name="generator" content="HTML-Kit" />
<title>Blasphemy '06</title>

<link rel="stylesheet" type="text/css" href="css/layout.css" />
<link rel="stylesheet" type="text/css" href="css/color.css" />
<link rel="stylesheet" type="text/css" href="css/screen.css" />

<link rel="stylesheet" type="text/css" media="screen" href="themes/steel/grid.css" /> 
<link rel="stylesheet" type="text/css" media="screen" href="themes/jqModal.css" />

<!--calender css-->

   <link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />
   <link id="skin-win2k" title="Win 2K" type="text/css" rel="alternate stylesheet" href="src/css/win2k/win2k.css" />
   <link id="skin-steel" title="Steel" type="text/css" rel="alternate stylesheet" href="src/css/steel/steel.css" />
   <link id="skin-gold" title="Gold" type="text/css" rel="alternate stylesheet" href="src/css/gold/gold.css" />
   <link id="skin-matrix" title="Matrix" type="text/css" rel="alternate stylesheet" href="src/css/matrix/matrix.css" />

<script src="jquery/jquery-1.4.2.js" type="text/javascript"></script> 
<script src="jquery/jquery.jqGrid.js" type="text/javascript"></script>
<script src="js/jqModal.js" type="text/javascript"></script> 
<script src="js/jqDnR.js" type="text/javascript"></script>
<script src="js/grid.formedit.js" type="text/javascript"></script>


  <script src="src/js/jscal2.js"></script>

    <!-- you actually only need to load one of these; we put them all here for demo purposes -->
    <script src="src/js/lang/ru.js"></script>
    <script src="src/js/lang/de.js"></script>
    <script src="src/js/lang/fr.js"></script>
    <script src="src/js/lang/ro.js"></script>
    <script src="src/js/lang/es.js"></script>
    <script src="src/js/lang/cz.js"></script>
    <script src="src/js/lang/pl.js"></script>
    <script src="src/js/lang/pt.js"></script>
    <script src="src/js/lang/jp.js"></script>
    <script src="src/js/lang/cn.js"></script>
    <script src="src/js/lang/en.js"></script>


</head>

<body>
<div id="perm-links">

 <?php include 'includes/header.php';?>
 
 
<div id="inside">
<div id="main-menu">

  <?php include "includes/left.php";?>
  
</div>

<div id="content">

 <?php 
 
     include "includes/db.php";
   
      include "includes/oracle_db.php";
	     
            if(!empty($_GET['pagetitle']) && file_exists('includes/'.strtolower($_GET['pagetitle']).".php")){

                                                        require_once('includes/'.strtolower($_GET['pagetitle']).".php");
                                                        }
                                                else{

                                                        require_once('includes/main_content.php');
                                                        }

   
 ?>
 
</div>

</div>
</div><!-- end of inside -->




<div id="footer"> 

  <?php include "includes/footer.php"; ?>

</div>
</body>
</html>

<?php

}
else
{
header("Location:login.php");
}
?>

