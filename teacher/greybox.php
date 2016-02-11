<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>JQuery tricks: using Greybox + form plugin for a modal dialog box</title>
	
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
<link type='text/css' href='css/contact.css' rel='stylesheet' media='screen' />	
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" /> 






<!--<script type="text/javascript" src="jquery/jquery.js"></script>-->

<!--<script type="text/javascript" src="jquery/jquery.js"></script>-->
<script type="text/javascript" src="jquerybak.js"></script>    
<script type="text/javascript" src="jquery/switcher.js"></script>
<script type="text/javascript" src="jquery/toggle.js"></script>
<script type="text/javascript" src="jquery/ui.core.js"></script>
<script type="text/javascript" src="jquery/ui.tabs.js"></script>
<script type='text/javascript' src='jquery/jquery.simplemodal.js'></script>
<script type='text/javascript' src='jquery/contact.js'></script>


<link rel="stylesheet" type="text/css" media="screen" href="themes/basic/grid.css" /> 
<link rel="stylesheet" type="text/css" media="screen" href="themes/jqModal.css" /> 
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" /> 
<script src="jquery/jquery.jqGrid.js" type="text/javascript"></script> 
<script src="js/jqModal.js" type="text/javascript"></script> 
<script src="js/jqDnR.js" type="text/javascript"></script> 
<script src="js/grid.formedit.js" type="text/javascript"></script> 










	

    <script type="text/javascript" src="greybox.js"></script>
	<script type="text/javascript" src="form.js"></script>
    <link href="greybox.css" rel="stylesheet" type="text/css" media="all" />

    <!-- 
	This CSS supports only IE 5.5 +. The conditional below
           just for the sake of brevity.
	 http://corky.net/dotan/programming/jquery.dialog/dialog-demo.html
           -->
    <!--[if lt IE 7]>
          <link href="ie-hacks.css" rel="stylesheet" type="text/css" media="all" />
          <![endif]-->
	<style type="text/css">
	#content { margin: 1em; padding: 1em; width: 100%; }
	</style>
    <script type="text/javascript">
	function showDialog(t, reload){
		if(typeof t != 'string') {
			t = $(this).title() || $(this).text() || $(this).href();
		}
		var callback = function(){
				$('form', $('#GB_frame').get())
				.ajaxForm( {	'target': '#GB_frame', 
								'after': function() { 
									var status = $('#status');
									var code = status.attr('class'); // yeah, I use a class name to signal if I'm done. YGAPWT?
									var status_msg = status.html()
									var content = $('#GB_frame').html(); // the whole page in the dialog
									if (code != 'ok') { 
										showDialog(t, content); // call myself again, with the content of the dialog box
									}
									else {
										$.GB_hide();
										alert(status_msg);
									}
								} } );
		}; // end of callback.
		if (!reload) { // we were called for the first time; create a dialog box!
			var url = $(this).href();
		  	var arguments = null;
			$.GB_show('about:blank', {
					height: 400,
					width: 600,
					animation: true,
					overlay_clickable: true,
					caption: t
			  });
			 // We don't want the iframe greybox gives us: 
			$('#GB_frame').remove();
			$("#GB_window").append("<div id='GB_frame'></div>");
		  	$("#GB_frame").load(url, // URL
							   arguments, // Params
							   callback );
		}
		else { // we were called again, because we're not done yet: just reload the HTML
			$("#GB_frame").html(reload);
			callback();
		}
		return false;
	}
	
	$(document).ready(function(){ $("a.dialog").click(showDialog); });
    </script>
	
<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	</script>

	
	</head>

<body>

<div id="content">

<b>Demo:</b> <a href="demo.php?pp=value" class="dialog">Change password</a></p>

</div>







<div id="main">
  <!-- Tray -->
  <div id="tray" class="box">
    <p class="f-left box">
      <!-- Switcher -->
      <span class="f-left" id="switcher"> <a href="javascript:void(0);" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a> <a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="" /></a> </span> Project: <strong>Your Project</strong> </p>
    <p class="f-right">User: <strong><a href="http://www.free-css.com/">Administrator</a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="http://www.free-css.com/" id="logout">Log out</a></strong></p>
  </div>
  <!--  /tray -->
  <hr class="noscreen" />
  <!-- Menu -->
  <!-- header -->
  <?php
    error_reporting(1);
    require('db.php');   
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

