<?php session_start();  require_once('db.php'); 
if($_SESSION['USER_STATUS'] ==1 ) 
{ 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>:: School Management System :: </title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<!-- library files -->
<?php include('libraries.php');   ?>

<script type="text/javascript">
	$(document).ready(function(){
                $(".moamix1").moatext({effects:["lens","wave"]});
                $(".moamix1w").moatext({effects:["lens","wave"],parser:jQuery.fn.moatext.parser_byword});
                $(".moamix2").moatext({effects:["lens","wave","opacity"]});
                $(".moafunc").moatext({hover:[
                    function(target){jQuery(target).css({
                        color: "#FF0000",
                        fontWeight: "bold"
                    });},
                    function(target){jQuery(target).css({
                        color: "#000000",
                        fontWeight: "normal"
                    });}
                ]});
				$(".omikuji").css({opacity:"0.0"})
						.eq(Math.floor(Math.random()*3))
						.css({opacity:"1.0"})
						.moatext({
							effects:["opacity"],
							oneway:true,
							values:{opacity:{base:"0.0"}}
				});
				$(".moaoptions").moatext({
					effects: ["lens","wave","opacity"],
					values:{
						"opacity": {
							"base": "1.0",
							"enter": "0.1",
							"leave": "1.0"
						},
						"wave": {
							"enter": ["-50px","20px"]
						}
					},
					duration:2000,
					easing:"swing"
				});
            	$(".smiley").moatext({
			    	effects:["lens","wave"],
				    action_type: "hover"
				});
            });        
    });
</script>
<script src="dashboard_buttons/nicetitle.js?1364455459" type="text/javascript"></script>
<style type="text/css">
#user_options {
    height: 400px;
    /*margin: 0px auto;*/
    padding: 0;
	border:#FF0000 0px solid;
	margin:0px 0px 0px 90px;
	/*margin:0px auto;*/
}
#user_options .option_buttons {
    display: block;
    float: left;
    height: 175px;
    margin-top: 20px;
    outline: medium none;
    text-align: center;
    width: 175px;
}
#student_details_button {
    background: url("dashboard_buttons/button_student_details.png") no-repeat scroll 0 0 #FFFFFF;
}
#student_details_button:hover {
    background: url("dashboard_buttons/button_student_details.png") no-repeat scroll -175px 0 #FFFFFF;
}
#examinations_button {
    background: url("dashboard_buttons/button_examinations.png") no-repeat scroll 0 0 #FFFFFF;
}
#examinations_button:hover {
    background: url("dashboard_buttons/button_examinations.png") no-repeat scroll -175px 0 #FFFFFF;
}
#timetable_button {
    background: url("dashboard_buttons/button_timetable.png") no-repeat scroll 0 0 #FFFFFF;
}
#timetable_button:hover {
    background: url("dashboard_buttons/button_timetable.png") no-repeat scroll -175px 0 #FFFFFF;
}
#student_attendance_button {
    background: url("dashboard_buttons/attendance.png") no-repeat scroll 0 0 #FFFFFF;
}
#student_attendance_button:hover {
    background: url("dashboard_buttons/attendance.png") no-repeat scroll -175px 0 #FFFFFF;
}
#settings_button {
    background: url("dashboard_buttons/settings.png") no-repeat scroll 0 0 #FFFFFF;
}
#settings_button:hover {
    background: url("dashboard_buttons/settings.png") no-repeat scroll -175px 0 #FFFFFF;
}
#hr_button {
    background: url("dashboard_buttons/button_Human.png") no-repeat scroll 0 0 #FFFFFF;
}
#hr_button:hover {
    background: url("dashboard_buttons/button_Human.png") no-repeat scroll -175px 0 #FFFFFF;
}
#finance_button {
    background: url("dashboard_buttons/button_finance.png") no-repeat scroll 0 0 #FFFFFF;
}
#finance_button:hover {
    background: url("dashboard_buttons/button_finance.png") no-repeat scroll -175px 0 #FFFFFF;
}
#hostel_button {
    background: url("dashboard_buttons/button_hostel.png") no-repeat scroll 0 0 #FFFFFF;
}
#hostel_button:hover {
    background: url("dashboard_buttons/button_hostel.png") no-repeat scroll -176px 0 #FFFFFF;
}
#library_button {
    background: url("dashboard_buttons/button_library.png") no-repeat scroll 0 0 #FFFFFF;
}
#library_button:hover {
    background: url("dashboard_buttons/button_library.png") no-repeat scroll -176px 0 #FFFFFF;
}
#transport_button {
    background: url("dashboard_buttons/button_transport.png") no-repeat scroll 0 0 #FFFFFF;
}
#transport_button:hover {
    background: url("dashboard_buttons/button_transport.png") no-repeat scroll -175px 0 #FFFFFF;
}
.button-label {
    color: #404040;
    font-size: 17px;
    font-weight: bold;
    height: 15px;
    position: absolute;
    text-align: center;
    top: 135px;
    width: 190px;
}
div.nicetitle {
    background: url("dashboard_buttons/ntbg.png") repeat scroll 0 0 transparent;
    color: white;
    font-family: Verdana,Helvetica,Arial,sans-serif;
    font-size: 13px;
    font-weight: bold;
    left: 0;
    margin-left: -80px;
    margin-top: 140px;
    padding: 4px;
    position: absolute;
    text-align: center;
    top: 0;
    width: 25em;
}
div.nicetitle p {
    margin: 0;
    padding: 5 3px;
}
.button-label {
    color: #404040;
    font-size: 17px;
    font-weight: bold;
    height: 15px;
    position: absolute;
    text-align: center;
    top: 135px;
    width: 190px;
}
.button-box {
    float: left;
    margin-left: 26px;
    overflow: hidden;
    position: relative;
    width: 175px;
}
.button-box.left-button {
    margin-left: 0px !important;
}
.button-label p {
    margin-left: -1px;
    text-align: center;
    text-decoration: none;
    width: 173px;
	margin-top:15px;
}
.button-box a {
    text-decoration: none;
}

