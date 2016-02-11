<?php
session_start();
 if ($_SESSION["admin_valid"]=="true")
 {
         $pos_id=$_SESSION["pos_id"];		
		 $member_id=$_SESSION["member_id"];
	     $founder_id=$_SESSION["founder_id"];
		 $user_id=$_SESSION["user_id"];
		 $user_name=$_SESSION["user_name"];
		 $user_type=$_SESSION["user_type"];
		 if($user_type=="member")
		 {
		 $login_id=$user_name;
		 }		
 ?>
<?php include('css_link_file.php');		?>
<script type="text/javascript">
$(document).ready(function(){
	
	$('.tp_link').click(function(){
	     var tp_id = $(this).attr('id');
		 $("#main_menu_id").val(tp_id);
		 var main_menu_id = $("#main_menu_id").val();
		 //alert(tp_id);
		 $("#left_menu_container").load("left.php",{"menu_id":main_menu_id},    function(){});
	});
	
	$('a[name="acls"]').live('click',function(){
	
		var url =$(this).attr('id');
		
		
		var main_menu_id = $("#main_menu_id").val();
		load_content_div(url,main_menu_id);
		
		$('a[name="acls"]').each(function(){
			$(this).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
				$(this).css({'background-color':'#efefef','color':'#000'});
		});
		$('#'+url).css({'background':'url("design/submenu-active.gif") no-repeat scroll 100% 50% transparent'});
		$('#'+url).css({'background-color':'#DF0000','color':'#fff'});
		
		
	});
	
	var load_content_div = function(url,main_menu_id){
	
	  $("#content").load("includes/"+url+".php",function(){});
	//alert(url+main_menu_id);
	}
});
</script>

</head>
<body>




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
	
	$user_type='Admin';
    require("header.php");     
  ?>  
  <!-- /header -->  
  
  <hr class="noscreen" />
  <!-- Columns -->
  <div id="cols" class="box">  
<!-- left content -->
  <div id="left_menu_container"></div>
 <?php //require("left.php");   ?>  
	<!-- end left -->	
    <hr class="noscreen" />    
	<!--main content-->
    <div id="content" class="box">

   
	<!-- end main content -->
    </div>
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
}else{
			header("location:login.php");
}
?>