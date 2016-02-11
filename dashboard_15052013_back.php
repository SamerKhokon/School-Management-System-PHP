<?php session_start();  require_once('db.php'); 
 if($_SESSION['USER_STATUS'] ==1 ) { ?>
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
      <li><a href="dashboard.php"><span><strong>Dashboard &raquo;</strong></span></a></li>
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

    <h3 style="text-align:center;font-family:Arial;color:#000;">Welcome to branch<?php echo $_SESSION['LOGIN_BRANCH']?></h3>
    <br/>
    <fieldset  style="width:60%;margin:0 auto;background:#fff;border:2px solid #fff;">
	    <div style="padding-left:60px;" >
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" >
		
			<tr>			    
				<td><img src="./dashboard_icon/LAVC_Portal_Menu_Student.png" height="99" width="95" title="Student"/></td>
				<td><img src="./dashboard_icon/teacher_blackboard_icon_T.png" height="99" width="95" title="Teacher"/></td>
				 <td><img src="./dashboard_icon/SEE_Finance_Icon_128x128.png" height="99" width="95" title="Accounts"/></td>				
			      <td><img src="./dashboard_icon/Exam.gif" height="99" width="95" title="Exam"/></td>				 
			</tr>
			
			<tr>
				<td><span style="margin-left:26px;font-weight:bold;"><a href="./student/" id="student" title="Student">Student</a></span></td>
				<td><span style="margin-left:26px;font-weight:bold;"><a href="./teacher/" id="teacher" title="Teacher">Teacher</a></span></td>
				<td><span style="margin-left:26px;font-weight:bold;" title="Account"><a href="./accounts/" id="finance" title="Finance">Finance</a></span></td>				
				 <td><span style="margin-left:26px;font-weight:bold;text-decoration:none;" title="Xm"><a href="./exam/" id="exam" title="Exam">Exam</a></span></td>							
			</tr>
				
			 <tr><td colspan="2">&nbsp;</td></tr>	
			 <tr><td colspan="2">&nbsp;</td></tr>													
				
			<tr>
				 <td><img src="./dashboard_icon/transport.png" height="99" width="95" title="Transport"/></td>
				 <td><img src="./dashboard_icon/1.png" height="99" width="95" title="Admin"/></td>
				 <td><img src="./dashboard_icon/library.png" height="99" width="95" title="Library"/></td>
				 <td><img src="./dashboard_icon/hostel.png" height="99" width="95" title="Hostel"/></td>
			</tr>	
			
			<tr>
				 <td><span style="margin-left:26px;font-weight:bold;"><a href="./transport/" id="transport" title="Transport">Transport</a></span></td>			 
				 <td><span style="margin-left:26px;font-weight:bold;"><a href="./admin/" id="setting" title="Setting">Setting</a></span></td>
				 <td><span style="margin-left:26px;font-weight:bold;" title="Library"><a href="./library/" id="library" title="Library">Library</a></span></td>
				 <td><span style="margin-left:26px;font-weight:bold;text-decoration:none;" title="Hostel"><a href="./hostel/" id="hostel" title="Hostel">Hostel</a></span></td>
			</tr>
							
			 
		</table>
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
    <p class="f-left">&copy; 2009 <a href="#">abc</a>, All Rights Reserved &reg;</p>
    <p class="f-right">Templates by <a href="#">abc</a></p>
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