.one-edge-shadow {
	/*-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;*/
	-webkit-box-shadow: 0px 20px 10px -10px #888;		
  	   -moz-box-shadow: 0px 20px 10px -10px #888;
	        box-shadow: 0px 20px 10px -10px #888;		
}
#dashboard_notice{
	width:60%;
	margin:0px auto;
	border:#CCCCCC 1px solid;
	text-align:center;
	padding:10px;
	background-color:#fbfbfb;/*#FFFFBB;*/
}	
</style>			
</head>
<body>
<div id="main">
  <!-- Tray -->
  <div id="tray" class="box">
    <p class="f-left box">
      <!-- Switcher -->
      <span class="f-left" id="switcher"> 
			<a href="javascript:void(0);" rel="1col" class="styleswitch ico-col1" title="Display one column">
						<img src="design/switcher-1col.gif" alt="1 Column" />
			</a>
			<a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" title="Display two columns">
						<img src="design/switcher-2col.gif" alt="" />
			</a> 
		</span> 
	  Project: <strong>School Management System [ from <?php echo branch_name($_SESSION['LOGIN_BRANCH']);?>]</strong> </p>
    <p class="f-right">User: <strong><a href="javascript:void(0);"><?php echo $_SESSION['USER_NAME']; ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	<strong><a href="logout.php" id="logout">Log out</a></strong></p>
  </div>
  <!--  /tray -->
  <hr class="noscreen" />
  <!-- Menu -->

  
  
  <div id="menu" class="box">
    <ul class="box f-right">
      <li><a href="branches.php" style="visibility:;"><span><strong>Branches &raquo;</strong></span></a></li>
    </ul> 
    <ul class="box">
     
    </ul>
  </div>
  
  
  
  <!-- /header -->
  <hr class="noscreen" />
  <!-- Columns -->
  <div id="cols" class="box">
  
<!-- left content -->

  
	<!-- end left -->
	
    <hr class="noscreen" />
    
	<!--main content-->
	
	
<div id="content" class="box">
	<div id="dashboard_notice" class="one-edge-shadow">
		<h2>Welcome at School Management System</h2>
        <p style="text-align:center;">Hello! <?php echo $_SESSION['USER_NAME']; ?>. You are login for <?php echo ucfirst(branch_name($_SESSION['LOGIN_BRANCH']));?>!!</p>
    </div>
    <hr class="noscreen" />
    <br />
    <fieldset  style="width:80%;margin:0 auto;background:#fff;border:2px solid #ccc;"> 
	    
        <div id="user_options">
            
            <div class="button-box">
	            <a href="./student" class="option_buttons" id="student_details_button" title="Existing students and their settings."><div class ='button-label'><p>Student</p></div></a>
            </div>
            
            <div class="button-box">
            	<a href="./teacher/" class="option_buttons" id="hr_button" title="                  Teacher       "><div class ='button-label'><p>Teacher</p></div></a>
            </div>
            
            <div class="button-box">
            	<a href="./admin/" class="option_buttons" id="settings_button" title="Configure the basic school settings"><div class ='button-label'><p>Settings</p></div></a>
            </div>
            
            <div class="button-box">
            	<a href="./exam/" class="option_buttons" id="examinations_button" title="          Manage Examinations"><div class ='button-label'><p>Examinations</p></div></a>
            </div>
            
            <div class="button-box">
            	<a href="./timetable/" class="option_buttons" id="timetable_button" title="  Timetable management module  "><div class ='button-label'><p>Timetable</p></div></a>
                <!--<a href="./timetable/" class="option_buttons" id="timetable_button" title="  Timetable management module  "><div class ='button-label'><p>Timetable</p></div></a> -->
            </div>
            
            <div class="button-box">
            	<a href="" class="option_buttons" id="student_attendance_button" title="Manage the attendance for the students"><div class ='button-label'><p>Attendance</p></div></a>
                <!--<a href="./student_attendance/" class="option_buttons" id="student_attendance_button" title="Manage the attendance for the students"><div class ='button-label'><p>Attendance</p></div></a> -->
            </div>
            
            <div class="button-box">
            	<a href="./accounts/" class="option_buttons" id="finance_button" title="        Manages Finance module    "><div class ='button-label'><p> Finance</p></div></a>
            </div>
            
            <div class="button-box">
            	<a href="./library/" class="option_buttons" id="library_button" title="                Manage Library        "><div class ="button-label"><p>Library</p></div></a>
            </div>
            
            <div class="button-box">
            	<a href="./transport/" class="option_buttons" id="transport_button" title="             Manage Transport        "><div class ="button-label"><p>Transport</p></div></a>
            </div>

            <div class="button-box">
            	<a href="./hostel/" class="option_buttons" id="hostel_button" title="                Manage Hostel    "><div class ="button-label"><p>Hostel</p></div></a>
            </div>
            
        </div>
  </fieldset> 	      
	
	<!-- end main content -->
	
	
	
	<script type="text/javascript" src="js/jquery.simpletip-1.3.1.min.js"></script>		
	<script type="text/javascript">
	    $(document).ready(function(){
			$("#student").simpletip({ 
				onShow: function(){ 
				 this.getParent().text('Student') 
				} 
			});
			$("#teacher").simpletip({ 
				onShow: function(){ 
				 this.getParent().text('Teacher') 
				} 
			});
			$("#exam").simpletip({ 
				onShow: function(){ 
				 this.getParent().text('Exam') 
				} 
			});
			$("#finance").simpletip({ 
				onShow: function(){ 
				 this.getParent().text('Finance')
				} 
			});
			$("#setting").simpletip({ 
				onShow: function(){ 
				 this.getParent().text('Setting') } 
			});			
			$("#library").simpletip({ 
				onShow: function(){ 
				 this.getParent().text('Library') } 
			});						
			$("#transport").simpletip({ 
				onShow: function(){ 
				 this.getParent().text('Transport') } 
			});	
		});		
	</script>		
	
	
	
	
  </div>
  <!-- /cols -->
  <hr class="noscreen" />
  <!-- Footer -->
  <div id="footer" class="box">
    <p class="f-left">&copy; 2009 <a href="#">Your Company</a>, All Rights Reserved &reg;</p>
    <p class="f-right">Templates by <a href="#">Adminzio</a></p>
  </div>
  <!-- /footer -->
</div>
<!-- /main -->
  
  </body>
  </html>
  <?php }else{
          header("location:logout.php");
}
	function branch_name($brid) {
	   $str = mysql_query("SELECT branch_name FROM std_branch WHERE id=$brid");
	   $res = mysql_fetch_row($str);
	   return $res[0];
	}

?>